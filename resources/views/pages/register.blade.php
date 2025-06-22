@extends('layouts.app')

@section('title', 'Registrarse')
@section('description', 'Descripción de la página')

@section('content')
<section class="max-w-md mx-auto mt-20 px-4">
  <h1 class="text-2xl font-bold mb-4">Crear cuenta</h1>

  @if($errors->any())
    <div class="mb-4 p-3 bg-red-100 text-red-700 rounded-md text-sm space-y-1">
      @foreach($errors->all() as $error)
        <div>{{ $error }}</div>
      @endforeach
    </div>
  @endif

  <form method="POST" action="{{ route('register') }}" class="space-y-4">
    @csrf

    <input type="text" name="name" class="input" placeholder="Nombre completo" required value="{{ old('name') }}">
    <input type="email" name="email" class="input" placeholder="Correo electrónico" required value="{{ old('email') }}">
    <input type="password" name="password" class="input" placeholder="Contraseña" required>
    <input type="password" name="password_confirmation" class="input" placeholder="Confirmar contraseña" required>

    <button class="btn btn-primary w-full" type="submit">Registrarme</button>
  </form>

  <p class="mt-4 text-sm">¿Ya tenés cuenta? <a href="{{ route('login') }}" class="text-blue-600">Iniciá sesión</a></p>
</section>
@endsection
