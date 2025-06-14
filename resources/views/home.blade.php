@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <ul><li><a href="/dashboard">Accès au Dashboard</a></li></ul>


                    <ul><li><a href="/users">Listes des utilisateurs</a></li></ul>

                    <ul><li><a href="/fields">Listes des fields</a></li></ul>

                    <ul><li><a href="/units">Listes des unités</a></li></ul>

                    <ul><li><a href="/practices">Listes des entrainments</a></li></ul>

                    <ul><li><a href="/sports">Listes des sports</a></li></ul>

                    <ul><li><a href="/groups">Listes des groups</a></li></ul>

                    <ul><li><a href="/groups-sport">Assignation des sports aux groups</a></li></ul>

                    <ul><li><a href="/members">Listes des membres</a></li></ul>

                    <ul><li><a href="/practicevalues">Listes des valeur d'entrainement</a></li></ul>

            </div>
        </div>
    </div>
</div>
@endsection
