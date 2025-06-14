@extends('layouts.app') {{-- si tu as un layout commun --}}

@section('content')
    <div class="container">
        <a href="/home" class="back-btn">< Retours</a>
        <h1>Liste des groups</h1>

        <a href="{{ route('groups.create') }}" class="btn btn-primary mb-3">Créer un group</a>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nom</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($groups as $group)
                <tr>
                    <td>{{ $group->id }}</td>
                    <td>{{ $group->name }}</td>
                    <td>
                        <a href="{{ route('groups.show', $group) }}" class="btn btn-info btn-sm">Voir</a>
                        <a href="{{ route('groups.edit', $group) }}" class="btn btn-warning btn-sm">Éditer</a>
                        <form action="{{ route('groups.destroy', $group) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm" onclick="return confirm('Supprimer ce group ?')">Supprimer</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
