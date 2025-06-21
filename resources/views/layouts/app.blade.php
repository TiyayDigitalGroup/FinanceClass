<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>{{ config('app.name') }} - @yield('title', 'Inicio') </title>
  <meta name="description" content="@yield('meta_description', 'FinanceClass, tu solución financiera.')">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <link rel="icon" href="{{ asset('favicon.ico') }}">
  @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
  @include('partials.navbar')
  @yield('content')
  @include('partials.footer')
</body>

</html>