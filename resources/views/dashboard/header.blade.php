<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Dashboard')</title>
{{--    <link rel="stylesheet" href="{{ asset('scss/app.css') }}">--}}
    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>
    @include('layouts.header') {{-- ton header commun --}}

    <div class="dashboard-layout">
        {{-- menu latéral fixe --}}
        @include('dashboard.navbar')

        {{-- contenu spécifique à chaque page --}}
        <div class="content" style="padding: 20px;">
            @yield('content')
        </div>
    </div>
</body>
</html>
