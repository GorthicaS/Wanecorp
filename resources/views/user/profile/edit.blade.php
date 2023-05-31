@extends('layouts.layouthf')

@section('content')
    <div class="user-wrapper">
        <aside class="user-sidebar">
            <!-- Sidebar content -->
        </aside>

        <div class="user-content">
            <div class="user-header">
                <h1>Modifier le profil</h1>
            </div>
            <div class="user-form">
                <form action="{{ route('user.profile.update') }}" method="POST">
                    @csrf
                    @method('PATCH')
                    <div class="form-group">
                        <label for="name">Nom:</label>
                        <input type="text" name="name" id="name" value="{{ $user->name }}">
                    </div>
                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="email" name="email" id="email" value="{{ $user->email }}">
                    </div>
                    <div class="form-group">
                        <label for="password">Mot de passe:</label>
                        <input type="password" name="password" id="password">
                    </div>
                    <div class="form-group">
                        <label for="password_confirmation">Confirmer le mot de passe:</label>
                        <input type="password" name="password_confirmation" id="password_confirmation">
                    </div>
                    <div class="form-actions">
                        <button type="submit" class="btn btn-primary">Enregistrer</button>
                        <a href="{{ route('user.profile') }}" class="btn btn-secondary">Annuler</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
