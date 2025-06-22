@extends('layouts.app')

@section('title', 'Login')
@section('description', 'Descripción de la página')

@section('content')
<section class="max-w-md mx-auto mt-20 px-4">
  <h1 class="text-2xl font-bold mb-4">Iniciar sesión</h1>

  @if($errors->any())
    <div class="mb-4 p-3 bg-red-100 text-red-700 rounded-md text-sm">
      {{ $errors->first() }}
    </div>
  @endif

  <form method="POST" action="{{ route('login') }}" class="space-y-4">
    @csrf

    <input type="email" name="email" class="input" placeholder="Correo" required value="{{ old('email') }}">
    <input type="password" name="password" class="input" placeholder="Contraseña" required>

    <button class="btn btn-primary w-full" type="submit">Ingresar</button>
  </form>

  <p class="mt-4 text-sm">¿No tenés cuenta? <a href="{{ route('register') }}" class="text-blue-600">Registrate</a></p>
</section>
@endsection
