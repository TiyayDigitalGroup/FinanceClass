@extends('layouts.dashboard')

@section('title', 'Gestión de Exámenes')
@section('description', 'Administra exámenes y evaluaciones')

@section('content')
  <div class="space-y-8">
    <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between space-y-4 lg:space-y-0">
      <div>
        <h1 class="text-3xl font-bold text-gray-900">Gestión de Exámenes</h1>
        <p class="text-gray-600 mt-2">Crea y administra exámenes para tus cursos</p>
      </div>

      <div class="flex items-center space-x-6 text-sm">
        <div class="text-center">
          <div class="text-2xl font-bold text-blue-600">{{ $examenes->count() }}</div>
          <div class="text-gray-500">Total</div>
        </div>
        <div class="text-center">
          <div class="text-2xl font-bold text-green-600">{{ $examenes->where('activo', 1)->count() }}</div>
          <div class="text-gray-500">Activos</div>
        </div>
      </div>
    </div>

    @if (session('success'))
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

    <div class="bg-white rounded-2xl shadow-lg border border-gray-100 p-6">
      <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between space-y-4 sm:space-y-0">
        <div class="flex items-center space-x-4">
          <button onclick="openExamModal()"
            class="inline-flex items-center px-6 py-3 bg-gradient-to-r from-blue-500 to-purple-600 hover:from-blue-600 hover:to-purple-700 text-white font-semibold rounded-xl shadow-lg hover:shadow-xl transform hover:-translate-y-0.5 transition-all duration-300 group">
            <svg class="w-5 h-5 mr-2 group-hover:rotate-90 transition-transform duration-300" fill="none"
              stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
            </svg>
            Nuevo Examen
          </button>
        </div>

        <div class="flex flex-col sm:flex-row items-stretch sm:items-center space-y-3 sm:space-y-0 sm:space-x-3">
          <div class="relative">
            <input type="text" id="searchExams" placeholder="Buscar exámenes..."
              class="pl-10 pr-4 py-2 border border-gray-200 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200 w-full sm:w-64">
            <svg class="w-4 h-4 text-gray-400 absolute left-3 top-3" fill="none" stroke="currentColor"
              viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
            </svg>
          </div>

          <select id="courseFilter"
            class="border border-gray-200 rounded-lg px-3 py-2 focus:ring-2 focus:ring-blue-500 focus:border-transparent text-sm">
            <option value="">Todos los cursos</option>
            @foreach ($cursos as $curso)
              <option value="{{ $curso->id }}">{{ $curso->title }}</option>
            @endforeach
          </select>
        </div>
      </div>
    </div>

    <div class="bg-white rounded-2xl shadow-lg border border-gray-100 overflow-hidden">
      <div class="px-6 py-4 border-b border-gray-200">
        <h3 class="text-lg font-semibold text-gray-900">Lista de Exámenes</h3>
        <p class="text-sm text-gray-500 mt-1">Gestiona y administra todos los exámenes del sistema</p>
      </div>

      @if ($examenes->count() > 0)
        <div class="overflow-x-auto">
          <table class="w-full">
            <thead class="bg-gray-50">
              <tr>
                <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                  <div class="flex items-center space-x-1">
                    <span>Examen</span>
                    <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M7 16V4m0 0L3 8m4-4l4 4m6 0v12m0 0l4-4m-4 4l-4-4" />
                    </svg>
                  </div>
                </th>
                <th
                  class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider hidden md:table-cell">
                  Curso
                </th>
                <th
                  class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider hidden lg:table-cell">
                  Preguntas
                </th>
                <th class="px-6 py-4 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">
                  Acciones
                </th>
              </tr>
            </thead>
            <tbody id="examsTableBody" class="bg-white divide-y divide-gray-200">
              @foreach ($examenes as $index => $examen)
                <tr class="exam-row hover:bg-gray-50 transition-colors duration-200"
                  data-title="{{ strtolower($examen->title) }}" data-course="{{ $examen->course->id ?? '' }}">
                  <td class="px-6 py-4 whitespace-nowrap">
                    <div class="flex items-center">
                      <div
                        class="w-10 h-10 bg-gradient-to-br from-blue-400 to-purple-500 rounded-xl flex items-center justify-center">
                        <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                        </svg>
                      </div>
                      <div class="ml-4 max-w-52 overflow-ellipsis">
                        <div class="text-sm font-medium text-gray-900 truncate">{{ $examen->title }}</div>
                        <div class="text-sm text-gray-500 md:hidden truncate">{{ $examen->course->title ?? 'Sin curso' }}</div>
                        {{-- @if ($examen->description)
                          <div class="text-xs text-gray-400 mt-1 max-w-xs truncate">{{ $examen->description }}</div>
                        @endif --}}
                      </div>
                    </div>
                  </td>
                  <td class="px-6 py-4 whitespace-nowrap hidden md:table-cell">
                    <div class="flex items-center max-w-min">
                      <span
                        class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-100 text-blue-800">
                        {{ $examen->course->title ?? 'Sin curso' }}
                      </span>
                    </div>
                  </td>
                  <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 hidden lg:table-cell">
                    <div class="flex items-center">
                      <svg class="w-4 h-4 text-gray-400 mr-2" fill="none" stroke="currentColor"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                      </svg>
                      {{ $examen->questions->count() ?? 0 }} preguntas
                    </div>
                  </td>
                  <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                    <div class="flex items-center justify-end space-x-2">
                      <a href="{{ route('dashboard.examenes.show', $examen->course->id ?? $examen->id) }}"
                        class="text-blue-600 hover:text-blue-800 p-2 hover:bg-blue-50 rounded-lg transition-colors duration-200"
                        title="Configurar examen">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                      </a>

                      <button onclick="confirmDelete({{ $examen->id }}, '{{ $examen->title }}')"
                        class="text-red-600 hover:text-red-800 p-2 hover:bg-red-50 rounded-lg transition-colors duration-200"
                        title="Eliminar examen">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                        </svg>
                      </button>
                    </div>
                  </td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      @else
        <div class="text-center py-16">
          <svg class="w-16 h-16 text-gray-300 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
              d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
          </svg>
          <h3 class="text-lg font-medium text-gray-900 mb-2">No hay exámenes registrados</h3>
          <p class="text-gray-500 mb-6">Comienza creando tu primer examen</p>
          <button onclick="openExamModal()"
            class="inline-flex items-center px-6 py-3 bg-gradient-to-r from-blue-500 to-purple-600 text-white font-medium rounded-xl hover:from-blue-600 hover:to-purple-700 transition-all duration-200 transform hover:scale-105">
            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
            </svg>
            Crear Primer Examen
          </button>
        </div>
      @endif

      <div id="emptyState" class="hidden text-center py-12">
        <svg class="w-16 h-16 text-gray-300 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
            d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
        </svg>
        <h3 class="text-lg font-medium text-gray-900 mb-2">No se encontraron exámenes</h3>
        <p class="text-gray-500">Intenta ajustar los filtros de búsqueda</p>
      </div>
    </div>
  </div>

  <div id="examModal" class="fixed inset-0 bg-black/60 backdrop-blur-sm z-50 hidden items-center justify-center p-4">
    <div class="bg-white rounded-3xl shadow-2xl max-w-lg w-full max-h-[90vh] overflow-hidden animate-scale-in">

      <div class="bg-gradient-to-r from-blue-500 to-purple-600 px-8 py-6">
        <div class="flex items-center justify-between">
          <div class="flex items-center space-x-3">
            <div class="w-10 h-10 bg-white/20 rounded-xl flex items-center justify-center">
              <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
              </svg>
            </div>
            <div>
              <h2 class="text-2xl font-bold text-white">Crear nuevo examen</h2>
              <p class="text-blue-100 text-sm">Completa la información del examen</p>
            </div>
          </div>
          <button onclick="closeExamModal()"
            class="w-8 h-8 bg-white/20 hover:bg-white/30 rounded-lg flex items-center justify-center text-white transition-colors">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
            </svg>
          </button>
        </div>
      </div>

      <div class="p-8">
        <form method="POST" action="{{ route('examenes.store') }}" class="space-y-6">
          @csrf

          <div class="space-y-2">
            <label for="course_id" class="block text-sm font-semibold text-gray-700">
              Curso *
            </label>
            <div class="relative group">
              <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                <svg class="w-5 h-5 text-gray-400 group-focus-within:text-blue-500 transition-colors duration-200"
                  fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                </svg>
              </div>
              <select name="course_id" id="course_id" required
                class="w-full pl-12 pr-4 py-3 bg-gray-50/50 border border-gray-200 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200 appearance-none">
                <option value="">Seleccionar curso</option>
                @foreach ($cursos as $curso)
                  @if (!$curso->exam)
                    <option value="{{ $curso->id }}">{{ $curso->title }}</option>
                  @endif
                @endforeach
              </select>
            </div>
          </div>

          <div class="space-y-2">
            <label for="title" class="block text-sm font-semibold text-gray-700">
              Título del examen *
            </label>
            <div class="relative group">
              <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                <svg class="w-5 h-5 text-gray-400 group-focus-within:text-blue-500 transition-colors duration-200"
                  fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                </svg>
              </div>
              <input type="text" id="title" name="title" required
                class="w-full pl-12 pr-4 py-3 bg-gray-50/50 border border-gray-200 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200 placeholder-gray-400 hover:bg-gray-50 focus:bg-white"
                placeholder="Examen Final - Módulo 1">
            </div>
          </div>

          <div class="space-y-2">
            <label for="description" class="block text-sm font-semibold text-gray-700">
              Descripción (opcional)
            </label>
            <div class="relative group">
              <textarea id="description" name="description" rows="3"
                class="w-full px-4 py-3 bg-gray-50/50 border border-gray-200 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200 placeholder-gray-400 hover:bg-gray-50 focus:bg-white resize-none"
                placeholder="Describe el contenido y objetivos del examen..."></textarea>
            </div>
          </div>

          <div class="flex justify-end space-x-4 pt-6 border-t border-gray-100">
            <button type="button" onclick="closeExamModal()"
              class="px-6 py-3 text-gray-600 bg-gray-100 hover:bg-gray-200 rounded-xl font-medium transition-colors">
              Cancelar
            </button>
            <button type="submit"
              class="px-8 py-3 bg-gradient-to-r from-green-500 to-emerald-600 hover:from-green-600 hover:to-emerald-700 text-white font-semibold rounded-xl transition-all duration-200 transform hover:scale-105">
              Crear Examen
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>

  <div id="deleteModal" class="fixed inset-0 bg-black/50 backdrop-blur-sm z-50 hidden items-center justify-center">
    <div class="bg-white rounded-2xl shadow-2xl max-w-md w-full mx-4 animate-scale-in">
      <div class="p-6">
        <div class="flex items-center justify-center w-12 h-12 mx-auto bg-red-100 rounded-full mb-4">
          <svg class="w-6 h-6 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
              d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
          </svg>
        </div>
        <h3 class="text-lg font-semibold text-gray-900 text-center mb-2">¿Eliminar examen?</h3>
        <p class="text-gray-500 text-center mb-6" id="deleteExamName">Esta acción no se puede deshacer.</p>

        <div class="flex space-x-3">
          <button onclick="closeDeleteModal()"
            class="flex-1 px-4 py-2 text-gray-700 bg-gray-100 hover:bg-gray-200 rounded-xl transition-colors">
            Cancelar
          </button>
          <form id="deleteForm" method="POST" class="flex-1">
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
  </style>

  <script>
    function openExamModal() {
      const modal = document.getElementById('examModal');
      modal.classList.remove('hidden');
      modal.classList.add('flex');
      document.body.style.overflow = 'hidden';
    }

    function closeExamModal() {
      const modal = document.getElementById('examModal');
      modal.classList.add('hidden');
      modal.classList.remove('flex');
      document.body.style.overflow = 'auto';
      document.querySelector('#examModal form').reset();
    }

    function confirmDelete(examId, examName) {
      const modal = document.getElementById('deleteModal');
      const examNameElement = document.getElementById('deleteExamName');
      const form = document.getElementById('deleteForm');

      examNameElement.textContent =
        `¿Estás seguro de que quieres eliminar "${examName}"? Esta acción eliminará también todas sus preguntas.`;
      form.action = `/dashboard/examenes/${examId}`;

      modal.classList.remove('hidden');
      modal.classList.add('flex');
    }

    function closeDeleteModal() {
      const modal = document.getElementById('deleteModal');
      modal.classList.add('hidden');
      modal.classList.remove('flex');
    }

    function filterExams() {
      const searchTerm = document.getElementById('searchExams').value.toLowerCase();
      const courseFilter = document.getElementById('courseFilter').value;
      const rows = document.querySelectorAll('.exam-row');
      const emptyState = document.getElementById('emptyState');
      let visibleRows = 0;

      rows.forEach(row => {
        const title = row.dataset.title;
        const course = row.dataset.course;

        const matchesSearch = title.includes(searchTerm);
        const matchesCourse = !courseFilter || course === courseFilter;

        if (matchesSearch && matchesCourse) {
          row.style.display = '';
          visibleRows++;
        } else {
          row.style.display = 'none';
        }
      });

      if (visibleRows === 0) {
        emptyState.classList.remove('hidden');
      } else {
        emptyState.classList.add('hidden');
      }
    }

    document.getElementById('searchExams').addEventListener('input', filterExams);
    document.getElementById('courseFilter').addEventListener('change', filterExams);

    document.addEventListener('keydown', function(e) {
      if (e.key === 'Escape') {
        closeExamModal();
        closeDeleteModal();
      }
    });
  </script>
@endsection
