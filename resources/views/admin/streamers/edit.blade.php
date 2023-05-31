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
            <h1>Modifier le streamer : {{ $streamer->name }}</h1>
        </div>
        <div class="admin-cards">
            <div class="admin-card" style="width: 100%;">
                <div class="admin-card-body">
                    <form action="{{ route('admin.streamers.update', $streamer->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <!-- Nom d'utilisateur -->
                        <div class="form-group">
                            <label for="username">Nom d'utilisateur</label>
                            <input type="text" name="username" id="username" class="form-control" value="{{ old('username', $streamer->username) }}" required>
                            @error('username')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Nom -->
                        <div class="form-group">
                            <label for="name">Nom</label>
                            <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $streamer->name) }}" required>
                            @error('name')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Description -->
                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea name="description" id="description" class="form-control" rows="5" required>{{ old('description', $streamer->description) }}</textarea>
                            @error('description')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Chaîne Twitch -->
                        <div class="form-group">
                            <label for="twitch_channel">Chaîne Twitch</label>
                            <input type="text" name="twitch_channel" id="twitch_channel" class="form-control" value="{{ old('twitch_channel', $streamer->twitch_channel) }}" required>
                            @error('twitch_channel')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- URL de l'avatar (facultatif) -->
                        <div class="form-group">
                            <label for="avatar">URL de l'avatar (facultatif)</label>
                            <input type="url" name="avatar" id="avatar" class="form-control" value="{{ old('avatar', $streamer->avatar) }}">
                            @error('avatar')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary">Mettre à jour</button>
                    </form>
                </div>
            </div>
        </div>
    </main>
</div>
@endsection    
