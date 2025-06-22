@extends('layouts.app')

@section('title', 'Login')
@section('description', 'Descripción de la página')

@section('content')
<section
  class="min-h-screen flex items-center justify-center bg-gradient-to-br from-blue-100 via-indigo-100 to-purple-100 pt-14">
  <article class="bg-white rounded-3xl shadow-lg w-full max-w-md p-6">
    <x-icon.lock
      class="bg-gradient-to-br from-blue-500 via-purple-500 to-indigo-600 rounded-2xl rotate-3 hover:rotate-6 text-white size-16 p-2 transition-transform duration-300 shadow-lg mb-2 mx-auto" />
    <h1
      class="text-2xl text-center font-bold bg-gradient-to-r from-gray-800 to-gray-600 bg-clip-text text-transparent -mb-1.5">
      Bienvenido de vuelta
    </h1>
    <p class="text-gray-500 text-sm text-center">Ingresa tus credenciales para continuar</p>
    @if($errors->any())
    <div class="bg-red-100 border border-red-600 px-3 py-2 rounded-2xl flex items-center">
      <x-icon.warning class="text-red-600 size-5" />
      <p class="text-red-600 text-sm">{{ $errors->first() }}</p>
    </div>
    @endif
    <form method="POST" action="{{ route('login') }}" class="space-y-2 mt-4">
      @csrf
      <fieldset>
        <label for="email" class="mb-1 block">Correo electrónico</label>
        <div class="relative">
          <input type="email" id="email" name="email" autocomplete="email"
            class="w-full pl-10 py-2 border border-gray-200 rounded-2xl focus:ring-2 outline-none focus:ring-blue-400 transition-all duration-200 placeholder-gray-400 placeholder:text-sm"
            placeholder="tu@email.com" required>
          <x-icon.at class="absolute left-3 top-1/2 -translate-y-1/2 text-gray-400 size-5" />
        </div>
      </fieldset>
      <fieldset>
        <label for="password" class="mb-1 block">Contraseña</label>
        <div class="relative">
          <input type="password" id="password" name="password" autocomplete="current-password"
            class="w-full pl-10 py-2 border border-gray-200 rounded-2xl focus:ring-2 outline-none focus:ring-blue-400 transition-all duration-200 placeholder-gray-400 placeholder:text-sm"
            placeholder="••••••••" required>
          <x-icon.lock class="absolute left-3 top-1/2 -translate-y-1/2 text-gray-400 size-5" />
        </div>
      </fieldset>
      <x-ui.button type="submit" variant="neon" class="group px-5 py-3 text-white mt-2 mx-auto">
        Iniciar sesión
        <x-icon.arrow-right class="w-5 h-5 ml-2 group-hover:translate-x-2 transition-transform" />
      </x-ui.button>
      <p class="text-gray-600 text-sm text-center">
        ¿No tienes cuenta?
        <x-ui.button href="{{ route('register') }}" class="hover:text-blue-700 text-blue-500 inline">
          Regístrate aquí
        </x-ui.button>
      </p>
    </form>
  </article>
</section>
@endsection