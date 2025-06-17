@extends('dashboard.header')

@section('title', 'Créer un entraînement')

@section('content')
<div class="container py-5 text-light">
    <h1 class="mb-4 fw-bold text-danger">➕ Créer un entraînement</h1>

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

    <form action="{{ route('practices.store') }}" method="POST" class="bg-dark p-4 rounded shadow border border-danger">
        @csrf

        <div class="mb-3">
            <label for="name" class="form-label text-danger">Nom de l'entraînement</label>
            <input type="text" name="name" id="name" class="form-control bg-secondary text-light border-0" value="{{ old('name') }}" required>
        </div>

        <div class="mb-3">
            <label for="champs" class="form-label text-danger">Sport choisi</label>
            <select name="champs" id="champs" class="form-select bg-secondary text-light border-0" required>
                @foreach ($groups as $group)
                    @foreach($group->sports as $sport)
                        <option value="{{ $group->id }}-{{ $sport->id }}">
                            {{ $group->name }} - {{ $sport->name }}
                        </option>
                    @endforeach
                @endforeach
            </select>
        </div>

        <input type="hidden" name="user_id" value="{{ $user->id }}">

        <button type="submit" class="btn btn-danger">Créer</button>
    </form>
</div>
@endsection
