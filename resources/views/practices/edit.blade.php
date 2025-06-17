@extends('dashboard.header')

@section('title', 'Mon Dashboard')

@section('content')

    <div class="container">
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

        <form action="{{ route('dashboard.practices.update', $practice) }}" method="POST">
            @method('PUT')
            @csrf

            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" name="name" id="name" class="form-control" value="{{ $practice->name }}" required>
            </div>

            <div class="mb-3">
                <p><strong>Crée le : </strong> {{ $practice->created_at->format('d/m/Y H:i') }}</p>
                <p><strong>Groupe : </strong> {{ $practice->group->name}}</p>
                <p><strong>Sport : </strong> {{ $practice->sport->name }}</p>
            </div>





            <div class="mb-3">
                <input type="text" name="group_id" id="group_id" class="form-control" value="{{ $practice->group_id }}" required hidden>
            </div>

            <div class="mb-3">
                <input type="text" name="sport_id" id="sport_id" class="form-control" value="{{ $practice->sport_id }}" required hidden>
            </div>

            <div class="mb-3">
                <input type="text" name="user_id" id="user_id" class="form-control" value="{{ $practice->user_id }}" required hidden>
            </div>

            {{-- On affiche les champs--}}
            <div class="mb-3">
                <h2>Vos objectifs</h2>
                @foreach($practiceRelation->values as $value)
                    <label for="field_{{$value->field->id}}" class="form-label">
                        {{ $value->field->name }} en {{ $value->field->unit->name }}
                    </label>
                    <input type="text" name="fields[{{ $value->field->id }}]" id="field_{{ $value->field->id }}"
                        class="form-control" value="{{ $value->value }}" required >
                @endforeach
            </div>
            <button type="submit" class="btn btn-success">Modifier</button>
        </form>

         <form action="{{ route('dashboard.field.create', ['group' => $practice->group->id,"practice" => $practice->id]) }}" method="POST">
            @method('POST')
            @csrf
            {{-- On propose d'ajouter les champs--}}
            <div class="mb-3">
            <h2>Ajouter vos champs</h2>
                <label for="name" class="form-label">Nom du champs</label>
                <input type="text" name="name" id="name" class="form-control" required>

                <label for="value" class="form-label">Valeur du champs</label>
                <input type="text" name="value" id="value" class="form-control" required>

                <label for="unit" class="form-label">Unité</label>
                <select name="unit" id="unit" class="form-control" required>
                    @foreach ($units as $unit)
                        <option value="{{ $unit->id }}">
                            {{ $unit->name }}
                        </option>
                    @endforeach
                </select>

            </div>
            <button type="submit" class="btn btn-success">Ajouter</button>
        </form>
    </div>
@endsection
