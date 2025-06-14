@extends('layouts.app')

@section('content')
   <div class="container">
        <a href="{{ route('practicevalues.index') }}" class="back-btn">< Retour</a>
        <h1>Créer une valeur d'entrainement</h1>

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

        <form action="{{ route('practicevalues.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label for="value" class="form-label">Value</label>
                <input type="text" name="value" id="value" class="form-control" value="{{ old('value') }}" required>
            </div>

            <div class="mb-3">
                <label for="practice_id" class="form-label">Entrainement choisie</label>
                <select name="practice_id" id="practice_id" class="form-control" required>
                    @foreach ($practices as $practice)
                        <option value="{{ $practice->id }}">
                            {{ $practice->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="field_id" class="form-label">Field choisie</label>
                <select name="field_id" id="field_id" class="form-control" required>
                    @foreach ($fields as $field)
                        <option value="{{ $field->id }}">
                            {{ $field->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="btn btn-success">Créer</button>
        </form>
</div>
@endsection
