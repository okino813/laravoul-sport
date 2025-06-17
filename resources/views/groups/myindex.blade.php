@extends('dashboard.header')

@section('title', 'Mon Dashboard')

@section('content')
<div class="container py-5 text-light">
    <h1 class="mb-4 fw-bold text-danger">📋 Liste des groupes</h1>

    <table class="table table-bordered table-dark text-light align-middle">
        <thead class="table-danger">
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
                    <a href="{{ route('dashboard.group.showview', $group) }}" class="btn btn-info btn-sm me-1">Voir</a>
                    <a href="{{ route('dashboard.group.edit', $group) }}" class="btn btn-warning btn-sm me-1">Éditer</a>
                    <form action="{{ route('dashboard.group.destroy', $group) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm" onclick="return confirm('Supprimer ce groupe ?')">Supprimer</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
