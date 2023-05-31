@extends('layouts.layouthf')


@section('content')
<link rel="stylesheet" href="../public/css/presentation.css">
    <section class="presentation-section">
        <div class="container">
            <h2 class="presentation-title animate-fade-in">À propos de Waneguenne Corp</h2>
            
            <p class="presentation-text animate-fade-in">
            <span class="highlight-text">Waneguenne Corp est une association unique en son genre, née à Bourges dans le Cher, et qui a pour but : </span>
            </p>
            
            <p class="presentation-text animate-fade-in">
                Organiser des événements sur un ou plusieurs jours permettant de réunir et d'accueillir des passionnés de jeux vidéo (LanParty)
                Organiser toutes activités connexes ou complémentaires à cet objectif. L'association s'interdit toute discussion de confession.
            </p>

            <p class="presentation-text animate-fade-in">
                Nous sommes régis par la loi 1901 et nous nous distinguons par notre culture de respect et de soutien. Notre association rassemble de nombreux joueurs et joueuses de différents horizons, réunis par un seul et unique point commun : la passion du gaming.
            </p>

            <p class="presentation-text animate-fade-in">
                La Waneguenne Corp est bien plus qu'une simple équipe de gaming - nous sommes une famille. Nous cultivons une culture de respect, de soutien et d'indulgence qui fait de notre association un lieu unique. Notre objectif pour chacun de nos membres est de grandir et de progresser ensemble, que vous soyez un joueur compétitif ou que vous jouiez pour le loisir.
            </p>

            <p class="presentation-text animate-fade-in">
                Notre équipe dynamique comprend de nombreux streamers, des community managers et un personnel discord dédié, tous engagés à vous offrir la meilleure expérience de jeu possible. Alors, pourquoi attendre ? 
            </p>

            <div class='btn-container animate-fade-in'>
                <a href="{{ url('/rejoind') }}"><button class='join-button'>Rejoins notre famille</button></a>
            </div>
        </div>
    </section>

    <section class="video-section">
        <video autoplay muted loop id="myVideo" class="animate-zoom">
            <source src="{{ asset('video/Warzone.mp4') }}" type="video/mp4">
        </video>
    </section>

@endsection
