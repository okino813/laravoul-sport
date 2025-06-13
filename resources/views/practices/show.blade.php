@extends('layouts.app')

@section('content')
    <div class="container">
        <a href="{{ route('practices.index') }}" class="back-btn">< Retours</a>
        <h1>Détails de l'entrainement</h1>

        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Name : {{ $practice->name }}</h5>
                <h5 class="card-title">User : {{ $practice->user->email }}</h5>
                <h5 class="card-title">Sport : {{ $practice->sport->name }}</h5>
                <h5 class="card-title">Group : {{ $practice->group->name }}</h5>
                <p class="card-text"><strong>Créé le :</strong> {{ $practice->created_at->format('d/m/Y H:i') }}</p>
                <p class="card-text"><strong>Mis à jour le :</strong> {{ $practice->updated_at->format('d/m/Y H:i') }}</p>

                <a href="{{ route('practices.edit', $practice) }}" class="btn btn-warning">Modifier</a>

                <form action="{{ route('practices.destroy', $practice) }}" method="POST" class="d-inline" onsubmit="return confirm('Confirmer la suppression ?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Supprimer</button>
                </form>
            </div>
        </div>
    </div>
@endsection
