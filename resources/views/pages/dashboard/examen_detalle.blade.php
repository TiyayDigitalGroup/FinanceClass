@extends('layouts.dashboard')

@section('content')
  <h2>Examen: {{ $examen->title }} ({{ $curso->title }})</h2>

  {{-- Agregar pregunta --}}
  <form method="POST" action="{{ route('dashboard.examenes.preguntas.store', $curso) }}">
    @csrf
    <input name="text" placeholder="Texto de la pregunta" required>
    <button type="submit">Agregar pregunta</button>
  </form>

  @foreach ($examen->questions as $preg)
    <div>
      <p><strong>P: </strong>{{ $preg->text }}
      <form method="POST" action="{{ route('dashboard.examenes.preguntas.destroy', $preg) }}" style="display:inline">
        @csrf @method('DELETE')
        <button>🗑️</button>
      </form>
      </p>

      {{-- Agregar opción --}}
      <form method="POST" action="{{ route('dashboard.examenes.opciones.store', $preg) }}">
        @csrf
        <input name="text" placeholder="Texto opción" required>
        <input type="hidden" name="is_correct" value="0">
        <label>
          <input type="checkbox" name="is_correct" value="1"> Correcta
        </label>

        <button type="submit">Agregar opción</button>
      </form>

      <ul>
        @foreach ($preg->options as $opt)
          <li>
            {{ $opt->text }} {!! $opt->is_correct ? '<strong>(✔️)</strong>' : '' !!}
            <form method="POST" action="{{ route('dashboard.examenes.opciones.destroy', $opt) }}" style="display:inline">
              @csrf @method('DELETE')
              <button>🗑️</button>
            </form>
          </li>
        @endforeach
      </ul>
    </div>
  @endforeach
@endsection
