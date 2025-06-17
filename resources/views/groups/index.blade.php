@extends('dashboard.header')

@section('title', 'Mon Dashboard')

@section('content')
<div class="container py-5 text-light">
    <h1 class="mb-4 fw-bold text-danger">📋 Liste des groupes</h1>

    <table class="table table-bordered table-dark text-light align-middle">
        <thead class="table-danger">
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Nom</th>
                <th scope="col" class="text-center">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($groups as $group)
            <tr>
                <td>{{ $group->id }}</td>
                <td>{{ $group->name }}</td>
                <td class="text-center">
                    <a href="{{ route('dashboard.group.showview', $group) }}" class="btn btn-sm btn-danger">
                        🔍 Voir
                    </a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
