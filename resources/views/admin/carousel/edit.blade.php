@extends('layouts.layouthf')

@vite('resources/css/dashboard/adminDB.css')

@section('content')
<div class="admin-wrapper">
    <aside class="admin-sidebar">
        <div class="admin-sidebar-header">
            <a href="{{ route('dashboard.route') }}" class="admin-menu-item">
                <h2 class="admin-sidebar-title">Tableau de bord</h2>
            </a>
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
            <h1>Modifier le membre du carousel : {{ $member->name }}</h1>
        </div>
        <div class="admin-cards">
            <div class="admin-card" style="width: 100%;">
                <div class="admin-card-body">
                    <form action="{{ route('admin.carousel.update_member', $member->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <!-- Nom -->
                        <div class="form-group">
                            <label for="name">Nom</label>
                            <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $member->name) }}" required>
                            @error('name')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Description -->
                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea name="description" id="description" class="form-control" rows="5" required>{{ old('description', $member->description) }}</textarea>
                            @error('description')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Image -->
                        <div class="form-group">
                            <label for="image">Image</label>
                            <input type="text" name="image" id="image" class="form-control" value="{{ old('image', $member->image) }}" required>
                            @error('image')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Position -->
                        <div class="form-group">
                            <label for="position">Position</label>
                            <input type="text" name="position" id="position" class="form-control" value="{{ old('position', $member->position) }}" required>
                            @error('position')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Bouton actif -->
                        <div class="form-group">
                            <label for="active">Bouton actif</label>
                            <select name="active" id="active" class="form-control" required>
                                <option value="1" {{ old('active', $member->active) == 1 ? 'selected' : '' }}>Oui</option>
                                <option value="0" {{ old('active', $member->active) == 0 ? 'selected' : '' }}>Non</option>
                            </select>
                            @error('active')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary">Mettre à jour</button>
                    </form>
                </div>
            </div>
        </div>
    </main>
</div>
@endsection

