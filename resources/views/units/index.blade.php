@extends('layouts.app') {{-- si tu as un layout commun --}}

@section('content')
    <div class="container">
        <a href="/home" class="back-btn">< Retours</a>
        <h1>Liste des unités</h1>

        <a href="{{ route('units.create') }}" class="btn btn-primary mb-3">Créer une unité</a>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($units as $unit)
                <tr>
                    <td>{{ $unit->id }}</td>
                    <td>{{ $unit->name }}</td>
                    <td>
                        <a href="{{ route('units.show', $unit) }}" class="btn btn-info btn-sm">Voir</a>
                        <a href="{{ route('units.edit', $unit) }}" class="btn btn-warning btn-sm">Éditer</a>
                        <form action="{{ route('units.destroy', $unit) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm" onclick="return confirm('Supprimer cette unité ?')">Supprimer</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
