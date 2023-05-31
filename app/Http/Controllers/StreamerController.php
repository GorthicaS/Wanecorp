<?php

namespace App\Http\Controllers;

use App\Models\Streamer;
use App\Services\StreamerService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class StreamerController extends Controller
{
    private $streamerService;

    public function __construct(StreamerService $streamerService)
    {
        $this->streamerService = $streamerService;
    }

    public function index()
    {
        $onlineStreamers = $this->streamerService->getOnlineStreamers();
        $streamers = Streamer::all();

        return view('streamers', ['onlineStreamers' => $onlineStreamers, 'streamers' => $streamers]);
    }
}
