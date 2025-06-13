@extends('layouts.app')

@section('content')
    <div class="container">
        <a href="{{ route('practices.index') }}" class="back-btn">< Retours</a>
        <h1>Editer un entrainement</h1>

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

        <form action="{{ route('practices.update', $practice) }}" method="POST">
            @method('PUT')
            @csrf

            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" name="name" id="name" class="form-control" value="{{ $practice->name }}" required>
            </div>

            <div class="mb-3">
                <label for="sport_id" class="form-label">Sports</label>
                <select name="sport_id" id="sport_id" class="form-control" required>
                    @foreach ($sports as $sport)
                        <option value="{{old('sport_id', $sport->id)}}" {{$practice->sport->id == $sport->id ? 'selected' : '' }}>
                            {{ $sport->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="user_id" class="form-label">Users</label>
                <select name="user_id" id="user_id" class="form-control" required>
                    @foreach ($users as $user)
                        <option value="{{old('user_id', $user->id)}}" {{$practice->user->id == $user->id ? 'selected' : '' }}>
                            {{ $user->email }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="group_id" class="form-label">Group</label>
                <select name="group_id" id="group_id" class="form-control" required>
                    @foreach ($groups as $group)
                        <option value="{{old('group_id', $group->id)}}" {{$practice->group->id == $group->id ? 'selected' : '' }}>
                            {{ $group->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="btn btn-success">Modifier</button>
        </form>
    </div>
@endsection
