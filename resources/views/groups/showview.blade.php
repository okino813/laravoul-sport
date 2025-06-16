@extends('dashboard.header')

@section('title', 'Mon Dashboard')

@section('content')
    <div class="container">
        <h1>Détails du group</h1>

        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Name : {{ $group->name }}</h5>
                <p class="card-text"><strong>Créé le :</strong> {{ $group->created_at->format('d/m/Y') }}</p>
                <p class="card-text"><strong>Le  :</strong> {{$coach->firstname}} {{$coach->lastname}}</p>

                <p class="card-text"><strong>Les membres :</strong></p>

                @foreach($members as $membre)
                    <p>{{$membre->user->firstname}}</p>
                @endforeach

                <p class="card-text"><strong>Les sports pratiqué :</strong></p>

                @foreach($sportsGroup as $sport)
                    <p>{{$sport->name}}</p>
                @endforeach


            </div>
        </div>
    </div>
@endsection
