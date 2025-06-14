@extends('layouts.app')

@section('content')
    <div class="container">
        <a href="{{ route('fields.index') }}" class="back-btn">< Retours</a>
        <h1>Editer un field</h1>

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

        <form action="{{ route('fields.update', $field) }}" method="POST">
            @method('PUT')
            @csrf

            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" name="name" id="name" class="form-control" value="{{ $field->name }}" required>
            </div>

             <div class="mb-3">
                <label for="unit_id" class="form-label">Unité</label>
                <select name="unit_id" id="unit_id" class="form-control" required>
                    @foreach ($units as $unit)
                        <option value="{{old('unit_id', $unit->id)}}" {{$field->unit->id == $unit->id ? 'selected' : '' }}>
                            {{ $unit->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="btn btn-success">Modifier</button>
        </form>
    </div>
@endsection
