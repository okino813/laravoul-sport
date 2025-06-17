@extends('layouts.app')

@section('title', 'Laravoul Sport')

@section('content')
<div class="container py-5" style="background-color: #121212; color: #f0f0f0;">
    <h1 class="mb-4 text-center fw-bold">Bienvenue sur <strong>Laravoul Sport</strong> 🏋️‍♂️</h1>

    <p class="lead text-center mb-5">Votre carnet numérique pour suivre vos progrès sportifs et atteindre vos objectifs.</p>

    @auth
        <div class="text-center mb-5">
            <a href="{{ route('practices.index') }}" class="btn btn-lg px-5 shadow-sm text-light"
               style="background-color: #dc3545; border: none;">
               Voir mes entraînements
            </a>
        </div>

        <div class="row g-4">
            @php
                $cards = [
                    ['title' => '📊 Suivi des objectifs', 'desc' => 'Visualisez vos performances par sport, groupe musculaire ou objectif personnel.'],
                    ['title' => '📝 Ajouter une séance', 'desc' => 'Consignez vos nouvelles séances avec vos propres critères de progression.'],
                    ['title' => '👥 Groupes et sports', 'desc' => 'Organisez vos entraînements par groupe musculaire ou type d’activité physique.']
                ];
            @endphp

            @foreach ($cards as $card)
                <div class="col-md-4">
                    <div class="card h-100 rounded-4 border-0 hover-shadow"
                         style="background-color: #1e1e1e; color: #f0f0f0;">
                        <div class="card-body">
                            <h5 class="card-title">{{ $card['title'] }}</h5>
                            <p class="card-text">{{ $card['desc'] }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <div class="text-center my-5">
            <a href="{{ route('login') }}" class="btn btn-lg px-5 shadow-sm text-light"
               style="background-color: #dc3545; border: none;">
               Se connecter
            </a>
            <a href="{{ route('register') }}" class="btn btn-lg px-5 ms-3 shadow-sm"
               style="color: #dc3545; border: 2px solid #dc3545; background-color: transparent;">
               Créer un compte
            </a>
        </div>
    @endauth
</div>

<style>
.hover-shadow:hover {
    box-shadow: 0 0.5rem 1rem rgba(220, 53, 69, 0.5); /* red-main shadow */
    transition: box-shadow 0.3s ease-in-out;
}

main{
    background-color: #121212;
    display: flex;
    flex-direction: column;
    height: 100vh;
    justify-content: center;
    align-content: center;

}
</style>
@endsection
