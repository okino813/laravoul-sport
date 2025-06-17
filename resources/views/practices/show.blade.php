@extends('dashboard.header')

@section('title', 'Mon Dashboard')

@section('content')
    <div class="container">
        <h1>Détails de l'entrainement</h1>

        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Name : {{ $practiceRelation->name }}</h5>
                <h5 class="card-title">User : {{ $practiceRelation->user->email }}</h5>
                <h5 class="card-title">Sport : {{ $practiceRelation->sport->name }}</h5>
                <h5 class="card-title">Group : {{ $practiceRelation->group->name }}</h5>
                <p class="card-text"><strong>Créé le :</strong> {{ $practiceRelation->created_at->format('d/m/Y H:i') }}</p>
                <p class="card-text"><strong>Mis à jour le :</strong> {{ $practiceRelation->updated_at->format('d/m/Y H:i') }}</p>

                <h3>Les champs</h3>

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
