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

                    <ul><li><a href="/users">Listes des utilisateurs</a></li></ul>

                    <ul><li><a href="/fields">Listes des fields</a></li></ul>

                    <ul><li><a href="/units">Listes des unités</a></li></ul>

                    <ul><li><a href="/practices">Listes des entrainments</a></li></ul>
            </div>
        </div>
    </div>
</div>
@endsection
