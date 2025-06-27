@extends('layouts.dashboard')

@section('title', 'Dashboard')
@section('description', 'Panel de administración')

@section('content')
<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 lg:gap-6 mb-6 lg:mb-8">
  <div
    class="bg-white rounded-2xl shadow-lg border border-gray-100 p-4 lg:p-6 hover:shadow-xl transition-all duration-300 group">
    <div class="flex items-center justify-between">
      <div>
        <p class="text-gray-500 text-sm font-medium">Total Usuarios</p>
        <p class="text-2xl lg:text-3xl font-bold text-gray-900 mt-2">{{ rand(74, 266) }}</p>
      </div>
      <x-icon.users class="size-10 lg:size-12 p-2.5 text-green-600 bg-green-100 rounded-xl group-hover:scale-101" />
    </div>
  </div>

  <div
    class="bg-white rounded-2xl shadow-lg border border-gray-100 p-4 lg:p-6 hover:shadow-xl transition-all duration-300 group">
    <div class="flex items-center justify-between">
      <div>
        <p class="text-gray-500 text-sm font-medium">Total Cursos</p>
        <p class="text-2xl lg:text-3xl font-bold text-gray-900 mt-2">{{ rand(25, 99) }}</p>
      </div>
      <div
        class="w-10 h-10 lg:w-12 lg:h-12 bg-blue-100 rounded-xl flex items-center justify-center group-hover:scale-101 transition-transform duration-200">
        <svg class="w-5 h-5 lg:w-6 lg:h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
            d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
        </svg>
      </div>
    </div>
  </div>

  <div
    class="bg-white rounded-2xl shadow-lg border border-gray-100 p-4 lg:p-6 hover:shadow-xl transition-all duration-300 group">
    <div class="flex items-center justify-between">
      <div>
        <p class="text-gray-500 text-sm font-medium">Sesiones Activas</p>
        <p class="text-2xl lg:text-3xl font-bold text-gray-900 mt-2">{{ rand(45, 150) }}</p>
      </div>
      <div
        class="w-10 h-10 lg:w-12 lg:h-12 bg-purple-100 rounded-xl flex items-center justify-center group-hover:scale-101 transition-transform duration-200">
        <svg class="w-5 h-5 lg:w-6 lg:h-6 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
        </svg>
      </div>
    </div>
  </div>

  <div
    class="bg-white rounded-2xl shadow-lg border border-gray-100 p-4 lg:p-6 hover:shadow-xl transition-all duration-300 group">
    <div class="flex items-center justify-between">
      <div>
        <p class="text-gray-500 text-sm font-medium">Ingresos</p>
        <p class="text-2xl lg:text-3xl font-bold text-gray-900 mt-2">${{ number_format(rand(5000, 25000)) }}</p>
      </div>
      <div
        class="w-10 h-10 lg:w-12 lg:h-12 bg-yellow-100 rounded-xl flex items-center justify-center group-hover:scale-101 transition-transform duration-200">
        <svg class="w-5 h-5 lg:w-6 lg:h-6 text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
            d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1" />
        </svg>
      </div>
    </div>
  </div>
</div>

<div class="grid grid-cols-1 lg:grid-cols-2 gap-4 lg:gap-6 mb-6 lg:mb-8">
  <div class="bg-white rounded-2xl shadow-lg border border-gray-100 p-4 lg:p-6">
    <div class="flex items-center justify-between mb-4 lg:mb-6">
      <h3 class="text-lg font-semibold text-gray-900">Actividad Reciente</h3>
      <button class="text-blue-600 hover:text-blue-800 text-sm font-medium">Ver todo</button>
    </div>
    <div class="h-48 lg:h-64 bg-gradient-to-br from-blue-50 to-purple-50 rounded-xl flex items-center justify-center">
      <div class="text-center">
        <svg class="w-12 h-12 lg:w-16 lg:h-16 text-gray-300 mx-auto mb-4" fill="none" stroke="currentColor"
          viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
            d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
        </svg>
        <p class="text-gray-500 font-medium">Gráfico de actividad</p>
        <p class="text-gray-400 text-sm">Próximamente</p>
      </div>
    </div>
  </div>

  <div class="bg-white rounded-2xl shadow-lg border border-gray-100 p-4 lg:p-6">
    <div class="flex items-center justify-between mb-4 lg:mb-6">
      <h3 class="text-lg font-semibold text-gray-900">Actividad Reciente</h3>
      <button class="text-blue-600 hover:text-blue-800 text-sm font-medium">Ver todo</button>
    </div>
    <div class="space-y-3 lg:space-y-4">
      @for($i = 0; $i < 5; $i++) <div
        class="flex items-center space-x-3 lg:space-x-4 p-3 hover:bg-gray-50 rounded-lg transition-colors duration-200">
        <div
          class="w-8 h-8 lg:w-10 lg:h-10 bg-gradient-to-br from-blue-400 to-purple-500 rounded-full flex items-center justify-center">
          <span class="text-white font-semibold text-xs lg:text-sm">{{ chr(65 + $i) }}</span>
        </div>
        <div class="flex-1 min-w-0">
          <p class="text-sm font-medium text-gray-900 truncate">Usuario {{ $i + 1 }} se registró</p>
          <p class="text-xs text-gray-500">Hace {{ rand(1, 60) }} minutos</p>
        </div>
        <div class="w-2 h-2 bg-green-400 rounded-full flex-shrink-0"></div>
    </div>
    @endfor
  </div>
</div>
</div>

<div class="bg-white rounded-2xl shadow-lg border border-gray-100 p-4 lg:p-6">
  <h3 class="text-lg font-semibold text-gray-900 mb-4 lg:mb-6">Acciones Rápidas</h3>
  <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-3 lg:gap-4">
    <button
      class="flex items-center space-x-3 p-3 lg:p-4 border border-gray-200 rounded-xl hover:border-blue-300 hover:bg-blue-50 transition-all duration-200 group">
      <div
        class="w-8 h-8 lg:w-10 lg:h-10 bg-blue-100 group-hover:bg-blue-200 rounded-lg flex items-center justify-center transition-colors duration-200">
        <svg class="w-4 h-4 lg:w-5 lg:h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
        </svg>
      </div>
      <div class="text-left">
        <p class="font-medium text-gray-900 text-sm lg:text-base">Nuevo Usuario</p>
        <p class="text-xs lg:text-sm text-gray-500">Crear cuenta</p>
      </div>
    </button>

    <button
      class="flex items-center space-x-3 p-3 lg:p-4 border border-gray-200 rounded-xl hover:border-green-300 hover:bg-green-50 transition-all duration-200 group">
      <div
        class="w-8 h-8 lg:w-10 lg:h-10 bg-green-100 group-hover:bg-green-200 rounded-lg flex items-center justify-center transition-colors duration-200">
        <svg class="w-4 h-4 lg:w-5 lg:h-5 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
            d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
        </svg>
      </div>
      <div class="text-left">
        <p class="font-medium text-gray-900 text-sm lg:text-base">Nuevo Curso</p>
        <p class="text-xs lg:text-sm text-gray-500">Crear curso</p>
      </div>
    </button>

    <button
      class="flex items-center space-x-3 p-3 lg:p-4 border border-gray-200 rounded-xl hover:border-purple-300 hover:bg-purple-50 transition-all duration-200 group">
      <div
        class="w-8 h-8 lg:w-10 lg:h-10 bg-purple-100 group-hover:bg-purple-200 rounded-lg flex items-center justify-center transition-colors duration-200">
        <svg class="w-4 h-4 lg:w-5 lg:h-5 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
            d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2-2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
        </svg>
      </div>
      <div class="text-left">
        <p class="font-medium text-gray-900 text-sm lg:text-base">Ver Reportes</p>
        <p class="text-xs lg:text-sm text-gray-500">Análisis</p>
      </div>
    </button>

    <button
      class="flex items-center space-x-3 p-3 lg:p-4 border border-gray-200 rounded-xl hover:border-yellow-300 hover:bg-yellow-50 transition-all duration-200 group">
      <div
        class="w-8 h-8 lg:w-10 lg:h-10 bg-yellow-100 group-hover:bg-yellow-200 rounded-lg flex items-center justify-center transition-colors duration-200">
        <svg class="w-4 h-4 lg:w-5 lg:h-5 text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
            d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
        </svg>
      </div>
      <div class="text-left">
        <p class="font-medium text-gray-900 text-sm lg:text-base">Configuración</p>
        <p class="text-xs lg:text-sm text-gray-500">Ajustes</p>
      </div>
    </button>
  </div>
</div>
@endsection