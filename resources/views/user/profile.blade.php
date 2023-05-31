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
            <ul>
                <li>
                    <a href="{{ route('user.profile') }}" class="user-menu-item active">
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
            </ul>
        </nav>
    </aside>

    <div class="user-card">
        <div class="user-card-header">
            <h2 class="user-card-title">Profil Utilisateur</h2>
        </div>
        <div class="user-card-body">
            @if (session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif
            <table>
                <tr>
                    <td>Nom:</td>
                    <td>{{ $user->name }}</td>
                </tr>
                <tr>
                    <td>Email:</td>
                    <td>{{ $user->email }}</td>
                </tr>
                <div class="user-card-buttons">
                    <a href="{{ route('user.profile.edit') }}" class="btn btn-primary">Modifier</a>
                    <form action="{{ route('user.profile.destroy') }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Supprimer</button>
                    </form>
                </div>
            </table>
        </div>
    </div>
    
</div>
@endsection
