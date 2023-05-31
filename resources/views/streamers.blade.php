@extends('layouts.layouthf')

@vite(['resources/css/streamers.css', 'resources/js/app.js'])

@section('content')

<section class="online-streamers">
    <h2>Streamers en ligne</h2>
    <div class="online-streamers-container">
        @forelse ($onlineStreamers as $streamer)
        <div class="online-streamer">
            <div class="online-streamer-image-container">
                <img src="{{ $streamer['avatar'] }}" alt="Photo de {{ $streamer['name'] }}">
            </div>
            <div class="online-streamer-info">
                <h3>{{ $streamer['name'] }}</h3>
                <a href="https://twitch.tv/{{ $streamer['username'] }}" target="_blank">Regarder le stream</a>
            </div>
        </div>
        @empty
        <p>Aucun streaamer en ligne actuellement.</p>
        @endforelse
    </div>
</section>

<section class="all-streamers">
    <h2>Tous les streamers</h2>
    <div class="all-streamers-container">
        @foreach ($streamers as $streamer)
        <div class="streamer">
            <div class="streamer-image-container">
                <img src="{{ $streamer['avatar'] }}" alt="Photo de {{ $streamer['name'] }}">
            </div>
            <div class="streamer-info">
                <h3>{{ $streamer['name'] }}</h3>
                <p>{{ $streamer['description'] }}</p>
                <a href="https://twitch.tv/{{ $streamer['username'] }}" target="_blank">Visiter la chaîne</a>
            </div>
        </div>
        @endforeach
    </div>
</section>


<script src="https://embed.twitch.tv/embed/v1.js"></script>
<script>
    document.addEventListener("DOMContentLoaded", function () {
        const randomClipsElement = document.getElementById("randomClipsData");
        const randomClips = JSON.parse(randomClipsElement?.textContent ?? '[]');
        const playerElement = document.getElementById("random-clip-player");

        function playRandomClip() {
            if (randomClips.length === 0) {
                console.log("Aucun clip disponible pour le moment.");
                return;
            }
            const randomIndex = Math.floor(Math.random() * randomClips.length);
            const clip = randomClips[randomIndex];
            return clip.video_url.replace('https://www.twitch.tv/videos/', '');
        }

        const options = {
            width: 640,
            height: 360,
            channel: '',
            video: playRandomClip(),
            parent: [window.location.hostname],
            autoplay: true,
            muted: true,
        };

        let player = new Twitch.Player("random-clip-player", options);

        player?.addEventListener(Twitch.Player.PLAY, () => {
            console.log("Lecture de la vidéo en cours.");
        });

        player.addEventListener(Twitch.Player.ENDED, () => {
        console.log("Vidéo terminée, sélection d'une nouvelle vidéo aléatoire.");
        options.video = playRandomClip();
        player = new Twitch.Player("random-clip-player", options);
    });
});


</script>

@endsection
