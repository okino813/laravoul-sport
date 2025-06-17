@extends('dashboard.header')

@section('title', 'Modifier un utilisateur')

@section('content')
<div class="container py-5 text-light">
    <h1 class="mb-4 fw-bold text-danger">✏️ Modifier un utilisateur</h1>

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

    <form action="{{ route('dashboard.users.update') }}" method="POST" class="bg-dark p-4 rounded shadow border border-danger">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="firstname" class="form-label text-danger">Prénom</label>
            <input type="text" name="firstname" id="firstname" class="form-control bg-secondary text-light border-0" value="{{ $user->firstname }}" required>
        </div>

        <div class="mb-3">
            <label for="lastname" class="form-label text-danger">Nom</label>
            <input type="text" name="lastname" id="lastname" class="form-control bg-secondary text-light border-0" value="{{ $user->lastname }}" required>
        </div>

        <div class="mb-3">
            <label for="email" class="form-label text-danger">Adresse email</label>
            <input type="email" name="email" id="email" class="form-control bg-secondary text-light border-0" value="{{ $user->email }}" required>
        </div>

        <div class="d-flex justify-content-between">
            <button type="submit" class="btn btn-danger">💾 Enregistrer</button>
        </div>
    </form>
</div>
@endsection
