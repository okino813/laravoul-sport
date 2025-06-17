@extends('dashboard.header')

@section('title', 'Mon Dashboard')

@section('content')
<div class="container py-5 text-light">
    <h1 class="mb-4 fw-bold text-danger">🏋️ Liste des entraînements</h1>

    <a href="{{ route('practices.create') }}" class="btn btn-primary mb-4">➕ Créer un entraînement</a>

    <table class="table table-bordered table-dark text-light align-middle">
        <thead class="table-danger">
            <tr>
                <th>Nom</th>
                <th>Sport</th>
                <th>Groupe</th>
                <th>Date</th>
                <th class="text-center">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($practiceRelation as $practice)
            <tr>
                <td>{{ $practice->name }}</td>
                <td>{{ $practice->sport->name }}</td>
                <td>{{ $practice->group->name }}</td>
                <td>{{ $practice->created_at->format('d/m/Y H:i') }}</td>
                <td class="text-center">
                    <a href="{{ route('practices.edit', $practice) }}" class="btn btn-info btn-sm me-2">🔍 Voir</a>
                    <form action="{{ route('practices.destroy', $practice) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm" onclick="return confirm('Supprimer cet entraînement ?')">🗑 Supprimer</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
