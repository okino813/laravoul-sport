@extends('layouts.app') {{-- si tu as un layout commun --}}

@section('content')
    <div class="container">
        <a href="/home" class="back-btn">< Retours</a>
        <h1>Liste des sports</h1>

        <a href="{{ route('sports.create') }}" class="btn btn-primary mb-3">Créer un sport</a>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nom</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($sports as $sport)
                <tr>
                    <td>{{ $sport->id }}</td>
                    <td>{{ $sport->name }}</td>
                    <td>
                        <a href="{{ route('sports.show', $sport) }}" class="btn btn-info btn-sm">Voir</a>
                        <a href="{{ route('sports.edit', $sport) }}" class="btn btn-warning btn-sm">Éditer</a>
                        <form action="{{ route('sports.destroy', $sport) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm" onclick="return confirm('Supprimer ce sport ?')">Supprimer</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
