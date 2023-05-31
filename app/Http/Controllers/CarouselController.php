<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Staff;

class CarouselController extends Controller
{
    public function index()
    {
        $staffMembers = Staff::all();
        return view('admin.carousel.index', compact('staffMembers'));
    }

    public function create()
    {
        return view('admin.carousel.create');
    }

    public function store(Request $request)
    {
        // Valider les données du formulaire
        $validatedData = $request->validate([
            'rang' => 'required',
            'pseudo' => 'required',
            'photo' => 'required|image',
            'description' => 'required',
        ]);

        // Enregistrer les données dans la base de données
        $photoPath = $request->file('photo')->store('staff', 'public');

        Staff::create([
            'rang' => $validatedData['rang'],
            'pseudo' => $validatedData['pseudo'],
            'photo' => $photoPath,
            'description' => $validatedData['description'],
        ]);

        return redirect()->route('carousel.index')->with('success', 'Membre du staff ajouté avec succès.');
    }

    public function destroy($id)
    {
        $staff = Staff::findOrFail($id);
        $staff->delete();

        return redirect()->route('carousel.index')->with('success', 'Membre du staff supprimé avec succès.');
    }
}
