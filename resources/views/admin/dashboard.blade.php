
@extends('layouts.layouthf')



@section('content')
<link rel="stylesheet" href="{{ asset('public/css/dashboard/adminDB.css') }}">
<div class="admin-wrapper">
    <aside class="admin-sidebar">
        <div class="admin-sidebar-header">
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
            <h1>Gestion du site</h1>
        </div>
        <div class="admin-cards">
            <div class="admin-card">
                <div class="admin-card-header">
                    <h3 class="admin-card-title">Streamers</h3>
                </div>
                <div class="admin-card-body">
                    <p class="admin-card-text">Total : {{ $streamersCount }}</p>
                </div>
            </div>

            <div class="admin-card">
                <div class="admin-card-header">
                    <h3 class="admin-card-title">Équipes</h3>
                </div>
                <div class="admin-card-body">
                    <p class="admin-card-text">Total : {{ $teamsCount }}</p>

                </div>
            </div>

            <div class="admin-card">
                <div class="admin-card-header">
                    <h3 class="admin-card-title">Membres</h3>
                </div>
                <div class="admin-card-body">
                    <p class="admin-card-text">Total : {{ $userCount }}</p>
                </div>
            </div>
        </div>
    </main>
</div>
@endsection
