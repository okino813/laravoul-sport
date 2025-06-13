@extends('layouts.app') {{-- si tu as un layout commun --}}

@section('content')
    <div class="container">
        <a href="/home" class="back-btn">< Retours</a>
        <h1>Liste des groups</h1>

        <a href="{{ route('groups-sport.create') }}" class="btn btn-primary mb-3">Créer une relation</a>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Groupe</th>
                    <th>Sport</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($relations as $relation)
                <tr>
                    <td>{{ $relation->id }}</td>
                    <td>{{ $relation->group->name }}</td>
                    <td>{{ $relation->sport->name }}</td>
                    <td>
                        <form action="{{ route('groups-sport.destroy', $relation->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Supprimer</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
