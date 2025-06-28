@extends('layouts.dashboard')

@section('content')
  <div class="">
    <div class="max-w-5xl mx-auto">
      <div class="mb-8">
        <div class="flex items-center text-sm text-gray-500 mb-4">
          <a href="{{ route('dashboard.examenes') }}" class="hover:text-blue-600 transition-colors">Exámenes</a>
          <svg class="w-4 h-4 mx-2" fill="currentColor" viewBox="0 0 20 20">
            <path fill-rule="evenodd"
              d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
              clip-rule="evenodd"></path>
          </svg>
          <span class="text-gray-900">Configuración</span>
        </div>
        <div class="bg-white rounded-2xl shadow-xl p-6 mb-6">
          <div class="flex items-center justify-between">
            <div>
              <h1 class="text-3xl font-bold text-gray-900">{{ $examen->title }}</h1>
              <p class="text-lg text-gray-600 mt-1">{{ $curso->title }}</p>
            </div>
            <div class="text-right">
              <div
                class="bg-gradient-to-r from-blue-500 to-indigo-600 text-white px-4 py-2 rounded-xl text-sm font-medium">
                {{ $examen->questions->count() }} Preguntas
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        <div class="lg:col-span-2 space-y-6">
          @forelse ($examen->questions as $index => $preg)
            <div class="bg-white rounded-2xl shadow-lg overflow-hidden">
              <div class="bg-gradient-to-r from-gray-50 to-gray-100 px-6 py-4 border-b">
                <div class="flex items-center justify-between">
                  <h3 class="font-semibold text-gray-900">Pregunta {{ $index + 1 }}</h3>
                  <form method="POST" action="{{ route('dashboard.examenes.preguntas.destroy', $preg) }}"
                    onsubmit="return confirm('¿Eliminar esta pregunta?')" class="inline">
                    @csrf @method('DELETE')
                    <button type="submit"
                      class="text-red-500 hover:text-red-700 p-2 rounded-lg hover:bg-red-50 transition-colors">
                      <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16">
                        </path>
                      </svg>
                    </button>
                  </form>
                </div>
              </div>

              <div class="p-6">
                <p class="text-gray-900 font-medium mb-6">{{ $preg->text }}</p>

                <div class="space-y-3 mb-6">
                  @foreach ($preg->options as $opt)
                    <div
                      class="flex items-center justify-between p-4 rounded-xl {{ $opt->is_correct ? 'bg-green-50 border-2 border-green-200' : 'bg-gray-50 border border-gray-200' }}">
                      <div class="flex items-center">
                        @if ($opt->is_correct)
                          <div class="w-6 h-6 bg-green-500 rounded-full flex items-center justify-center mr-3">
                            <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7">
                              </path>
                            </svg>
                          </div>
                        @else
                          <div class="w-6 h-6 bg-gray-300 rounded-full mr-3"></div>
                        @endif
                        <span class="text-gray-900">{{ $opt->text }}</span>
                      </div>
                      <form method="POST" action="{{ route('dashboard.examenes.opciones.destroy', $opt) }}"
                        onsubmit="return confirm('¿Eliminar esta opción?')" class="inline">
                        @csrf @method('DELETE')
                        <button type="submit" class="text-red-400 hover:text-red-600 p-1 rounded transition-colors">
                          <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M6 18L18 6M6 6l12 12"></path>
                          </svg>
                        </button>
                      </form>
                    </div>
                  @endforeach
                </div>

                <form method="POST" action="{{ route('dashboard.examenes.opciones.store', $preg) }}"
                  class="bg-gray-50 rounded-xl p-4">
                  @csrf
                  <div class="flex items-center space-x-3">
                    <input type="text" name="text"
                      class="flex-1 px-4 py-2 border border-gray-200 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                      placeholder="Nueva opción de respuesta..." required>
                    <label class="flex items-center space-x-2 text-sm font-medium text-gray-700">
                      <input type="checkbox" name="is_correct" value="1"
                        class="w-4 h-4 text-green-600 border-gray-300 rounded focus:ring-green-500">
                      <span>Correcta</span>
                    </label>
                    <button type="submit"
                      class="px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded-lg font-medium transition-colors">
                      Agregar
                    </button>
                  </div>
                </form>
              </div>
            </div>
          @empty
            <div class="bg-white rounded-2xl shadow-lg p-12 text-center">
              <svg class="w-16 h-16 text-gray-300 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1"
                  d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z">
                </path>
              </svg>
              <h3 class="text-lg font-medium text-gray-900 mb-2">No hay preguntas</h3>
              <p class="text-gray-500">Agrega la primera pregunta para este examen</p>
            </div>
          @endforelse
        </div>

        <div class="space-y-6">
          <div class="bg-white rounded-2xl shadow-lg p-6 sticky top-6">
            <h3 class="text-lg font-semibold text-gray-900 mb-4">Nueva Pregunta</h3>
            <form method="POST" action="{{ route('dashboard.examenes.preguntas.store', $curso) }}" class="space-y-4">
              @csrf
              <div>
                <textarea name="text" rows="4"
                  class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-transparent resize-none"
                  placeholder="Escribe tu pregunta aquí..." required></textarea>
              </div>
              <button type="submit"
                class="w-full px-4 py-3 bg-gradient-to-r from-blue-600 to-blue-700 hover:from-blue-700 hover:to-blue-800 text-white rounded-xl font-medium shadow-lg hover:shadow-xl transform hover:-translate-y-0.5 transition-all duration-200">
                <svg class="w-5 h-5 inline-block mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                </svg>
                Agregar Pregunta
              </button>
            </form>
          </div>

          <div class="bg-gradient-to-br from-indigo-50 to-blue-50 rounded-2xl p-6">
            <h4 class="font-semibold text-gray-900 mb-3">Estadísticas</h4>
            <div class="space-y-3">
              <div class="flex justify-between items-center">
                <span class="text-gray-600">Total de preguntas:</span>
                <span class="font-semibold text-gray-900">{{ $examen->questions->count() }}</span>
              </div>
              <div class="flex justify-between items-center">
                <span class="text-gray-600">Opciones totales:</span>
                <span
                  class="font-semibold text-gray-900">{{ $examen->questions->sum(function ($q) {return $q->options->count();}) }}</span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
