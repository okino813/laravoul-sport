@extends('layouts.app')

@section('content')
   <div class="container">
        <a href="{{ route('practices.index') }}" class="back-btn">< Retour</a>
        <h1>Créer un entrainement</h1>

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

        <form action="{{ route('practices.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}" required>
            </div>

            <div class="mb-3">
                <label for="sport_id" class="form-label">Sport choisie</label>
                <select name="sport_id" id="sport_id" class="form-control" required>
                    @foreach ($sports as $sport)
                        <option value="{{ $sport->id }}">
                            {{ $sport->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="group_id" class="form-label">Groupe choisie</label>
                <select name="group_id" id="group_id" class="form-control" required>
                    @foreach ($groups as $group)
                        <option value="{{ $group->id }}">
                            {{ $group->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="user_id" class="form-label">User choisie</label>
                <select name="user_id" id="user_id" class="form-control" required>
                    @foreach ($users as $user)
                        <option value="{{ $user->id }}">
                            {{ $user->email }}
                        </option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="btn btn-success">Créer</button>
        </form>
</div>
@endsection
