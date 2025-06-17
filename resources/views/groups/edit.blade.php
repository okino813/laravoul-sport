@extends('dashboard.header')

@section('title', 'Édition du groupe')

@section('content')
<div class="container py-5 text-light">
    <h1 class="mb-4 fw-bold text-danger">✏️ Modifier le groupe</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Erreurs :</strong>
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{-- Formulaire de modification du nom --}}
    <div class="bg-dark p-4 rounded shadow border border-danger mb-4">
        <h4 class="text-danger mb-3">Modifier les informations du groupe</h4>
        <form action="{{ route('groups.update', $group) }}" method="POST" class="mb-0">
            @method('PUT')
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label text-danger">Nom du groupe</label>
                <input type="text" name="name" id="name" class="form-control bg-secondary text-light border-0" value="{{ $group->name }}" required>
            </div>
            <button type="submit" class="btn btn-danger">💾 Enregistrer</button>
        </form>
    </div>

    {{-- Affichage du coach --}}
    <div class="mb-4">
        <h5 class="text-danger">Coach référent</h5>
        <p class="text-muted mb-0">{{ $coach->email }}</p>
    </div>

    {{-- Ajout de membre --}}
    <div class="bg-dark p-4 rounded shadow border border-danger mb-4">
        <h4 class="text-danger mb-3">Ajouter un membre au groupe</h4>
        <form action="{{ route('members.store') }}" method="POST" class="mb-0">
            @csrf
            <input type="hidden" name="group_id" value="{{ $group->id }}">
            <div class="mb-3">
                <label for="user_id" class="form-label text-danger">Utilisateur</label>
                <select name="user_id" id="user_id" class="form-select bg-secondary text-light border-0" required>
                    <option disabled selected>-- Sélectionner un utilisateur --</option>
                    @foreach($usersNotInGroup as $user)
                        <option value="{{ $user->id }}">{{ $user->email }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-danger">➕ Ajouter</button>
        </form>
    </div>

    {{-- Liste des membres --}}
    <div class="bg-dark p-4 rounded shadow border border-danger mb-4">
        <h4 class="text-danger mb-3">Membres du groupe</h4>
        @foreach($members as $user)
            <form action="{{ route('dashboard.members.delete', ['group' => $group->id, 'member' => $user->user->id]) }}" method="POST" class="d-flex align-items-center justify-content-between mb-2">
                @csrf
                @method('DELETE')
                <p class="mb-0">{{ $user->user->email }}</p>
                <button class="btn btn-sm btn-outline-danger">🗑 Supprimer</button>
            </form>
        @endforeach
    </div>

    {{-- Ajout de sport --}}
    <div class="bg-dark p-4 rounded shadow border border-danger mb-4">
        <h4 class="text-danger mb-3">Ajouter un sport au groupe</h4>
        <form action="{{ route('dashboard.group.sport.create') }}" method="POST" class="mb-0">
            @csrf
            <input type="hidden" name="group_id" value="{{ $group->id }}">
            <div class="mb-3">
                <label for="sport_id" class="form-label text-danger">Sport</label>
                <select name="sport_id" id="sport_id" class="form-select bg-secondary text-light border-0" required>
                    <option disabled selected>-- Sélectionner un sport --</option>
                    @foreach($sportsNotInGroup as $sport)
                        <option value="{{ $sport->id }}">{{ $sport->name }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-danger">➕ Ajouter</button>
        </form>
    </div>

    {{-- Liste des sports --}}
    <div class="bg-dark p-4 rounded shadow border border-danger mb-5">
        <h4 class="text-danger mb-3">Sports associés</h4>
        @foreach($sportsGroup as $sport)
            <form action="{{ route('dashboard.groupsport.delete', ['group' => $group->id, 'sport' => $sport->id]) }}" method="POST" class="d-flex align-items-center justify-content-between mb-2">
                @csrf
                @method('DELETE')
                <p class="mb-0">{{ $sport->name }}</p>
                <button class="btn btn-sm btn-outline-danger">🗑 Supprimer</button>
            </form>
        @endforeach
    </div>

    <a href="{{ route('dashboard.group.show', $group->id) }}" class="btn btn-outline-danger">← Retour aux détails</a>
</div>
@endsection
