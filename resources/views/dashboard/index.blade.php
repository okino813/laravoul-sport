@extends('dashboard.header')

@section('title', 'Mon Dashboard')

@section('content')
<div class="container py-5 text-light">
    <h1 class="mb-4 fw-bold text-danger">👋 Bienvenue, {{ Auth::user()->firstname }} !</h1>
    <p class="mb-5">Voici ton espace de suivi d'entraînement. Garde un œil sur tes objectifs, tes progrès, et tes prochaines séances !</p>

    <div class="row g-4">
        <div class="col-md-4">
            <div class="card bg-dark border-danger shadow">
                <div class="card-body">
                    <h5 class="card-title text-danger">🏋️ Dernières séances</h5>
                    <p class="card-text">Consulte tes dernières activités et mesures.</p>
                    <a href="{{ route('practices.index') }}" class="btn btn-danger btn-sm">Voir mes séances</a>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card bg-dark border-danger shadow">
                <div class="card-body">
                    <h5 class="card-title text-danger">⚙️ Paramètres</h5>
                    <p class="card-text">Personnalise ton profil, tes groupes et tes préférences d’entraînement.</p>
                    <a href="{{ route('dashboard.groups.mygroups') }}" class="btn btn-danger btn-sm">Configurer</a>
                </div>
            </div>
        </div>
    </div>

    <hr class="my-5 border-danger">

    <div class="text-center">
        <p class="text-muted">Reste motivé. Chaque entraînement te rapproche de ton objectif 💪</p>
    </div>
</div>
@endsection
