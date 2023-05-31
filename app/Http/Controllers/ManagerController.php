<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ManagerController extends Controller
{
    public function dashboard()
    {
        $user = auth()->user();
        return view('manager.dashboard', compact('user'));
    }
    
}
