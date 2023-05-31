<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use App\Models\Role;
use App\Models\User;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Carbon\Carbon;



class UserController extends Controller
{
    public function assignRole(Request $request)
    {
        $userId = $request->input('user_id');
        $roleId = $request->input('role_id');

        $user = User::find($userId);
        $role = Role::find($roleId);

        if ($user && $role) {
            $user->roles()->attach($role);
            // Redirigez vers une vue ou une autre route selon votre choix
            return redirect()->route('users.index')->with('success', 'Rôle assigné avec succès');
        }

        return redirect()->route('users.index')->with('error', 'Utilisateur ou rôle introuvable');
    }
    
    public function redirectToDashboard()
    {
            // Ajouter un message de débogage ici
        \Log::info('Entering redirectToDashboard method');

        $user = auth()->user();

        if ($user->roles) {
            $role = $user->roles->first()->name;
        } else {
            $role = 'user';
        }

        switch ($role) {
            case 'superadmin':
                return redirect()->route('superadmin.dashboard');
            case 'admin':
                return redirect()->route('admin.dashboard');
            case 'manager':
                return redirect()->route('manager.dashboard');
            case 'redacteur':
                return redirect()->route('redacteur.dashboard');
            case 'user':
            default:
                return redirect()->route('user.dashboard');
        }
    }

    public function dashboard()
    {
        $user = auth()->user();
        return view('user.dashboard', compact('user'));
    }

    public function orders($orderId = null)
    {
        $user = auth()->user();
        
        if ($orderId) {
            $order = Order::where('id', $orderId)
                          ->where('user_id', $user->id)
                          ->first();
    
            if (!$order) {
                return redirect()->route('user.orders')->with('error', 'Commande introuvable');
            }
    
            return view('user.order', compact('user', 'order'));
        }
        
        $orders = Order::where('user_id', $user->id)->get();
        
        return view('user.order', compact('user', 'orders'));
    }
    

    public function membership()
    {
        $user = auth()->user();
        // Ici, vous pouvez également récupérer les informations d'adhésion de l'utilisateur si nécessaire
        return view('user.membership', compact('user'));
    }

    public function profile()
    {
        $user = auth()->user();
        // Ici, vous pouvez également récupérer les informations d'adhésion de l'utilisateur si nécessaire
        return view('user.profile', compact('user'));
    }

    public function edit(Request $request): View
    {
        return view('user.profile.edit', [
            'user' => $request->user(),
        ]);
    }

    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        return Redirect::route('user.profile.edit')->with('status', 'user.profile-updated');
    }

    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }

    public function getMembershipAttribute($value)
    {
        // Si la date de paiement est plus ancienne que 1 an, alors l'adhésion n'est plus valide
        if ($this->payment_date && Carbon::parse($this->payment_date)->lt(Carbon::now()->subYear())) {
            return false;
        }

        return $value;
    }

    public function becomeMember(Request $request)
    {
        $user = Auth::user(); // obtenir l'utilisateur actuellement connecté
        $user->membership = true; // mettre à jour le statut d'adhésion
        $user->save(); // sauvegarder les modifications

        return redirect()->route('user.profile'); // rediriger l'utilisateur vers sa page de profil
    }
}
