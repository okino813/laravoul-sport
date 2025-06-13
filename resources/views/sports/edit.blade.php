@extends('layouts.app')

@section('content')
    <div class="container">
        <a href="{{ route('sports.index') }}" class="back-btn">< Retours</a>
        <h1>Editer un sport</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <strong>Erreurs :</strong>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('sports.update', $sport) }}" method="POST">
            @method('PUT')
            @csrf

            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" name="name" id="name" class="form-control" value="{{ $sport->name }}" required>
            </div>

            <button type="submit" class="btn btn-success">Modifier</button>
        </form>
    </div>
@endsection
