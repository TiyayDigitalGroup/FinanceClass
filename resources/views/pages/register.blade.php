@extends('layouts.app')

@section('title', 'Registrarse')
@section('description', 'Descripción de la página')

@section('content')
<section
  class="min-h-screen flex items-center justify-center bg-gradient-to-br from-emerald-50 via-teal-50 to-cyan-100 pt-14">
  <article class="bg-white rounded-3xl shadow-lg w-full max-w-md px-5 py-4">
    <x-icon.users
      class="bg-gradient-to-br from-emerald-500 via-teal-500 to-cyan-600 rounded-2xl -rotate-3 hover:-rotate-6 text-white size-15 p-3 transition-transform duration-300 shadow-lg mb-2 mx-auto" />
    <h1
      class="text-2xl text-center font-bold bg-gradient-to-r from-gray-800 to-gray-600 bg-clip-text text-transparent -mb-1.5">
      Únete a nosotros
    </h1>
    <p class="text-gray-500 text-sm text-center">Crea tu cuenta y comienza tu aventura</p>
    @if($errors->any())
    <div class="bg-red-100 border border-red-600 px-3 py-2 mt-2 rounded-2xl flex items-center gap-2">
      <x-icon.warning class="text-red-600 size-5" />
      <p class="text-red-600 text-sm">{{ $errors->first() }}</p>
    </div>
    @endif
    <form method="POST" action="{{ route('register') }}" class="space-y-2 mt-4">
      @csrf
      <fieldset>
        <label for="name" class="mb-1 block">Nombre completo</label>
        <div class="relative">
          <input type="text" id="name" name="name" autocomplete="name"
            class="w-full pl-10 py-2 border border-gray-200 rounded-2xl focus:ring-2 outline-none focus:ring-blue-400 transition-all duration-200 placeholder-gray-400 placeholder:text-sm"
            placeholder="Juan Perez" required>
          <x-icon.user class="absolute left-3 top-1/2 -translate-y-1/2 text-gray-400 size-5" />
        </div>
      </fieldset>
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
      <fieldset>
        <label for="password_confirmation" class="mb-1 block">Confirmar contraseña</label>
        <div class="relative">
          <input type="password" id="password_confirmation" name="password_confirmation" autocomplete="current-password"
            class="w-full pl-10 py-2 border border-gray-200 rounded-2xl focus:ring-2 outline-none focus:ring-blue-400 transition-all duration-200 placeholder-gray-400 placeholder:text-sm"
            placeholder="••••••••" required>
          <x-icon.check class="absolute left-3 top-1/2 -translate-y-1/2 text-gray-400 size-5" />
        </div>
      </fieldset>
      <x-ui.button type="submit" variant="teal" class="group px-5 py-3 text-white mt-2 mx-auto">
        Crear mi cuenta
        <x-icon.arrow-right class="w-5 h-5 ml-2 group-hover:translate-x-2 transition-transform" />
      </x-ui.button>
      <p class="text-gray-600 text-sm text-center">
        ¿Ya tienes una cuenta?
        <x-ui.button href="{{ route('login') }}" class="hover:text-teal-700 text-teal-500 inline">
          Inicia sesion aquí
        </x-ui.button>
      </p>
    </form>
  </article>
</section>
@endsection