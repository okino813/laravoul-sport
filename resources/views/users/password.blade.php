@extends('dashboard.header')

@section('title', 'Modifier le mot de passe')

@section('content')
<div class="container py-5 text-light">
    <h1 class="mb-4 fw-bold text-danger">🔒 Modifier le mot de passe</h1>

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

    @if (session('success'))
        <div class="alert alert-success">
            ✅ {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('dashboard.users.password.update') }}" method="POST" class="bg-dark p-4 rounded shadow border border-danger">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="password" class="form-label text-danger">Nouveau mot de passe</label>
            <input type="password" name="password" id="password" class="form-control bg-secondary text-light border-0" required>
        </div>

        <div class="mb-3">
            <label for="passwordConfirm" class="form-label text-danger">Confirmation du mot de passe</label>
            <input type="password" name="passwordConfirm" id="passwordConfirm" class="form-control bg-secondary text-light border-0" required>
        </div>

        <div class="d-flex justify-content-between">
            <button type="submit" class="btn btn-danger">💾 Enregistrer</button>
        </div>
    </form>
</div>
@endsection
