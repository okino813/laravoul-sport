@extends('dashboard.header')

@section('title', 'Mon Dashboard')

@section('content')
   <div class="container">
        <h1>Créer un entrainement</h1>

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

        <form action="{{ route('practices.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}" required>
            </div>

            <div class="mb-3">
                <label for="champs" class="form-label">Sport choisie</label>
                <select name="champs" id="champs" class="form-control" required>
                    @foreach ($groups as $group)
                        @foreach($group->sports as $sport)
                            <option value="{{ $group->id }}-{{$sport->id}}">
                                {{ $group->name }} - {{$sport->name}}
                            </option>
                        @endforeach
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <select name="user_id" id="user_id" class="form-control" required hidden>
                        <option value="{{ $user->id }}">
                            {{ $user->email }}
                        </option>
                </select>
            </div>

            <button type="submit" class="btn btn-success">Créer</button>
        </form>
</div>
@endsection
