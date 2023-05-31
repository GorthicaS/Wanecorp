@extends('layouts.layouthf')


@section('content')
<link rel="stylesheet" href="{{ asset('public/css/dashboard/adminDB.css') }}">
<div class="admin-wrapper">
    <aside class="admin-sidebar">
        <div class="admin-sidebar-header">
            <a href="{{ route('dashboard.route') }}" class="admin-menu-item">
                <h2 class="admin-sidebar-title">Tableau de bord</h2>
            </a>
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
            <li>
                <a href="{{ route('admin.orders.list') }}" class="admin-menu-item">
                    <i class="fas fa-shopping-cart admin-menu-icon"></i>
                    <span class="admin-menu-label">Commandes</span>
                </a>
            </li>
            <li>
                <a href="{{ route('admin.carousel.list') }}" class="admin-menu-item">
                    <i class="fas fa-users admin-menu-icon"></i>
                    <span class="admin-menu-label">Carousel</span>
                </a>
            </li>
        </nav>
    </aside>

    <main class="admin-content">
        <div class="admin-header">
            <h1>Liste des membres du carousel</h1>
        </div>
        <div class="admin-cards">
            <div class="admin-card" style="width: 100%;">
                <div class="admin-card-body">
                    <a href="{{ route('admin.carousel.add_member') }}" class="btn btn-primary mb-3">Ajouter un membre</a>

                    <table class="table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nom</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($staffMembers as $member)
                                <tr>
                                    <td>{{ $member->id }}</td>
                                    <td>{{ $member->name }}</td>
                                    <td>
                                        <form action="{{ route('admin.carousel.delete_member', $member->id) }}" method="POST" style="display: inline;">
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
