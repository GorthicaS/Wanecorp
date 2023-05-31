@extends('layouts.layouthf')



@section('content')
<link rel="stylesheet" href="{{ asset('public/css/dashboard/adminDB.css') }}">
<div class="admin-wrapper">
    <aside class="admin-sidebar">
        <div class="admin-sidebar-header">
            <a href="{{ route('dashboard.route') }}" class="admin-menu-item">
            <h2 class="admin-sidebar-title">Tableau de bord</h2>
        </div>
        <nav class="admin-menu">
                <li>
                    <a href="{{ route('admin.streamers.list') }}" class="admin-menu-item">
                        <i class="fas fa-video admin-menu-icon"></i>
                        <span class="admin-menu-label">Streamers</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.teams.list') }}" class="admin-menu-item">
                        <i class="fas fa-users admin-menu-icon"></i>
                        <span class="admin-menu-label">Équipes</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.users.list') }}" class="admin-menu-item">
                        <i class="fas fa-users admin-menu-icon"></i>
                        <span class="admin-menu-label">Utilisateurs</span>
                    </a>
                </li>
        </nav>
    </aside>

    <main class="admin-content">
        <div class="admin-header">
            <h1>Profil de {{ $streamer->name }}</h1>
        </div>
        <div class="admin-cards">
            <div class="admin-card" style="width: 100%;">
                <div class="admin-card-body">
                    <p>ID: {{ $streamer->id }}</p>
                    <p>Nom: {{ $streamer->name }}</p>

                    <a href="{{ route('admin.streamers.edit', $streamer->id) }}" class="btn btn-primary">Modifier</a>
                </div>
            </div>
        </div>
    </main>
</div>
@endsection
