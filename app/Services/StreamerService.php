<?php

namespace App\Services;

use app\Models\Streamer;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class StreamerService
{
    private $clientId;
    private $clientSecret;

    public function __construct()
    {
        $this->clientId = 'mefj2q8yvqv9speqlbldhtcgur5xqn';
        $this->clientSecret = 'l9eafgrls8gaxm9ed2pjd6zl05efvu';
    }

    public function getOnlineStreamers()
    {
        Log::info('Entering getOnlineStreamers method');

        $streamers = Streamer::all();

        Log::info('Fetched all streamers');

        $tokenResponse = Http::post('https://id.twitch.tv/oauth2/token', [
            'client_id' => $this->clientId,
            'client_secret' => $this->clientSecret,
            'grant_type' => 'client_credentials'
        ]);

        $accessToken = $tokenResponse->json()['access_token'];

        $onlineStreamers = [];

        foreach ($streamers as &$streamer) {
            Log::info('Entering loop iteration');

            $username = $streamer->username;

            $userResponse = Http::withHeaders([
                'Client-ID' => $this->clientId,
                'Authorization' => "Bearer $accessToken"
            ])->get('https://api.twitch.tv/helix/users', [
                'login' => $username
            ]);

            $userId = $userResponse->json()['data'][0]['id'];
            $userAvatar = $userResponse->json()['data'][0]['profile_image_url'];
            $streamer->avatar = $userAvatar;

            $streamResponse = Http::withHeaders([
                'Client-ID' => $this->clientId,
                'Authorization' => "Bearer $accessToken"
            ])->get('https://api.twitch.tv/helix/streams', [
                'user_id' => $userId
            ]);

            $isOnline = count($streamResponse->json()['data']) > 0;

            if ($isOnline) {
                $onlineStreamers[] = $streamer;
            }

            Log::info('Exiting loop iteration');
        }

        return $onlineStreamers;
    }
}
