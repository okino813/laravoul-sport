@extends('layouts.app')

@section('content')
    <div class="container">
        <a href="{{ route('users.index') }}" class="back-btn">< Retours</a>
        <h1>Créer un nouvel utilisateur</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <strong>Erreurs :</strong>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('users.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label for="firstname" class="form-label">Firstname</label>
                <input type="text" name="firstname" id="firstname" class="form-control" value="{{ old('firstname') }}" required>
            </div>

            <div class="mb-3">
                <label for="lastname" class="form-label">Lastname</label>
                <input type="text" name="lastname" id="lastname" class="form-control" value="{{ old('lastname') }}" required>
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Adresse email</label>
                <input type="email" name="email" id="email" class="form-control" value="{{ old('email') }}" required>
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">Mot de passe</label>
                <input type="password" name="password" id="password" class="form-control" required>
            </div>

            <button type="submit" class="btn btn-success">Créer</button>
        </form>
    </div>
@endsection
