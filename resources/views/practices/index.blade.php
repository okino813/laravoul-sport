@extends('dashboard.header')

@section('title', 'Mon Dashboard')

@section('content')
    <div class="container">
        <h1>Liste des entrainements</h1>

        <a href="{{ route('practices.create') }}" class="btn btn-primary mb-3">Créer un entrainement</a>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Nom</th>
                    <th>Sport</th>
                    <th>Group</th>
                    <th>Date</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($practiceRelation as $practice)
                <tr>
                    <td>{{ $practice->name }}</td>
                    <td>{{ $practice->sport->name }}</td>
                    <td>{{ $practice->group->name }}</td>
                    <td>{{ $practice->created_at->format('d/m/Y H:i') }}</td>
                    <td>
                        <a href="{{ route('practices.edit', $practice) }}" class="btn btn-info btn-sm">Voir</a>
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
