@extends('layouts.app')

@section('content')
    <div class="container">
        <a href="{{ route('users.index') }}" class="back-btn">< Retours</a>
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

        <form action="{{ route('users.update', $user) }}" method="POST">
            @method('PUT')
            @csrf

            <div class="mb-3">
                <label for="firstname" class="form-label">Firstname</label>
                <input type="text" name="firstname" id="firstname" class="form-control" value="{{ $user->firstname }}" required>
            </div>

            <div class="mb-3">
                <label for="lastname" class="form-label">Lastname</label>
                <input type="text" name="lastname" id="lastname" class="form-control" value="{{ $user->lastname }}" required>
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Adresse email</label>
                <input type="email" name="email" id="email" class="form-control" value="{{ $user->email }}" required>
            </div>

            <button type="submit" class="btn btn-success">Modifier</button>
        </form>
    </div>
@endsection
