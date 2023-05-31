{{-- resources/views/admin/teams/show.blade.php --}}

@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="{{ asset('public/css/dashboard/adminDB.css') }}">
<div class="container">
    <h1>Profil de l'équipe {{ $team->name }}</h1>
    <p>ID: {{ $team->id }}</p>
    <p>Nom: {{ $team->name }}</p>

    <a href="{{ route('admin.teams.edit', $team->id) }}" class="btn btn-primary">Modifier</a>
</div>
@endsection
