@extends('layouts.app')

@section('title', 'Examen | ' . $curso->title)

@section('content')
  @auth
    <div class="min-h-screen bg-gradient-to-br from-slate-50 via-blue-50 to-indigo-100 pt-16 pb-8">
      <div class="max-w-4xl mx-auto px-4">
        <div class="bg-white rounded-3xl shadow-xl border border-gray-100 p-8 mb-8 relative overflow-hidden">
          <div
            class="absolute top-0 right-0 w-32 h-32 bg-gradient-to-br from-blue-400/10 to-purple-400/10 rounded-full -translate-y-16 translate-x-16">
          </div>
          <div
            class="absolute bottom-0 left-0 w-24 h-24 bg-gradient-to-br from-indigo-400/10 to-blue-400/10 rounded-full translate-y-12 -translate-x-12">
          </div>

          <div class="relative">
            <div class="flex items-start justify-between">
              <div class="flex-1">
                <div class="flex items-center space-x-3 mb-4">
                  <div
                    class="w-12 h-12 bg-gradient-to-br from-blue-500 to-purple-600 rounded-xl flex items-center justify-center">
                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                    </svg>
                  </div>
                  <div>
                    <h1 class="text-3xl font-bold text-gray-900">{{ $examen->title }}</h1>
                    <p class="text-blue-600 font-medium">{{ $curso->title }}</p>
                  </div>
                </div>

                @if ($examen->description)
                  <p class="text-gray-600 text-lg leading-relaxed mb-6">{{ $examen->description }}</p>
                @endif
              </div>
            </div>
            <div class="bg-yellow-50 border border-yellow-200 rounded-2xl p-4 mt-6">
              <div class="flex items-start space-x-3">
                <div class="w-6 h-6 bg-yellow-100 rounded-full flex items-center justify-center flex-shrink-0 mt-0.5">
                  <svg class="w-4 h-4 text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                  </svg>
                </div>
                <div>
                  <h4 class="font-semibold text-yellow-800 mb-1">Instrucciones</h4>
                  <ul class="text-yellow-700 text-sm space-y-1">
                    <li>• Lee cada pregunta cuidadosamente antes de responder</li>
                    <li>• Selecciona solo una opción por pregunta</li>
                    <li>• Puedes revisar tus respuestas antes de enviar</li>
                    <li>• Una vez enviado, no podrás modificar las respuestas</li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
        <form id="examForm" method="POST" action="{{ route('cursos.examen.enviar', $curso->code) }}" class="space-y-6">
          @csrf
          <div class="bg-white rounded-2xl shadow-lg border border-gray-100 p-6">
            <div class="flex items-center justify-between mb-3">
              <span class="text-sm font-medium text-gray-700">Progreso del examen</span>
              <span id="progressText" class="text-sm font-medium text-blue-600">0 de {{ count($examen->questions) }}
                respondidas</span>
            </div>
            <div class="w-full bg-gray-200 rounded-full h-2">
              <div id="progressBar"
                class="bg-gradient-to-r from-blue-500 to-purple-500 h-2 rounded-full transition-all duration-300"
                style="width: 0%"></div>
            </div>
          </div>
          @foreach ($examen->questions as $index => $question)
            <div
              class="question-card bg-white rounded-2xl shadow-lg border border-gray-100 p-8 transition-all duration-300 hover:shadow-xl"
              data-question="{{ $index + 1 }}">
              <div class="flex items-start space-x-4 mb-6">
                <div
                  class="w-10 h-10 bg-gradient-to-br from-blue-500 to-purple-600 rounded-xl flex items-center justify-center flex-shrink-0">
                  <span class="text-white font-bold text-sm">{{ $index + 1 }}</span>
                </div>
                <div class="flex-1">
                  <h3 class="text-xl font-semibold text-gray-900 leading-relaxed">{{ $question->text }}</h3>
                </div>
              </div>
              <div class="ml-14 space-y-3">
                @foreach ($question->options as $optionIndex => $option)
                  <label
                    class="option-label group flex items-center p-4 border-2 border-gray-200 rounded-xl cursor-pointer hover:border-blue-300 hover:bg-blue-50/50 transition-all duration-200">
                    <div class="relative flex items-center">
                      <input type="radio" name="respuestas[{{ $question->id }}]" value="{{ $option->id }}"
                        class="sr-only question-input" data-question="{{ $index + 1 }}" required>
                      <div
                        class="w-5 h-5 border-2 border-gray-300 rounded-full flex items-center justify-center group-hover:border-blue-500 transition-colors duration-200">
                        <div class="w-2.5 h-2.5 bg-blue-500 rounded-full opacity-0 scale-0 transition-all duration-200">
                        </div>
                      </div>
                      <div
                        class="w-8 h-8 bg-gray-100 rounded-lg flex items-center justify-center ml-4 mr-4 group-hover:bg-blue-100 transition-colors duration-200">
                        <span
                          class="text-sm font-semibold text-gray-600 group-hover:text-blue-600">{{ chr(65 + $optionIndex) }}</span>
                      </div>
                    </div>
                    <span
                      class="text-gray-700 group-hover:text-gray-900 transition-colors duration-200 leading-relaxed">{{ $option->text }}</span>
                  </label>
                @endforeach
              </div>
            </div>
          @endforeach
          <div class="bg-white rounded-2xl shadow-lg border border-gray-100 p-8">
            <div class="flex flex-col sm:flex-row items-center justify-between space-y-4 sm:space-y-0">
              <div class="text-center sm:text-left">
                <p class="text-gray-600 text-sm">Revisa tus respuestas antes de enviar</p>
                <p class="text-gray-500 text-xs mt-1">Una vez enviado, no podrás modificar las respuestas</p>
              </div>

              <button type="submit" id="submitBtn" disabled
                class="inline-flex items-center px-8 py-4 bg-gradient-to-r from-green-500 to-emerald-600 hover:from-green-600 hover:to-emerald-700 disabled:from-gray-300 disabled:to-gray-400 text-white font-semibold rounded-xl shadow-lg hover:shadow-xl disabled:shadow-none transform hover:-translate-y-0.5 disabled:transform-none transition-all duration-300 disabled:cursor-not-allowed">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8" />
                </svg>
                <span id="submitText">Completar todas las preguntas</span>
              </button>
            </div>
          </div>
        </form>
      </div>
    </div>
    @if (session('resultado'))
      <div id="resultadoModal"
        class="fixed inset-0 bg-black/60 backdrop-blur-sm z-50 flex items-center justify-center p-4 opacity-0">
        <div class="bg-white rounded-3xl shadow-2xl max-w-lg w-full transform scale-95 transition-all duration-300">
          <div
            class="bg-gradient-to-r from-{{ session('resultado.aprobado') ? 'green' : 'red' }}-500 to-{{ session('resultado.aprobado') ? 'emerald' : 'pink' }}-600 px-8 py-6 rounded-t-3xl">
            <div class="flex items-center space-x-4">
              <div class="w-12 h-12 bg-white/20 rounded-xl flex items-center justify-center">
                @if (session('resultado.aprobado'))
                  <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                  </svg>
                @else
                  <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                  </svg>
                @endif
              </div>
              <div>
                <h3 class="text-2xl font-bold text-white">Resultado del Examen</h3>
                <p class="text-white/80">{{ $examen->title }}</p>
              </div>
            </div>
          </div>
          <div class="p-8">
            <div class="text-center mb-8">
              <div class="w-24 h-24 mx-auto mb-4 relative">
                <svg class="w-24 h-24 transform -rotate-90" viewBox="0 0 100 100">
                  <circle cx="50" cy="50" r="40" stroke="#e5e7eb" stroke-width="8" fill="none" />
                  <circle cx="50" cy="50" r="40"
                    stroke="{{ session('resultado.aprobado') ? '#10b981' : '#ef4444' }}" stroke-width="8" fill="none"
                    stroke-dasharray="251.2" stroke-dashoffset="{{ 251.2 - (251.2 * session('resultado.nota')) / 100 }}"
                    stroke-linecap="round" class="transition-all duration-1000 ease-out" />
                </svg>
                <div class="absolute inset-0 flex items-center justify-center">
                  <span class="text-2xl font-bold text-gray-900">{{ session('resultado.nota') }}%</span>
                </div>
              </div>

              <h4 class="text-xl font-bold mb-2 {{ session('resultado.aprobado') ? 'text-green-600' : 'text-red-600' }}">
                {{ session('resultado.aprobado') ? '¡Felicitaciones!' : 'No aprobado' }}
              </h4>
              <p class="text-gray-600">
                {{ session('resultado.aprobado') ? 'Has aprobado el examen exitosamente' : 'Necesitas estudiar más para aprobar' }}
              </p>
            </div>
            <div class="grid grid-cols-2 gap-4 mb-8">
              <div class="bg-gray-50 rounded-2xl p-4 text-center">
                <div class="text-2xl font-bold text-green-600 mb-1">{{ session('resultado.correctas') }}</div>
                <div class="text-sm text-gray-600">Correctas</div>
              </div>
              <div class="bg-gray-50 rounded-2xl p-4 text-center">
                <div class="text-2xl font-bold text-red-600 mb-1">
                  {{ session('resultado.total') - session('resultado.correctas') }}</div>
                <div class="text-sm text-gray-600">Incorrectas</div>
              </div>
            </div>
            <div
              class="bg-{{ session('resultado.aprobado') ? 'green' : 'blue' }}-50 border border-{{ session('resultado.aprobado') ? 'green' : 'blue' }}-200 rounded-2xl p-4 mb-6">
              <p class="text-{{ session('resultado.aprobado') ? 'green' : 'blue' }}-800 text-sm text-center">
                @if (session('resultado.aprobado'))
                  ¡Excelente trabajo! Continúa con el siguiente módulo del curso.
                @else
                  No te desanimes. Revisa el material y vuelve a intentarlo cuando te sientas preparado.
                @endif
              </p>
            </div>
            <div class="flex flex-col sm:flex-row gap-3">
              @if (!session('resultado.aprobado'))
                {{-- <button onclick="closeModal()"
                  class="flex-1 px-6 py-3 bg-blue-600 hover:bg-blue-700 text-white font-semibold rounded-xl transition-colors">
                  Revisar Material
                </button> --}}
                <a href="{{ route('cursos.show', ['codigo' => $curso->code]) }}"
                  class="flex-1 px-6 py-3 bg-gradient-to-r from-blue-500 to-sky-600 hover:from-blue-600 hover:to-sky-700 text-white font-semibold rounded-xl text-center transition-all duration-200 transform hover:-translate-y-0.5">
                  Revisar Material
                </a>
              @endif
              <a href="{{ route('cursos.index') }}"
                class="flex-1 px-6 py-3 bg-gradient-to-r from-green-500 to-emerald-600 hover:from-green-600 hover:to-emerald-700 text-white font-semibold rounded-xl text-center transition-all duration-200 transform hover:-translate-y-0.5">
                {{ session('resultado.aprobado') ? 'Continuar Aprendiendo' : 'Volver a Cursos' }}
              </a>
            </div>
          </div>
        </div>
      </div>
    @endif

    <style>
      .option-label input[type="radio"]:checked+div .w-2\.5 {
        opacity: 1;
        transform: scale(1);
      }

      .option-label input[type="radio"]:checked+div {
        border-color: #3b82f6;
      }

      .option-label:has(input[type="radio"]:checked) {
        border-color: #3b82f6;
        background-color: #eff6ff;
      }

      .option-label:has(input[type="radio"]:checked) .bg-gray-100 {
        background-color: #dbeafe;
      }

      .option-label:has(input[type="radio"]:checked) .text-gray-600 {
        color: #2563eb;
      }

      @keyframes slideInUp {
        from {
          opacity: 0;
          transform: translateY(20px);
        }

        to {
          opacity: 1;
          transform: translateY(0);
        }
      }

      .question-card {
        animation: slideInUp 0.6s ease-out forwards;
      }

      .question-card:nth-child(1) {
        animation-delay: 0.1s;
      }

      .question-card:nth-child(2) {
        animation-delay: 0.2s;
      }

      .question-card:nth-child(3) {
        animation-delay: 0.3s;
      }

      .question-card:nth-child(4) {
        animation-delay: 0.4s;
      }

      .question-card:nth-child(5) {
        animation-delay: 0.5s;
      }
    </style>

    <script>
      document.addEventListener('DOMContentLoaded', function() {
        const form = document.getElementById('examForm');
        const submitBtn = document.getElementById('submitBtn');
        const submitText = document.getElementById('submitText');
        const progressBar = document.getElementById('progressBar');
        const progressText = document.getElementById('progressText');
        const totalQuestions = {{ count($examen->questions) }};

        function updateProgress() {
          const answeredQuestions = form.querySelectorAll('input[type="radio"]:checked').length;
          const percentage = (answeredQuestions / totalQuestions) * 100;

          progressBar.style.width = percentage + '%';
          progressText.textContent = `${answeredQuestions} de ${totalQuestions} respondidas`;

          if (answeredQuestions === totalQuestions) {
            submitBtn.disabled = false;
            submitText.textContent = 'Enviar Respuestas';
          } else {
            submitBtn.disabled = true;
            submitText.textContent = `Faltan ${totalQuestions - answeredQuestions} pregunta(s)`;
          }
        }

        form.addEventListener('change', updateProgress);

        updateProgress();

        @if (session('resultado'))
          const modal = document.getElementById('resultadoModal');

          setTimeout(() => {
            modal.style.opacity = '1';
            modal.querySelector('.bg-white').style.transform = 'scale(1)';
          }, 100);

          window.closeModal = function() {
            modal.style.opacity = '0';
            modal.querySelector('.bg-white').style.transform = 'scale(0.95)';
            setTimeout(() => {
              modal.style.display = 'none';
            }, 300);
          };
        @endif
      });
    </script>
  @else
    <x-ui.state-poster titulo="Examen del curso: {{ $curso->title }}"
      mensaje="Es necesario tener una sesion iniciada para realizar el examen" tipo="info" urlVolver="/login"
      textoBotonVolver="Iniciar sesion" />
  @endauth
@endsection
