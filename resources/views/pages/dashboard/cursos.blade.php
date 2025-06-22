@extends('layouts.dashboard')

@section('title', 'Gestión de Cursos')
@section('description', 'Lista de cursos y sus archivos')

@section('content')
<div class="space-y-8">
  <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between space-y-4 lg:space-y-0">
    <div>
      <h1 class="text-3xl font-bold text-gray-900">Gestión de Cursos</h1>
      <p class="text-gray-600 mt-2">Administra cursos, contenido y archivos del sistema</p>
    </div>
    <div class="flex items-center space-x-6 text-sm">
      <div class="text-center">
        <div class="text-2xl font-bold text-blue-600">{{ $cursos->count() }}</div>
        <div class="text-gray-500">Total</div>
      </div>
      <div class="text-center">
        <div class="text-2xl font-bold text-purple-600">{{ $cursos->where('premium', 1)->count() }}</div>
        <div class="text-gray-500">Premium</div>
      </div>
      <div class="text-center">
        <div class="text-2xl font-bold text-green-600">{{ $cursos->where('premium', 0)->count() }}</div>
        <div class="text-gray-500">Gratuitos</div>
      </div>
    </div>
  </div>

  @if(session('success'))
  <div
    class="p-4 bg-gradient-to-r from-green-50 to-emerald-50 border border-green-200 rounded-2xl relative overflow-hidden animate-fade-in">
    <div class="absolute inset-0 bg-gradient-to-r from-green-500/5 to-emerald-500/5"></div>
    <div class="relative flex items-center space-x-3">
      <div class="w-8 h-8 bg-green-100 rounded-full flex items-center justify-center flex-shrink-0">
        <svg class="w-4 h-4 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
        </svg>
      </div>
      <p class="text-green-700 font-medium">{{ session('success') }}</p>
      <button onclick="this.parentElement.parentElement.remove()" class="ml-auto text-green-400 hover:text-green-600">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
        </svg>
      </button>
    </div>
  </div>
  @endif

  <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
    <div
      class="bg-white rounded-2xl shadow-lg border border-gray-100 p-6 hover:shadow-xl transition-all duration-300 group">
      <div class="flex items-center justify-between">
        <div>
          <p class="text-gray-500 text-sm font-medium">Total Cursos</p>
          <p class="text-3xl font-bold text-gray-900 mt-2">{{ $cursos->count() }}</p>
          <div class="flex items-center mt-2">
            <div class="w-2 h-2 bg-blue-500 rounded-full mr-2"></div>
            <span class="text-blue-600 text-sm font-medium">Activos</span>
          </div>
        </div>
        <div
          class="w-12 h-12 bg-blue-100 rounded-xl flex items-center justify-center group-hover:scale-110 transition-transform duration-200">
          <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
              d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
          </svg>
        </div>
      </div>
    </div>

    <div
      class="bg-white rounded-2xl shadow-lg border border-gray-100 p-6 hover:shadow-xl transition-all duration-300 group">
      <div class="flex items-center justify-between">
        <div>
          <p class="text-gray-500 text-sm font-medium">Cursos Premium</p>
          <p class="text-3xl font-bold text-gray-900 mt-2">{{ $cursos->where('premium', 1)->count() }}</p>
          <div class="flex items-center mt-2">
            <svg class="w-4 h-4 text-purple-500 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3l14 9-14 9V3z" />
            </svg>
            <span class="text-purple-600 text-sm font-medium">Exclusivos</span>
          </div>
        </div>
        <div
          class="w-12 h-12 bg-purple-100 rounded-xl flex items-center justify-center group-hover:scale-110 transition-transform duration-200">
          <svg class="w-6 h-6 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3l14 9-14 9V3z" />
          </svg>
        </div>
      </div>
    </div>

    <div
      class="bg-white rounded-2xl shadow-lg border border-gray-100 p-6 hover:shadow-xl transition-all duration-300 group">
      <div class="flex items-center justify-between">
        <div>
          <p class="text-gray-500 text-sm font-medium">Cursos Gratuitos</p>
          <p class="text-3xl font-bold text-gray-900 mt-2">{{ $cursos->where('premium', 0)->count() }}</p>
          <div class="flex items-center mt-2">
            <svg class="w-4 h-4 text-green-500 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1" />
            </svg>
            <span class="text-green-600 text-sm font-medium">Acceso libre</span>
          </div>
        </div>
        <div
          class="w-12 h-12 bg-green-100 rounded-xl flex items-center justify-center group-hover:scale-110 transition-transform duration-200">
          <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
              d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1" />
          </svg>
        </div>
      </div>
    </div>

    <div
      class="bg-white rounded-2xl shadow-lg border border-gray-100 p-6 hover:shadow-xl transition-all duration-300 group">
      <div class="flex items-center justify-between">
        <div>
          <p class="text-gray-500 text-sm font-medium">Total Archivos</p>
          <p class="text-3xl font-bold text-gray-900 mt-2">{{ $cursos->sum(function($curso) { return
            $curso->archivos->count(); }) }}</p>
          <div class="flex items-center mt-2">
            <svg class="w-4 h-4 text-yellow-500 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z" />
            </svg>
            <span class="text-yellow-600 text-sm font-medium">Recursos</span>
          </div>
        </div>
        <div
          class="w-12 h-12 bg-yellow-100 rounded-xl flex items-center justify-center group-hover:scale-110 transition-transform duration-200">
          <svg class="w-6 h-6 text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
              d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z" />
          </svg>
        </div>
      </div>
    </div>
  </div>

  <div class="bg-white rounded-2xl shadow-lg border border-gray-100 p-6">
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between space-y-4 sm:space-y-0">
      <div class="flex items-center space-x-4">
        <button onclick="openCourseModal()"
          class="inline-flex items-center px-6 py-3 bg-gradient-to-r from-blue-500 to-purple-600 hover:from-blue-600 hover:to-purple-700 text-white font-semibold rounded-xl shadow-lg hover:shadow-xl transform hover:-translate-y-0.5 transition-all duration-300 group">
          <svg class="w-5 h-5 mr-2 group-hover:rotate-90 transition-transform duration-300" fill="none"
            stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
          </svg>
          Nuevo Curso
        </button>
      </div>

      <div class="flex flex-col sm:flex-row items-stretch sm:items-center space-y-3 sm:space-y-0 sm:space-x-3">

        <div class="relative">
          <input type="text" id="searchCourses" placeholder="Buscar cursos..."
            class="pl-10 pr-4 py-2 border border-gray-200 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200 w-full sm:w-64">
          <svg class="w-4 h-4 text-gray-400 absolute left-3 top-3" fill="none" stroke="currentColor"
            viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
              d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
          </svg>
        </div>

        <select id="typeFilter"
          class="border border-gray-200 rounded-lg px-3 py-2 focus:ring-2 focus:ring-blue-500 focus:border-transparent text-sm">
          <option value="">Todos los tipos</option>
          <option value="premium">Premium</option>
          <option value="free">Gratuitos</option>
        </select>
      </div>
    </div>
  </div>

  <div id="coursesGrid" class="grid grid-cols-1 lg:grid-cols-2 gap-6">
    @foreach($cursos as $index => $curso)
    <div
      class="course-card bg-white rounded-2xl shadow-lg border border-gray-100 overflow-hidden hover:shadow-xl transition-all duration-300 group"
      data-title="{{ strtolower($curso->titulo) }}" data-description="{{ strtolower($curso->descripcion) }}"
      data-type="{{ $curso->premium ? 'premium' : 'free' }}">

      <div class="p-6 border-b border-gray-100">
        <div class="flex items-start justify-between">
          <div class="flex-1">
            <div class="flex items-center space-x-3 mb-2">
              <h3 class="text-xl font-bold text-gray-900 group-hover:text-blue-600 transition-colors">
                {{ $curso->titulo }}
              </h3>
              <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium
                  {{ $curso->premium ? 'bg-purple-100 text-purple-800' : 'bg-green-100 text-green-800' }}">
                {{ $curso->premium ? 'Premium' : 'Gratuito' }}
              </span>
            </div>

            <p class="text-gray-600 text-sm mb-3 line-clamp-2">{{ $curso->descripcion }}</p>

            <div class="flex items-center space-x-4 text-sm text-gray-500">
              <div class="flex items-center">
                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z" />
                </svg>
                {{ $curso->archivos->count() }} archivo(s)
              </div>
              <div class="flex items-center">
                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z" />
                </svg>
                {{ $curso->codigo }}
              </div>
            </div>
          </div>

          <div class="flex items-center space-x-2 ml-4">

            <button onclick="confirmDeleteCourse({{ $curso->id }}, '{{ $curso->titulo }}')"
              class="p-2 text-red-600 hover:text-red-800 hover:bg-red-50 rounded-lg transition-colors duration-200"
              title="Eliminar curso">
              <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
              </svg>
            </button>
          </div>
        </div>
      </div>

      <div class="p-6">
        <div class="flex items-center justify-between mb-4">
          <h4 class="text-lg font-semibold text-gray-900">Archivos del Curso</h4>
          <button onclick="openFileModal({{ $curso->id }})"
            class="inline-flex items-center px-3 py-2 bg-blue-50 text-blue-600 hover:bg-blue-100 rounded-lg text-sm font-medium transition-colors duration-200">
            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
            </svg>
            Agregar Archivo
          </button>
        </div>

        @if($curso->archivos->count() > 0)
        <div class="space-y-3 max-h-64 overflow-y-auto">
          @foreach($curso->archivos as $archivo)
          <div
            class="flex items-center justify-between p-3 bg-gray-50 rounded-lg hover:bg-gray-100 transition-colors duration-200">
            <div class="flex items-center space-x-3">
              <div class="w-8 h-8 rounded-lg flex items-center justify-center text-white font-bold text-xs
                                {{ $archivo->tipo === 'pdf' ? 'bg-red-500' : 
                                   ($archivo->tipo === 'doc' || $archivo->tipo === 'docx' ? 'bg-blue-500' :
                                   ($archivo->tipo === 'image' ? 'bg-green-500' : 'bg-gray-500')) }}">
                @if($archivo->tipo === 'pdf')
                PDF
                @elseif(in_array($archivo->tipo, ['doc', 'docx']))
                DOC
                @elseif($archivo->tipo === 'image')
                IMG
                @else
                {{ strtoupper(substr($archivo->tipo, 0, 3)) }}
                @endif
              </div>
              <div>
                <p class="text-sm font-medium text-gray-900">{{ $archivo->titulo }}</p>
                <p class="text-xs text-gray-500">{{ $archivo->nombre_original }}</p>
              </div>
            </div>

            <div class="flex items-center space-x-2">
              <a href="{{ Storage::url($archivo->ruta) }}" target="_blank"
                class="p-1 text-blue-600 hover:text-blue-800 hover:bg-blue-50 rounded transition-colors duration-200"
                title="Ver archivo">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                </svg>
              </a>

              <button onclick="confirmDeleteFile({{ $archivo->id }}, '{{ $archivo->titulo }}')"
                class="p-1 text-red-600 hover:text-red-800 hover:bg-red-50 rounded transition-colors duration-200"
                title="Eliminar archivo">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                </svg>
              </button>
            </div>
          </div>
          @endforeach
        </div>
        @else
        <div class="text-center py-8">
          <svg class="w-12 h-12 text-gray-300 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
              d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z" />
          </svg>
          <p class="text-gray-500 font-medium">No hay archivos</p>
          <p class="text-gray-400 text-sm">Agrega el primer archivo a este curso</p>
        </div>
        @endif
      </div>
    </div>
    @endforeach
  </div>

  <div id="emptyState" class="hidden text-center py-16">
    <svg class="w-16 h-16 text-gray-300 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
        d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
    </svg>
    <h3 class="text-lg font-medium text-gray-900 mb-2">No se encontraron cursos</h3>
    <p class="text-gray-500">Intenta ajustar los filtros de búsqueda</p>
  </div>
</div>

<div id="courseModal" class="fixed inset-0 bg-black/60 backdrop-blur-sm z-50 hidden items-center justify-center p-4">
  <div class="bg-white rounded-3xl shadow-2xl max-w-lg w-full max-h-[90vh] overflow-y-auto animate-scale-in">

    <div class="bg-gradient-to-r from-blue-500 to-purple-600 px-8 py-6">
      <div class="flex items-center justify-between">
        <div class="flex items-center space-x-3">
          <div class="w-10 h-10 bg-white/20 rounded-xl flex items-center justify-center">
            <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
            </svg>
          </div>
          <div>
            <h2 id="courseModalTitle" class="text-2xl font-bold text-white">Crear nuevo curso</h2>
            <p class="text-blue-100 text-sm">Completa la información del curso</p>
          </div>
        </div>
        <button onclick="closeCourseModal()"
          class="w-8 h-8 bg-white/20 hover:bg-white/30 rounded-lg flex items-center justify-center text-white transition-colors">
          <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
          </svg>
        </button>
      </div>
    </div>

    <div class="p-8">
      <form id="courseForm" method="POST" action="{{ route('dashboard.cursos.store') }}" enctype="multipart/form-data"
        class="space-y-6">
        @csrf
        <input type="hidden" id="courseId" name="course_id">
        <input type="hidden" id="courseFormMethod" name="_method" value="POST">

        <div class="space-y-2">
          <label for="titulo" class="block text-sm font-semibold text-gray-700">
            Título del curso *
          </label>
          <div class="relative group">
            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
              <svg class="w-5 h-5 text-gray-400 group-focus-within:text-blue-500 transition-colors duration-200"
                fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
              </svg>
            </div>
            <input type="text" id="titulo" name="titulo" required
              class="w-full pl-12 pr-4 py-3 bg-gray-50/50 border border-gray-200 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200 placeholder-gray-400 hover:bg-gray-50 focus:bg-white"
              placeholder="Introducción a Laravel">
          </div>
        </div>

        <div class="space-y-2">
          <label for="descripcion" class="block text-sm font-semibold text-gray-700">
            Descripción
          </label>
          <div class="relative group">
            <textarea id="descripcion" name="descripcion" rows="3"
              class="w-full px-4 py-3 bg-gray-50/50 border border-gray-200 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200 placeholder-gray-400 hover:bg-gray-50 focus:bg-white resize-none"
              placeholder="Describe el contenido y objetivos del curso..."></textarea>
          </div>
        </div>

        <div class="space-y-2">
          <label for="premium" class="block text-sm font-semibold text-gray-700">
            Tipo de curso *
          </label>
          <div class="relative group">
            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
              <svg class="w-5 h-5 text-gray-400 group-focus-within:text-blue-500 transition-colors duration-200"
                fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3l14 9-14 9V3z" />
              </svg>
            </div>
            <select name="premium" id="premium" required
              class="w-full pl-12 pr-4 py-3 bg-gray-50/50 border border-gray-200 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200 appearance-none">
              <option value="0">Gratuito</option>
              <option value="1">Premium</option>
            </select>
          </div>
        </div>

        <div id="initialFileSection" class="space-y-4 border-t border-gray-200 pt-6">
          <h3 class="text-lg font-semibold text-gray-900">Archivo inicial</h3>

          <div class="space-y-2">
            <label for="archivo_titulo" class="block text-sm font-semibold text-gray-700">
              Título del archivo *
            </label>
            <input type="text" id="archivo_titulo" name="archivo_titulo"
              class="w-full px-4 py-3 bg-gray-50/50 border border-gray-200 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200 placeholder-gray-400 hover:bg-gray-50 focus:bg-white"
              placeholder="Introducción al curso">
          </div>

          <div class="space-y-2">
            <label for="archivo" class="block text-sm font-semibold text-gray-700">
              Archivo *
            </label>
            <input type="file" id="archivo" name="archivo"
              class="w-full px-4 py-3 bg-gray-50/50 border border-gray-200 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200">
          </div>
        </div>

        <div class="flex justify-end space-x-4 pt-6 border-t border-gray-100">
          <button type="button" onclick="closeCourseModal()"
            class="px-6 py-3 text-gray-600 bg-gray-100 hover:bg-gray-200 rounded-xl font-medium transition-colors">
            Cancelar
          </button>
          <button type="submit" id="courseSubmitBtn"
            class="px-8 py-3 bg-gradient-to-r from-blue-500 to-purple-600 hover:from-blue-600 hover:to-purple-700 text-white font-semibold rounded-xl transition-all duration-200 transform hover:scale-105">
            <span id="courseSubmitText">Crear Curso</span>
          </button>
        </div>
      </form>
    </div>
  </div>
</div>

<div id="fileModal" class="fixed inset-0 bg-black/60 backdrop-blur-sm z-50 hidden items-center justify-center p-4">
  <div class="bg-white rounded-3xl shadow-2xl max-w-md w-full max-h-[90vh] overflow-hidden animate-scale-in">

    <div class="bg-gradient-to-r from-green-500 to-teal-600 px-8 py-6">
      <div class="flex items-center justify-between">
        <div class="flex items-center space-x-3">
          <div class="w-10 h-10 bg-white/20 rounded-xl flex items-center justify-center">
            <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z" />
            </svg>
          </div>
          <div>
            <h2 class="text-2xl font-bold text-white">Agregar archivo</h2>
            <p class="text-green-100 text-sm">Sube un nuevo archivo al curso</p>
          </div>
        </div>
        <button onclick="closeFileModal()"
          class="w-8 h-8 bg-white/20 hover:bg-white/30 rounded-lg flex items-center justify-center text-white transition-colors">
          <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
          </svg>
        </button>
      </div>
    </div>

    <div class="p-8">
      <form id="fileForm" method="POST" enctype="multipart/form-data" class="space-y-6">
        @csrf

        <div class="space-y-2">
          <label for="file_titulo" class="block text-sm font-semibold text-gray-700">
            Título del archivo *
          </label>
          <div class="relative group">
            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
              <svg class="w-5 h-5 text-gray-400 group-focus-within:text-green-500 transition-colors duration-200"
                fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z" />
              </svg>
            </div>
            <input type="text" id="file_titulo" name="titulo" required
              class="w-full pl-12 pr-4 py-3 bg-gray-50/50 border border-gray-200 rounded-xl focus:ring-2 focus:ring-green-500 focus:border-transparent transition-all duration-200 placeholder-gray-400 hover:bg-gray-50 focus:bg-white"
              placeholder="Capítulo 1: Fundamentos">
          </div>
        </div>

        <div class="space-y-2">
          <label for="file_archivo" class="block text-sm font-semibold text-gray-700">
            Archivo *
          </label>
          <input type="file" id="file_archivo" name="archivo" required
            class="w-full px-4 py-3 bg-gray-50/50 border border-gray-200 rounded-xl focus:ring-2 focus:ring-green-500 focus:border-transparent transition-all duration-200">
        </div>

        <div class="flex justify-end space-x-4 pt-6 border-t border-gray-100">
          <button type="button" onclick="closeFileModal()"
            class="px-6 py-3 text-gray-600 bg-gray-100 hover:bg-gray-200 rounded-xl font-medium transition-colors">
            Cancelar
          </button>
          <button type="submit"
            class="px-8 py-3 bg-gradient-to-r from-green-500 to-teal-600 hover:from-green-600 hover:to-teal-700 text-white font-semibold rounded-xl transition-all duration-200 transform hover:scale-105">
            Subir Archivo
          </button>
        </div>
      </form>
    </div>
  </div>
</div>

<div id="deleteCourseModal" class="fixed inset-0 bg-black/50 backdrop-blur-sm z-50 hidden items-center justify-center">
  <div class="bg-white rounded-2xl shadow-2xl max-w-md w-full mx-4 animate-scale-in">
    <div class="p-6">
      <div class="flex items-center justify-center w-12 h-12 mx-auto bg-red-100 rounded-full mb-4">
        <svg class="w-6 h-6 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
            d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
        </svg>
      </div>
      <h3 class="text-lg font-semibold text-gray-900 text-center mb-2">¿Eliminar curso?</h3>
      <p class="text-gray-500 text-center mb-6" id="deleteCourseName">Esta acción no se puede deshacer.</p>

      <div class="flex space-x-3">
        <button onclick="closeDeleteCourseModal()"
          class="flex-1 px-4 py-2 text-gray-700 bg-gray-100 hover:bg-gray-200 rounded-xl transition-colors">
          Cancelar
        </button>
        <form id="deleteCourseForm" method="POST" class="flex-1">
          @csrf
          @method('DELETE')
          <button type="submit"
            class="w-full px-4 py-2 bg-red-600 hover:bg-red-700 text-white rounded-xl transition-colors">
            Eliminar
          </button>
        </form>
      </div>
    </div>
  </div>
</div>

<div id="deleteFileModal" class="fixed inset-0 bg-black/50 backdrop-blur-sm z-50 hidden items-center justify-center">
  <div class="bg-white rounded-2xl shadow-2xl max-w-md w-full mx-4 animate-scale-in">
    <div class="p-6">
      <div class="flex items-center justify-center w-12 h-12 mx-auto bg-red-100 rounded-full mb-4">
        <svg class="w-6 h-6 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
            d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
        </svg>
      </div>
      <h3 class="text-lg font-semibold text-gray-900 text-center mb-2">¿Eliminar archivo?</h3>
      <p class="text-gray-500 text-center mb-6" id="deleteFileName">Esta acción no se puede deshacer.</p>

      <div class="flex space-x-3">
        <button onclick="closeDeleteFileModal()"
          class="flex-1 px-4 py-2 text-gray-700 bg-gray-100 hover:bg-gray-200 rounded-xl transition-colors">
          Cancelar
        </button>
        <form id="deleteFileForm" method="POST" class="flex-1">
          @csrf
          @method('DELETE')
          <button type="submit"
            class="w-full px-4 py-2 bg-red-600 hover:bg-red-700 text-white rounded-xl transition-colors">
            Eliminar
          </button>
        </form>
      </div>
    </div>
  </div>
</div>

<style>
  @keyframes fade-in {
    from {
      opacity: 0;
      transform: translateY(-10px);
    }

    to {
      opacity: 1;
      transform: translateY(0);
    }
  }

  @keyframes scale-in {
    from {
      opacity: 0;
      transform: scale(0.95);
    }

    to {
      opacity: 1;
      transform: scale(1);
    }
  }

  .animate-fade-in {
    animation: fade-in 0.3s ease-out forwards;
  }

  .animate-scale-in {
    animation: scale-in 0.3s ease-out forwards;
  }

  .line-clamp-2 {
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
    overflow: hidden;
  }
</style>

<script>
  // Variables globales
let isEditCourseMode = false;
let currentCourseId = null;

// Course Modal functionality
function openCourseModal() {
  const modal = document.getElementById('courseModal');
  const modalTitle = document.getElementById('courseModalTitle');
  const submitText = document.getElementById('courseSubmitText');
  const form = document.getElementById('courseForm');
  const initialFileSection = document.getElementById('initialFileSection');
  
  isEditCourseMode = false;
  modalTitle.textContent = 'Crear nuevo curso';
  submitText.textContent = 'Crear Curso';
  form.action = '{{ route("dashboard.cursos.store") }}';
  document.getElementById('courseFormMethod').value = 'POST';
  
  // Mostrar sección de archivo inicial para crear
  initialFileSection.style.display = 'block';
  document.getElementById('archivo_titulo').required = true;
  document.getElementById('archivo').required = true;
  
  // Limpiar formulario
  form.reset();
  document.getElementById('courseId').value = '';
  
  modal.classList.remove('hidden');
  modal.classList.add('flex');
  document.body.style.overflow = 'hidden';
}

function closeCourseModal() {
  const modal = document.getElementById('courseModal');
  modal.classList.add('hidden');
  modal.classList.remove('flex');
  document.body.style.overflow = 'auto';
  
  // Reset form
  document.getElementById('courseForm').reset();
  isEditCourseMode = false;
  currentCourseId = null;
}

function editCourse(courseId, titulo, descripcion, premium) {
  const modal = document.getElementById('courseModal');
  const modalTitle = document.getElementById('courseModalTitle');
  const submitText = document.getElementById('courseSubmitText');
  const form = document.getElementById('courseForm');
  const initialFileSection = document.getElementById('initialFileSection');
  
  isEditCourseMode = true;
  currentCourseId = courseId;
  modalTitle.textContent = 'Editar curso';
  submitText.textContent = 'Actualizar Curso';
  form.action = `/dashboard/cursos/${courseId}`;
  document.getElementById('courseFormMethod').value = 'PUT';
  
  // Ocultar sección de archivo inicial para editar
  initialFileSection.style.display = 'none';
  document.getElementById('archivo_titulo').required = false;
  document.getElementById('archivo').required = false;
  
  // Llenar formulario con datos existentes
  document.getElementById('courseId').value = courseId;
  document.getElementById('titulo').value = titulo;
  document.getElementById('descripcion').value = descripcion;
  document.getElementById('premium').value = premium;
  
  modal.classList.remove('hidden');
  modal.classList.add('flex');
  document.body.style.overflow = 'hidden';
}

// File Modal functionality
function openFileModal(courseId) {
  const modal = document.getElementById('fileModal');
  const form = document.getElementById('fileForm');
  
  form.action = `/cursos/${courseId}/archivos`;
  
  modal.classList.remove('hidden');
  modal.classList.add('flex');
  document.body.style.overflow = 'hidden';
}

function closeFileModal() {
  const modal = document.getElementById('fileModal');
  modal.classList.add('hidden');
  modal.classList.remove('flex');
  document.body.style.overflow = 'auto';
  
  // Reset form
  document.getElementById('fileForm').reset();
}

// Delete Course functionality
function confirmDeleteCourse(courseId, courseName) {
  const modal = document.getElementById('deleteCourseModal');
  const courseNameElement = document.getElementById('deleteCourseName');
  const form = document.getElementById('deleteCourseForm');
  
  courseNameElement.textContent = `¿Estás seguro de que quieres eliminar "${courseName}"? Esta acción eliminará también todos sus archivos.`;
  form.action = `/dashboard/cursos/${courseId}`;
  
  modal.classList.remove('hidden');
  modal.classList.add('flex');
}

function closeDeleteCourseModal() {
  const modal = document.getElementById('deleteCourseModal');
  modal.classList.add('hidden');
  modal.classList.remove('flex');
}

// Delete File functionality
function confirmDeleteFile(fileId, fileName) {
  const modal = document.getElementById('deleteFileModal');
  const fileNameElement = document.getElementById('deleteFileName');
  const form = document.getElementById('deleteFileForm');
  
  fileNameElement.textContent = `¿Estás seguro de que quieres eliminar "${fileName}"?`;
  form.action = `/archivos/${fileId}`;
  
  modal.classList.remove('hidden');
  modal.classList.add('flex');
}

function closeDeleteFileModal() {
  const modal = document.getElementById('deleteFileModal');
  modal.classList.add('hidden');
  modal.classList.remove('flex');
}

// Search and filter functionality
function filterCourses() {
  const searchTerm = document.getElementById('searchCourses').value.toLowerCase();
  const typeFilter = document.getElementById('typeFilter').value.toLowerCase();
  const cards = document.querySelectorAll('.course-card');
  const emptyState = document.getElementById('emptyState');
  let visibleCards = 0;
  
  cards.forEach(card => {
    const title = card.dataset.title;
    const description = card.dataset.description;
    const type = card.dataset.type;
    
    const matchesSearch = title.includes(searchTerm) || description.includes(searchTerm);
    const matchesType = !typeFilter || type === typeFilter;
    
    if (matchesSearch && matchesType) {
      card.style.display = '';
      visibleCards++;
    } else {
      card.style.display = 'none';
    }
  });
  
  // Mostrar/ocultar estado vacío
  if (visibleCards === 0) {
    emptyState.classList.remove('hidden');
  } else {
    emptyState.classList.add('hidden');
  }
}

// Event listeners para búsqueda y filtros
document.getElementById('searchCourses').addEventListener('input', filterCourses);
document.getElementById('typeFilter').addEventListener('change', filterCourses);

// Cerrar modales con Escape
document.addEventListener('keydown', function(e) {
  if (e.key === 'Escape') {
    closeCourseModal();
    closeFileModal();
    closeDeleteCourseModal();
    closeDeleteFileModal();
  }
});
</script>
@endsection