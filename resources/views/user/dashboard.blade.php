@extends('layouts.layouthf')

<link rel="stylesheet" href="{{ asset('public/css/dashboard/userDB.css') }}">

@section('content')

<div class="user-wrapper">
    <aside class="user-sidebar">
        <div class="user-sidebar-header">
            <a href="{{ route('dashboard.route') }}" class="user-menu-item"></a>
            <h2 class="user-sidebar-title">Tableau de bord</h2>
        </div>
        <nav class="user-menu">
                <li>
                    <a href="{{ route('user.profile') }}" class="user-menu-item">
                        <i class="fas fa-user-circle user-menu-icon"></i>
                        <span class="user-menu-label">Profil</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('user.orders') }}" class="user-menu-item">
                        <i class="fas fa-clipboard-list user-menu-icon"></i>
                        <span class="user-menu-label">Commandes</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('user.membership') }}" class="user-menu-item">
                        <i class="fas fa-id-card user-menu-icon"></i>
                        <span class="user-menu-label">Adhérent</span>
                    </a>
                </li>
        </nav>
    </aside>

    <main class="user-content">
        <div class="user-header">
            <h1>Mon espace</h1>
        </div>
        <div class="user-cards">
            <!-- Charger le contenu du profil -->
            @include('user.profile', ['user' => $user])
        </div>
    </main>
</div>
@endsection
