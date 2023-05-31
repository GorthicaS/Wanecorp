@extends('layouts.layouthf')

@section('content')
<link rel="stylesheet" href="{{ asset('public/css/dashboard/adminDB.css') }}">
<div class="container">
    <h1>Edit Team</h1>
    <form action="{{ route('admin.teams.update', $team->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Team Name</label>
            <input type="text" name="name" id="name" value="{{ $team->name }}" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="game">Game</label>
            <input type="text" name="game" id="game" value="{{ $team->game }}" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="banner_image">Banner Image</label>
            <input type="file" name="banner_image" id="banner_image" class="form-control">
            <img src="{{ asset($team->banner_image) }}" alt="Team Banner" width="200">
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
