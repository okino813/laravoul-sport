@extends('dashboard.header')

@section('title', 'Créer un groupe')

@section('content')
<div class="container py-5 text-light">
    <h1 class="mb-4 fw-bold text-danger">➕ Créer un groupe</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Erreurs :</strong>
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('groups.store') }}" method="POST" class="bg-dark p-4 rounded shadow border border-danger">
        @csrf

        <div class="mb-3">
            <label for="name" class="form-label text-danger">Nom du groupe</label>
            <input type="text" name="name" id="name" class="form-control bg-secondary text-light border-0" value="{{ old('name') }}" required>
        </div>

        <button type="submit" class="btn btn-danger">Créer</button>
    </form>
</div>
@endsection
