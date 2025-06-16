@extends('dashboard.header')

@section('title', 'Mon Dashboard')

@section('content')
    <div class="container">
        <h1>Détails du group</h1>

        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Name : {{ $group->name }}</h5>
                <p class="card-text"><strong>Créé le :</strong> {{ $group->created_at->format('d/m/Y H:i') }}</p>
                <p class="card-text"><strong>Mis à jour le :</strong> {{ $group->updated_at->format('d/m/Y H:i') }}</p>


                <form action="{{ route('groups.destroy', $group) }}" method="POST" class="d-inline" onsubmit="return confirm('Confirmer la suppression ?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Supprimer</button>
                </form>
            </div>
        </div>
    </div>
@endsection
