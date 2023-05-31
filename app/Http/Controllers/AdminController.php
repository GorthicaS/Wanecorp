<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Streamer;
use App\Models\Team;
use App\Models\Staff;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Cache;
use Illuminate\Validation\Rule;

class AdminController extends Controller
{
    public function dashboard()
    {
        $streamersCount = Streamer::count();
        $teamsCount = Team::count();
        $userCount = User::count();

        return view('admin.dashboard', compact('streamersCount', 'teamsCount', 'userCount'));
    }

    // Gérer les utilisateurs
    public function listUsers()
    {
        $users = User::all();
        return view('admin.users.list', compact('users'));
    }

    public function createUser()
    {
        return view('admin.users.create');
    }

    public function storeUser(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|unique:users|max:255',
            'password' => 'required|min:6|max:255',
        ]);

        $user = User::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'password' => bcrypt($validatedData['password']),
        ]);

        return redirect()->route('admin.users.show', $user->id)->with('success', 'Utilisateur créé avec succès');
    }

    public function showUser($id)
    {
        $user = User::findOrFail($id);
        return view('admin.users.show', compact('user'));
    }

    public function editUser($id)
    {
        $user = User::findOrFail($id);
        return view('admin.users.edit', compact('user'));
    }

    public function updateUser(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'email' => ['required', 'email', 'max:255', Rule::unique('users')->ignore($user->id)],
        ]);

        $user->name = $validatedData['name'];
        $user->email = $validatedData['email'];
        $user->save();

        return redirect()->route('admin.users.show', $user->id)->with('success', 'Utilisateur mis à jour avec succès');
        }

        public function deleteUser($id)
        {
            $user = User::findOrFail($id);
            $user->delete();
            return redirect()->route('admin.users.list')->with('success', 'Utilisateur supprimé avec succès');
        }

// Gérer les Streamers
public function listStreamers()
{
    Log::info('Entering listStreamers method');
    $streamers = Cache::remember('streamers', 3600, function () {
        return Streamer::all();
    });
    Log::info('Fetched all streamers');
    return view('admin.streamers.list', compact('streamers'));
}

public function createStreamer()
{
    return view('admin.streamers.create');
}

public function storeStreamer(Request $request)
{
    $validatedData = $request->validate([
        'username' => 'required|unique:streamers|max:255', // Ajout de la validation du champ 'username'
        'name' => 'required|max:255',
        'description' => 'required',
        'twitch_channel' => 'required|unique:streamers|max:255',
        'avatar' => 'nullable|url|max:255',
    ]);

    Log::info('Validated data:', $validatedData);

    $streamer = Streamer::create($validatedData);

    // Invalider le cache après l'ajout du streamer
    Cache::forget('streamers');

    return redirect()->route('admin.streamers.list')->with('success', 'Streamer créé avec succès');
    }

    public function editStreamer($id)
    {
        $streamer = Streamer::findOrFail($id);
        return view('admin.streamers.edit', ['streamer' => $streamer]);
    }

    public function updateStreamer(Request $request, $id)
    {
        $streamer = Streamer::findOrFail($id);

        $validatedData = $request->validate([
            'username' => ['required', 'max:255', Rule::unique('streamers')->ignore($streamer->id)], // Ajout de la validation du champ 'username'
            'name' => 'required|max:255',
            'description' => 'required',
            'twitch_channel' => ['required', 'max:255', Rule::unique('streamers')->ignore($streamer->id)],
            'avatar' => 'nullable|url|max:255',
        ]);

        $streamer->update($validatedData);

        return redirect()->route('admin.streamers.list')->with('success', 'Streamer mis à jour avec succès');
    }

    public function destroyStreamer($id)
    {
        $streamer = Streamer::findOrFail($id);
        $streamer->delete();

        // Invalider le cache après la suppression du streamer
        Cache::forget('streamers');

        return redirect()->route('admin.streamers.list')->with('success', 'Streamer supprimé avec succès');
    }



    // Gérer les Équipes
    public function listTeams()
    {
        $teams = Team::all();
        return view('admin.teams.list', compact('teams'));
    }

    public function createTeam()
    {
        return view('admin.teams.create');
    }

    public function storeTeam(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'banner' => 'nullable|image|max:2048',
        ]);
        
        if ($request->hasFile('banner')) {
            $bannerImage = $request->file('banner')->store('public/image');
        } else {
            $bannerImage = null;
        }

        $team = Team::create([
            'name' => $request->name,
            'game' => $request->input('game'),
            'banner' => $bannerImage,
        ]);

        return redirect()->route('admin.teams.list')->with('success', 'Équipe créée avec succès');
    }

    public function showTeam($id)
    {
        $team = Team::findOrFail($id);
        return view('admin.teams.show', compact('team'));
    }

    public function editTeam($id)
    {
        $team = Team::findOrFail($id);
        return view('admin.teams.edit', compact('team'));
    }

    public function updateTeam(Request $request, $id)
    {
        $team = Team::findOrFail($id);

        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'game' => $request->input('game'),
            'banner' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('banner')) {
            $bannerImage = $request->file('banner')->store('public/image');
            $team->banner = $bannerImage;
        }

        $team->name = $request->name;
        $team->save();

        return redirect()->route('admin.teams.list')->with('success', 'Équipe mise à jour avec succès');
    }

    public function deleteTeam($id)
    {
        $team = Team::findOrFail($id);
        $team->delete();
        return redirect()->route('admin.teams.list')->with('success', 'Équipe supprimée avec succès');
    }

        // carousel


    public function listCarousel()
    {
        $staffMembers = Staff::all();
        return view('admin.carousel.list', compact('staffMembers'));
    }


    public function addMember(Request $request)
    {
        // Valider les données du formulaire
        $validatedData = $request->validate([
            'rang' => 'required',
            'pseudo' => 'required',
            'photo' => 'required|image',
            'description' => 'required',
        ]);

        // Enregistrer le nouveau membre du staff
        $photoPath = $request->file('photo')->store('staff', 'public');

        $staffMember = new Staff;
        $staffMember->rang = $validatedData['rang'];
        $staffMember->pseudo = $validatedData['pseudo'];
        $staffMember->photo = $photoPath;
        $staffMember->description = $validatedData['description'];
        $staffMember->save();

        return redirect()->route('admin.carousel')->with('success', 'Membre du staff ajouté avec succès.');
    }

    public function deleteMember($id)
    {
        $staffMember = Staff::findOrFail($id);
        $staffMember->delete();

        return redirect()->route('admin.carousel')->with('success', 'Membre du staff supprimé avec succès.');
    }
    

    // Méthodes redirigeant vers les méthodes principales
    public function streamers()
    {
        return $this->listStreamers();
    }

    public function teams()
    {
        return $this->listTeams();
    }

    public function users()
    {
        return $this->listUsers();
    }

    public function index()
    {
        return $this->dashboard();
    }
}
