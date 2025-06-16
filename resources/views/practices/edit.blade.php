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

            {{-- On affiche les champs--}}
            <div class="mb-3">
            <h2>Vos objectifs</h2>
            @foreach($practiceRelation->values as $values)
                     <label for="{{$values->field->name}}" class="form-label">{{$values->field->name}} en {{$values->field->unit->name}}</label>
                    <input type="text" name="{{$values->field->name}}" id="{{$values->field->name}}" class="form-control" value="{{$values->value}}" required>
            @endforeach
            </div>
            <button type="submit" class="btn btn-success">Modifier</button>
        </form>

         <form action="{{ route('dashboard.field.create', ['group' => $practice->group->id,"practice" => $practice->id]) }}" method="POST">
            @method('POST')
            @csrf

            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" name="name" id="name" class="form-control" value="{{ $practice->name }}" required>
            </div>

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
            <button type="submit" class="btn btn-success">Modifier</button>
        </form>
    </div>
@endsection
