<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Streamer;


class HomeController extends Controller
{
    public function index()
    {
        $streamer_principal = Streamer::where('is_primary', 1)->first();
        $autres_streamers = Streamer::where('is_primary', 0)->get();
        $staffAsso = [
            'Staff Association' => [
                ['img' => 'image/ww.JPG', 'name' => 'Waneguenne', 'role' => 'Président'],
                ['img' => 'image/kk.JPG', 'name' => 'Kkhuettee', 'role' => 'Admin, Secrétaire RH, Manager & CM'],
                ['img' => 'image/Geoffrey.jpg', 'name' => 'GorthicaS', 'role' => 'Web Master'],
                ['img' => 'image/sonny.jpg', 'name' => 'Sonny-Jay', 'role' => 'Admin'],
                ['img' => 'image/strike.jpg', 'name' => 'Strike', 'role' => 'Modérateur'],
                ['img' => 'image/touf.jpg', 'name' => 'Touf', 'role' => 'Modérateur'],
            ],
        ];



        return view('home', [
            'streamer_principal' => $streamer_principal,
            'autres_streamers' => $autres_streamers,
            'staffAsso' => $staffAsso,
        ]);
    }

    public function showRejoindPage()
    {
        return view('rejoind');
    }
}
