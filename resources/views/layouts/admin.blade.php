<!DOCTYPE html>
<html lang="bg">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    @include('layouts.includes.css')

    <!-- Scripts -->
    @include('layouts.includes.js-head')
</head>
<body>
    <div id="container">
    <!-- Header -->
    @include('layouts.includes.header')

    <!-- Navigation -->
    @include('layouts.includes.admin.nav')
    
    <!-- Main content -->
    <main class="pt-1">
        @yield('content')
    </main>

    <!-- Footer -->
    @include('layouts.includes.footer')
    </div>

    <!-- Scripts -->
    @include('layouts.includes.js-body')
</body>
</html>
