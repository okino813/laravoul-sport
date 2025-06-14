@extends('layouts.app')

@section('content')
    <div class="container">
        <a href="{{ route('groups-sport.index') }}" class="back-btn">< Retours</a>
        <h1>Créer un group sport</h1>

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

        <form action="{{ route('groups-sport.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                 <label for="group_id">Groupe :</label>
                <select name="group_id" required>
                    @foreach($groups as $group)
                        <option value="{{ $group->id }}">{{ $group->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="sport_id">Sport :</label>
                <select name="sport_id" required>
                    @foreach($sports as $sport)
                        <option value="{{ $sport->id }}">{{ $sport->name }}</option>
                    @endforeach
                </select>
            </div>


            <button type="submit" class="btn btn-success">Créer</button>
        </form>
    </div>
@endsection
