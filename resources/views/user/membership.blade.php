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
        <h2 class="user-content-title">Adhésion</h2>
        <div class="user-card">
            <div class="user-card-header">
                <h3 class="user-card-title">Statut d'adhésion</h3>
            </div>
            <div class="user-card-body">
                @if ($user->membership)

                <span class="membership-label membership-active">Membre</span>
            
                @if($user->payment_date)
                    @php
            
                        $expirationDate = $user->payment_date->addYear()->format('Y-m-d');
            
                        $daysRemaining = now()->diffInDays($expirationDate);
            
                    @endphp
            
                    <div class="membership-duration">
            
                        <span class="membership-duration-label">Dernier paiement :</span>
            
                        <span class="membership-duration-date">{{ $user->payment_date->format('Y-m-d') }}</span>
            
                        <span class="membership-duration-label">Valable jusqu'au :</span>
            
                        <span class="membership-duration-date">{{ $expirationDate }}</span>
            
                        @if ($daysRemaining <= 90)
            
                            <span class="membership-duration-remaining">{{ $daysRemaining }} jours restants</span>
            
                        @endif
            
                    </div>
                @endif
            
            @else
                    <span class="membership-label membership-inactive">Non membre</span>
                @endif
            </div>
        </div>
    </div>
</div>

</div>
@endsection
