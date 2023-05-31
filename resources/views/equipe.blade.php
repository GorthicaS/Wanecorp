@extends('layouts.layouthf')

@section('content')
<link rel="stylesheet" href="../public/css/equipe.css">
    <section class="staff">
        <div class="team-banner" style="background-image: url('{{ asset('image/team-banner.jpg') }}');">
            <h2>Staff</h2>
        </div>
        <div class="staff-container">
            @php
                $staff = [
                    ['img' => 'image/ww.JPG', 'name' => 'Waneguenne', 'role' => 'Président'],
                    ['img' => 'image/kk.JPG', 'name' => 'Kkhuettee', 'role' => 'Admin, Secrétaire RH, Manager & CM'],
                    ['img' => 'image/sonny.jpg', 'name' => 'Sonny-Jay', 'role' => 'Admin'],
                    ['img' => 'image/strike.jpg', 'name' => 'Strike', 'role' => 'Modérateur'],
                    ['img' => 'image/touf.jpg', 'name' => 'Touf', 'role' => 'Modérateur'],
                    ['img' => 'image/Geoffrey.jpg', 'name' => 'GorthicaS', 'role' => 'Web Master et Manager e-sport'],
                ];
            @endphp

            @foreach ($staff as $member)
                <div class="staff-member">
                    <div class="staff-image-container">
                        <img src="{{ asset($member['img']) }}" alt="Photo de {{ $member['name'] }}">
                        <div class="staff-info">
                            <h3>{{ $member['name'] }}</h3>
                            <p>{{ $member['role'] }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </section>

    <section class="teams">
        @php
            $teams = [
                'Call Of Duty' => [
                    ['img' => 'image/NoProfil.png', 'name' => 'Joueur 1', 'pseudo' => 'Pseudo 1'],
                    ['img' => 'image/NoProfil.png', 'name' => 'Joueur 2', 'pseudo' => 'Pseudo 2'],
                    ['img' => 'image/NoProfil.png', 'name' => 'Joueur 3', 'pseudo' => 'Pseudo 3'],
                    ['img' => 'image/NoProfil.png', 'name' => 'Joueur 4', 'pseudo' => 'Pseudo 4'],
                    ['img' => 'image/NoProfil.png', 'name' => 'Joueur 5', 'pseudo' => 'Pseudo 5'],
                ],
            ];
        @endphp

        @foreach ($teams as $team_name => $team_members)
            <div class="team-banner" style="background-image: url('{{ asset('image/callof.jpg') }}');">
                <h2><img src="{{ asset('image/WZ2_Logo.png') }}" alt="Logo Call of Duty"> {{ $team_name }}</h2>
            </div>
            <div class="team-container">
                @foreach ($team_members as $member)
                    <div class="team-member">
                        <div class="team-image-container">
                            <img src="{{ asset($member['img']) }}" alt="Photo de {{ $member['name'] }}">
                            <div class="team-info">
                                <h3>{{ $member['name'] }}</h3>
                                <p>{{ $member['pseudo'] }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endforeach
    </section>
@endsection


