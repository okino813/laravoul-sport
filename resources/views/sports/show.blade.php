@extends('layouts.app')

@section('content')
    <div class="container">
        <a href="{{ route('sports.index') }}" class="back-btn">< Retours</a>
        <h1>Détails du sport</h1>

        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Name : {{ $sport->name }}</h5>
                <p class="card-text"><strong>Créé le :</strong> {{ $sport->created_at->format('d/m/Y H:i') }}</p>
                <p class="card-text"><strong>Mis à jour le :</strong> {{ $sport->updated_at->format('d/m/Y H:i') }}</p>

                <a href="{{ route('sports.edit', $sport) }}" class="btn btn-warning">Modifier</a>

                <form action="{{ route('sports.destroy', $sport) }}" method="POST" class="d-inline" onsubmit="return confirm('Confirmer la suppression ?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Supprimer</button>
                </form>
            </div>
        </div>
    </div>
@endsection
