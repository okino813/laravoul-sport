@extends('layouts.app')

@section('content')
    <div class="container">
        <a href="{{ route('fields.index') }}" class="back-btn">< Retours</a>
        <h1>Détails du field</h1>

        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Nom : {{ $field->name }}</h5>
                <p class="card-text"><strong>Unité :</strong> {{ $field->unit->name }}</p>
                <p class="card-text"><strong>Créé le :</strong> {{ $field->created_at->format('d/m/Y H:i') }}</p>
                <p class="card-text"><strong>Mis à jour le :</strong> {{ $field->updated_at->format('d/m/Y H:i') }}</p>

                <a href="{{ route('fields.edit', $field) }}" class="btn btn-warning">Modifier</a>

                <form action="{{ route('fields.destroy', $field) }}" method="POST" class="d-inline" onsubmit="return confirm('Confirmer la suppression ?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Supprimer</button>
                </form>
            </div>
        </div>
    </div>
@endsection
