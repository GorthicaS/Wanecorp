<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\rejoind;
use Illuminate\Support\Facades\Auth;

class RejoindController extends Controller
{
    public function index()
    {
        // On vérifie si l'utilisateur est authentifié
        if (Auth::check()) {
            // L'utilisateur est authentifié, on renvoie la vue normale
            return view('rejoind.index');
        } else {
            // L'utilisateur n'est pas authentifié, on renvoie une alerte
            return redirect('login')->with('alert', 'Pour pouvoir devenir adhérent, merci de vous connecter.');
        }
    }

    public function create()
    {
        return view('rejoind.create');
    }

    public function store(Request $request)
    {
        $rejoind = new rejoind;
        // Remplissez ici les champs du modèle rejoind
        $rejoind->save();

        return redirect()->route('rejoind.index');
    }
}
