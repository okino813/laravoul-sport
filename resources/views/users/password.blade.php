@extends('dashboard.header')

@section('title', 'Mon Dashboard')

@section('content')
    <div class="container">
        <h1>Editer un utilisateur</h1>

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

        <form action="{{ route('dashboard.users.password.update') }}" method="POST">
            @method('PUT')
            @csrf

            <div class="mb-3">
                <label for="password" class="form-label">Nouveau mot de passe</label>
                <input type="password" name="password" id="password" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="passwordConfirm" class="form-label">Password Confirm</label>
                <input type="password" name="passwordConfirm" id="passwordConfirm" class="form-control" required>
            </div>

            <button type="submit" class="btn btn-success">Modifier</button>
        </form>
    </div>
@endsection
