@extends('layouts.app') {{-- si tu as un layout commun --}}

@section('content')
    <div class="container">
        <a href="/home" class="back-btn">< Retours</a>
        <h1>Liste des utilisateurs</h1>

        <a href="{{ route('fields.create') }}" class="btn btn-primary mb-3">Créer un nouvel utilisateur</a>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nom</th>
                    <th>Email</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($fields as $field)
                <tr>
                    <td>{{ $field->id }}</td>
                    <td>{{ $field->name }}</td>
                    <td>{{ $field->email }}</td>
                    <td>
                        <a href="{{ route('fields.show', $field) }}" class="btn btn-info btn-sm">Voir</a>
                        <a href="{{ route('fields.edit', $field) }}" class="btn btn-warning btn-sm">Éditer</a>
                        <form action="{{ route('fields.destroy', $field) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm" onclick="return confirm('Supprimer cet utilisateur ?')">Supprimer</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
