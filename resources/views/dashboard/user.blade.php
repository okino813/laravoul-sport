@extends('dashboard.header')

@section('title', 'Mon Dashboard')

@section('content')
    <h1>Information de votre compte</h1>
    <p>Bonjour {{$user->firstname}}</p>
@endsection
