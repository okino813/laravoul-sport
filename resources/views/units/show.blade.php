@extends('layouts.app')

@section('content')
    <div class="container">
        <a href="{{ route('units.index') }}" class="back-btn">< Retours</a>
        <h1>Détails de l'unité</h1>

        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Name : {{ $unit->name }}</h5>
                <p class="card-text"><strong>Créé le :</strong> {{ $unit->created_at->format('d/m/Y H:i') }}</p>
                <p class="card-text"><strong>Mis à jour le :</strong> {{ $unit->updated_at->format('d/m/Y H:i') }}</p>

                <a href="{{ route('units.edit', $unit) }}" class="btn btn-warning">Modifier</a>

                <form action="{{ route('units.destroy', $unit) }}" method="POST" class="d-inline" onsubmit="return confirm('Confirmer la suppression ?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Supprimer</button>
                </form>
            </div>
        </div>
    </div>
@endsection
