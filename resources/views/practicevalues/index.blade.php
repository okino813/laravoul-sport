@extends('layouts/app') {{-- si tu as un layout commun --}}

@section('content')
    <div class="container">
        <a href="/home" class="back-btn">< Retours</a>
        <h1>Liste des valeurs d'entrainements</h1>

        <a href="{{ route('practicevalues.create') }}" class="btn btn-primary mb-3">Créer un entrainement</a>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Value</th>
                    <th>Practice</th>
                    <th>Field</th>
                    <th>Date</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($practicevalues as $practicevalue)
                <tr>
                    <td>{{ $practicevalue->id }}</td>
                    <td>{{ $practicevalue->value }}</td>
                    <td>{{ $practicevalue->field->name }}</td>
                    <td>{{ $practicevalue->practice->name }}</td>
                    <td>{{ $practicevalue->created_at->format('d/m/Y H:i') }}</td>
                    <td>
                        <a href="{{ route('practicevalues.show', $practicevalue) }}" class="btn btn-info btn-sm">Voir</a>
                        <a href="{{ route('practicevalues.edit', $practicevalue) }}" class="btn btn-warning btn-sm">Éditer</a>
                        <form action="{{ route('practicevalues.destroy', $practicevalue) }}" method="POST" class="d-inline">
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
