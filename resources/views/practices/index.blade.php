@extends('layouts.app') {{-- si tu as un layout commun --}}

@section('content')
    <div class="container">
        <a href="/home" class="back-btn">< Retours</a>
        <h1>Liste des entrainements</h1>

        <a href="{{ route('practices.create') }}" class="btn btn-primary mb-3">Créer un nouvel utilisateur</a>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nom</th>
                    <th>Date</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($practices as $practice)
                <tr>
                    <td>{{ $practice->id }}</td>
                    <td>{{ $practice->name }}</td>
                    <td>{{ $practice->created_at->format('d/m/Y H:i') }}</td>
                    <td>
                        <a href="{{ route('practices.show', $practice) }}" class="btn btn-info btn-sm">Voir</a>
                        <a href="{{ route('practices.edit', $practice) }}" class="btn btn-warning btn-sm">Éditer</a>
                        <form action="{{ route('practices.destroy', $practice) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm" onclick="return confirm('Supprimer cet entrainement ?')">Supprimer</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
