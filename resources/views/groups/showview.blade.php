@extends('dashboard.header')

@section('title', 'Détails du groupe')

@section('content')
<div class="container py-5 text-light">
    <h1 class="mb-4 fw-bold text-danger">📋 Détails du groupe</h1>

    <div class="bg-dark p-4 rounded shadow border border-danger">
        <h4 class="text-danger mb-3">{{ $group->name }}</h4>
        <p><strong>Date de création :</strong> {{ $group->created_at->format('d/m/Y') }}</p>
        <p><strong>Coach responsable :</strong> {{ $coach->firstname }} {{ $coach->lastname }}</p>

        <hr class="border-secondary">

        <h5 class="text-danger mt-4 mb-3">Membres du groupe</h5>
        @if($members->isEmpty())
            <p class="text-muted">Aucun membre pour le moment.</p>
        @else
            <ul class="list-group bg-dark border-0 mb-3">
                @foreach($members as $membre)
                    <li class="list-group-item bg-secondary text-light border-0 mb-1 rounded">
                        {{ $membre->user->firstname }} {{ $membre->user->lastname ?? '' }}
                        <small class="text-muted">({{ $membre->user->email }})</small>
                    </li>
                @endforeach
            </ul>
        @endif

        <hr class="border-secondary">

        <h5 class="text-danger mt-4 mb-3">Sports pratiqués</h5>
        @if($sportsGroup->isEmpty())
            <p class="text-muted">Aucun sport associé à ce groupe.</p>
        @else
            <div class="d-flex flex-wrap gap-2">
                @foreach($sportsGroup as $sport)
                    <span class="badge bg-danger py-2 px-3 fs-6">
                        {{ $sport->name }}
                    </span>
                @endforeach
            </div>
        @endif
    </div>

</div>
@endsection
