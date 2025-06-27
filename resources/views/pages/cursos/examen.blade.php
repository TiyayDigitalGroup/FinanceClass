@extends('layouts.app')

@section('title', 'Examen - ' . $curso->title)

@section('content')
  <div class="max-w-3xl mx-auto py-10">
    <h2 class="text-2xl font-bold mb-6">{{ $examen->title }}</h2>
    <p class="mb-6 text-gray-600">{{ $examen->description }}</p>

    <form method="POST" action="{{ route('cursos.examen.enviar', $curso->code) }}">
      @csrf

      @foreach ($examen->questions as $index => $question)
        <div class="mb-6">
          <p class="font-semibold mb-2">{{ $index + 1 }}. {{ $question->text }}</p>

          @foreach ($question->options as $option)
            <label class="block mb-1">
              <input type="radio" name="respuestas[{{ $question->id }}]" value="{{ $option->id }}" required>
              {{ $option->text }}
            </label>
          @endforeach
        </div>
      @endforeach

      <div class="text-right mt-8">
        <button type="submit" class="bg-green-600 text-white px-6 py-2 rounded hover:bg-green-700 transition">Enviar
          respuestas</button>
      </div>
    </form>
    @if (session('resultado'))
      <dialog id="resultadoModal" class="fixed inset-0 bg-black/50 z-50 flex items-center justify-center">
        <div class="bg-white p-6 rounded-lg shadow max-w-md w-full">
          <h3 class="text-xl font-semibold mb-4">Resultado del Examen</h3>
          <p>Respuestas correctas: <strong>{{ session('resultado.correctas') }}/{{ session('resultado.total') }}</strong>
          </p>
          <p>Calificación: <strong>{{ session('resultado.nota') }}%</strong></p>
          <p class="mt-2">
            Estado:
            <strong class="{{ session('resultado.aprobado') ? 'text-green-600' : 'text-red-600' }}">
              {{ session('resultado.aprobado') ? 'Aprobado' : 'No aprobado' }}
            </strong>
          </p>
          <div class="text-right mt-4">
            <a href="{{ route('cursos.index') }}"
              class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700 transition">
              Ir a cursos
            </a>
          </div>
        </div>
      </dialog>

      <script>
        document.addEventListener('DOMContentLoaded', () => {
          document.getElementById('resultadoModal').showModal();
        });
      </script>
    @endif

  </div>
@endsection
