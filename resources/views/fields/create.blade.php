@extends('layouts.app')

@section('content')
    <div class="container">
        <a href="{{ route('fields.index') }}" class="back-btn">< Retours</a>
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

        <form action="{{ route('fields.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}" required>
            </div>

            <div class="mb-3">
                <label for="value" class="form-label">Value</label>
                <input type="text" name="value" id="value" class="form-control" value="{{ old('value') }}" required>
            </div>

            <div class="mb-3">
                <label for="unit_id" class="form-label">Unité choisie</label>
                <select name="unit_id" id="unit_id" class="form-control" required>
                    <option value="">-- Sélectionner une unité --</option>
                    @foreach ($units as $unit)
                        <option value="{{ $unit->id }}" {{ old('unit_id') == $unit->id ? 'selected' : '' }}>
                            {{ $unit->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="btn btn-success">Créer</button>
        </form>
    </div>
@endsection
