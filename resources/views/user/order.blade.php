@extends('layouts.layouthf')

@vite('resources/css/dashboard/userDB.css')

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
        <div class="user-content">
            <h1>Profil de {{ $user->name }}</h1>

            <h2>Mes commandes</h2>
            @if ($orders->isEmpty())
                <p>Aucune commande trouvée.</p>
            @else
                <ul>
                    @foreach ($orders as $order)
                        <li>{{ $order->id }} - {{ $order->created_at }}</li>
                    @endforeach
                </ul>
            @endif

            <a href="{{ url('/shop') }}" class="btn btn-primary">Repasser une commande</a>
        </div>
    </div>
@endsection
