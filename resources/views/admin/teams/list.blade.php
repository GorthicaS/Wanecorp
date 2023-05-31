{{-- resources/views/admin/teams/list.blade.php --}}

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
            <h1>Liste des équipes</h1>
        </div>
        <div class="admin-cards">
            <div class="admin-card" style="width: 100%;">
                <div class="admin-card-body">
                    <a href="{{ route('admin.teams.create') }}" class="btn btn-primary mb-3">Ajouter une équipe</a>

                    <table class="table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nom</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($teams as $team)
                                <tr>
                                    <td>{{ $team->id }}</td>
                                    <td>{{ $team->name }}</td>
                                    <td>
                                        <a href="{{ route('admin.teams.edit', $team->id) }}" class="btn btn-warning">Modifier</a>
                                        <form action="{{ route('admin.teams.delete', $team->id) }}" method="POST" style="display:inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Supprimer</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>
</div>
@endsection
