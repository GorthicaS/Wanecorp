<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RedacteurController extends Controller
{
    public function dashboard()
    {
        $user = auth()->user();
        return view('redacteur.dashboard', compact('user'));
    }
    
    
}
