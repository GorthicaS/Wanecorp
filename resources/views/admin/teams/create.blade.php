@extends('layouts.layouthf')

@section('content')
<link rel="stylesheet" href="{{ asset('public/css/dashboard/adminDB.css') }}">
<div class="container">
    <h1>Create Team</h1>
    <form action="{{ route('admin.teams.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="name">Team Name</label>
            <input type="text" name="name" id="name" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="game">Game</label>
            <input type="text" name="game" id="game" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="banner_image">Banner Image</label>
            <input type="file" name="banner_image" id="banner_image" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Create</button>
    </form>
</div>
@endsection
