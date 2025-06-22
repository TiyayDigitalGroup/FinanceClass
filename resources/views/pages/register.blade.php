@extends('layouts.app')

@section('title', 'Registrarse')
@section('description', 'Descripción de la página')

@section('content')
<div
  class="min-h-screen bg-gradient-to-br from-emerald-50 via-teal-50 to-cyan-100 flex items-center justify-center px-4 pt-12 relative overflow-hidden">

  <div class="relative w-full max-w-lg py-10">
    <div
      class="bg-white/85 backdrop-blur-xl rounded-3xl shadow-2xl border border-white/30 py-4 px-6">
      <div class="text-center mb-8">
        <div
          class="w-24 h-24 bg-gradient-to-br from-emerald-500 via-teal-500 to-cyan-600 rounded-3xl mx-auto mb-6 flex items-center justify-center shadow-xl transform -rotate-3 hover:rotate-3 transition-transform duration-500">
          <svg class="w-12 h-12 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
              d="M18 9v3m0 0v-3m0 3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z" />
          </svg>
        </div>
        <h1
          class="text-4xl font-bold bg-gradient-to-r from-gray-800 via-gray-700 to-gray-600 bg-clip-text text-transparent mb-3">
          Únete a nosotros
        </h1>
        <p class="text-gray-500 text-base">Crea tu cuenta y comienza tu aventura</p>
      </div>
      @if($errors->any())
      <div
        class="mb-6 p-5 bg-gradient-to-r from-red-50 to-pink-50 border border-red-200 rounded-2xl relative overflow-hidden">
        <div class="absolute inset-0 bg-gradient-to-r from-red-500/5 to-pink-500/5"></div>
        <div class="relative">
          <div class="flex items-center space-x-3 mb-3">
            <div class="w-8 h-8 bg-red-100 rounded-full flex items-center justify-center flex-shrink-0">
              <svg class="w-4 h-4 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
              </svg>
            </div>
            <h4 class="text-red-800 font-semibold text-sm">Por favor corrige los siguientes errores:</h4>
          </div>
          <div class="space-y-2 ml-11">
            @foreach($errors->all() as $error)
            <div class="flex items-center space-x-2">
              <div class="w-1.5 h-1.5 bg-red-400 rounded-full"></div>
              <p class="text-red-700 text-sm">{{ $error }}</p>
            </div>
            @endforeach
          </div>
        </div>
      </div>
      @endif
      <form method="POST" action="{{ route('register') }}" class="space-y-6">
        @csrf
        <div class="space-y-2">
          <label for="name" class="block text-sm font-semibold text-gray-700 ml-1">
            Nombre completo
          </label>
          <div class="relative group">
            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
              <svg class="w-5 h-5 text-gray-400 group-focus-within:text-emerald-500 transition-colors duration-200"
                fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
              </svg>
            </div>
            <input type="text" id="name" name="name"
              class="w-full pl-12 pr-4 py-4 bg-gray-50/50 border border-gray-200 rounded-2xl focus:ring-2 focus:ring-emerald-500 focus:border-transparent transition-all duration-200 placeholder-gray-400 hover:bg-gray-50 focus:bg-white"
              placeholder="Juan Pérez" required value="{{ old('name') }}">
            <div
              class="absolute inset-0 rounded-2xl bg-gradient-to-r from-emerald-500/0 via-teal-500/0 to-cyan-500/0 group-focus-within:from-emerald-500/10 group-focus-within:via-teal-500/5 group-focus-within:to-cyan-500/10 transition-all duration-300 pointer-events-none">
            </div>
          </div>
        </div>
        <div class="space-y-2">
          <label for="email" class="block text-sm font-semibold text-gray-700 ml-1">
            Correo electrónico
          </label>
          <div class="relative group">
            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
              <svg class="w-5 h-5 text-gray-400 group-focus-within:text-emerald-500 transition-colors duration-200"
                fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207" />
              </svg>
            </div>
            <input type="email" id="email" name="email"
              class="w-full pl-12 pr-4 py-4 bg-gray-50/50 border border-gray-200 rounded-2xl focus:ring-2 focus:ring-emerald-500 focus:border-transparent transition-all duration-200 placeholder-gray-400 hover:bg-gray-50 focus:bg-white"
              placeholder="juan@email.com" required value="{{ old('email') }}">
            <div
              class="absolute inset-0 rounded-2xl bg-gradient-to-r from-emerald-500/0 via-teal-500/0 to-cyan-500/0 group-focus-within:from-emerald-500/10 group-focus-within:via-teal-500/5 group-focus-within:to-cyan-500/10 transition-all duration-300 pointer-events-none">
            </div>
          </div>
        </div>
        <div class="space-y-2">
          <label for="password" class="block text-sm font-semibold text-gray-700 ml-1">
            Contraseña
          </label>
          <div class="relative group">
            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
              <svg class="w-5 h-5 text-gray-400 group-focus-within:text-emerald-500 transition-colors duration-200"
                fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
              </svg>
            </div>
            <input type="password" id="password" name="password"
              class="w-full pl-12 pr-4 py-4 bg-gray-50/50 border border-gray-200 rounded-2xl focus:ring-2 focus:ring-emerald-500 focus:border-transparent transition-all duration-200 placeholder-gray-400 hover:bg-gray-50 focus:bg-white"
              placeholder="••••••••" required>
            <div
              class="absolute inset-0 rounded-2xl bg-gradient-to-r from-emerald-500/0 via-teal-500/0 to-cyan-500/0 group-focus-within:from-emerald-500/10 group-focus-within:via-teal-500/5 group-focus-within:to-cyan-500/10 transition-all duration-300 pointer-events-none">
            </div>
          </div>
        </div>
        <div class="space-y-2">
          <label for="password_confirmation" class="block text-sm font-semibold text-gray-700 ml-1">
            Confirmar contraseña
          </label>
          <div class="relative group">
            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
              <svg class="w-5 h-5 text-gray-400 group-focus-within:text-emerald-500 transition-colors duration-200"
                fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
              </svg>
            </div>
            <input type="password" id="password_confirmation" name="password_confirmation"
              class="w-full pl-12 pr-4 py-4 bg-gray-50/50 border border-gray-200 rounded-2xl focus:ring-2 focus:ring-emerald-500 focus:border-transparent transition-all duration-200 placeholder-gray-400 hover:bg-gray-50 focus:bg-white"
              placeholder="••••••••" required>
            <div
              class="absolute inset-0 rounded-2xl bg-gradient-to-r from-emerald-500/0 via-teal-500/0 to-cyan-500/0 group-focus-within:from-emerald-500/10 group-focus-within:via-teal-500/5 group-focus-within:to-cyan-500/10 transition-all duration-300 pointer-events-none">
            </div>
          </div>
        </div>
        <button type="submit"
          class="w-full relative overflow-hidden bg-gradient-to-r from-emerald-500 via-teal-500 to-cyan-600 hover:from-emerald-600 hover:via-teal-600 hover:to-cyan-700 text-white font-semibold py-4 px-6 rounded-2xl shadow-lg hover:shadow-xl transform hover:-translate-y-0.5 transition-all duration-300 group">
          <div
            class="absolute inset-0 bg-gradient-to-r from-white/0 via-white/20 to-white/0 -skew-x-12 -translate-x-full group-hover:translate-x-full transition-transform duration-1000">
          </div>
          <div class="relative flex items-center justify-center space-x-2">
            <span class="text-lg">Crear mi cuenta</span>
            <svg class="w-5 h-5 transform group-hover:translate-x-1 transition-transform duration-200" fill="none"
              stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6" />
            </svg>
          </div>
        </button>
      </form>
      <div class="text-center">
        <p class="text-gray-600 text-sm">
          ¿Ya tienes cuenta?
          <a href="{{ route('login') }}"
            class="font-semibold text-emerald-600 hover:text-emerald-800 hover:underline transition-all duration-200 ml-1">
            Inicia sesión aquí
          </a>
        </p>
      </div>
    </div>
  </div>
</div>
@endsection