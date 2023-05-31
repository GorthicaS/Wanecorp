

@extends('layouts.layouthf')

@section('content')
<link rel="stylesheet" href="{{ asset('public/css/dashboard/adminDB.css') }}">
<div class="container">
    <h1>Profil de {{ $user->name }}</h1>
    <p>ID: {{ $user->id }}</p>
    <p>Nom: {{ $user->name }}</p>
    <p>Email: {{ $user->email }}</p>

    <a href="{{ route('admin.users.edit', $user->id) }}" class="btn btn-primary">Modifier</a>
    <a href="{{ route('admin.sendPasswordResetEmail', $user->id) }}" class="btn btn-warning">Envoyer un email de réinitialisation de mot de passe</a>
</div>
@endsection
