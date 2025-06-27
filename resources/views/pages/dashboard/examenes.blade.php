@extends('layouts.dashboard')

@section('content')
  <div class="max-w-4xl mx-auto py-10">
    <h2 class="text-2xl font-bold mb-6">Gestión de Exámenes</h2>

    {{-- Botón para abrir modal de creación --}}
    <div class="mb-6">
      <button onclick="openExamModal()" class="bg-blue-600 text-white px-4 py-2 rounded">
        Nuevo Examen
      </button>
    </div>

    {{-- Lista de exámenes --}}
    <table class="w-full border-collapse border border-gray-200">
      <thead class="bg-gray-100">
        <tr>
          <th class="border px-4 py-2">Curso</th>
          <th class="border px-4 py-2">Título</th>
          <th class="border px-4 py-2">Acciones</th>
        </tr>
      </thead>
      <tbody>
        @forelse ($examenes as $examen)
          <tr>
            <td class="border px-4 py-2">{{ $examen->course->title ?? 'Sin curso' }}</td>
            <td class="border px-4 py-2">{{ $examen->title }}</td>
            <td class="border px-4 py-2 flex items-center gap-4">
              {{-- Ir a configuración --}}
              <a href="{{ route('dashboard.examenes.show', $examen->course->id) }}" class="text-blue-600 hover:underline">
                Configurar
              </a>

              {{-- Eliminar examen --}}
              <form method="POST" action="{{ route('examenes.destroy', $examen) }}"
                onsubmit="return confirm('¿Eliminar este examen?')">
                @csrf
                @method('DELETE')
                <button type="submit" class="text-red-600 hover:underline">Eliminar</button>
              </form>
            </td>
          </tr>
        @empty
          <tr>
            <td colspan="3" class="text-center py-4">No hay exámenes registrados.</td>
          </tr>
        @endforelse
      </tbody>
    </table>
  </div>

  {{-- Modal para crear examen --}}
  <dialog id="examModal" class="fixed inset-0 bg-black/50 items-center justify-center z-50">
    <div class="bg-white p-6 rounded shadow-md w-full max-w-md">
      <h3 class="text-lg font-semibold mb-4">Crear nuevo examen</h3>

      <form method="POST" action="{{ route('examenes.store') }}">
        @csrf

        <div class="mb-4">
          <label class="block mb-1">Curso</label>
          <select name="course_id" class="w-full border rounded px-3 py-2" required>
            @foreach ($cursos as $curso)
              <option value="{{ $curso->id }}">{{ $curso->title }}</option>
            @endforeach
          </select>
        </div>

        <div class="mb-4">
          <label class="block mb-1">Título</label>
          <input type="text" name="title" class="w-full border rounded px-3 py-2" required>
        </div>

        <div class="mb-4">
          <label class="block mb-1">Descripción (opcional)</label>
          <textarea name="description" class="w-full border rounded px-3 py-2"></textarea>
        </div>

        <div class="flex justify-end space-x-2">
          <button type="button" onclick="closeExamModal()" class="bg-gray-200 px-4 py-2 rounded">Cancelar</button>
          <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded">Crear</button>
        </div>
      </form>
    </div>
  </dialog>

  <script>
    function openExamModal() {
      document.getElementById('examModal').showModal();
    }

    function closeExamModal() {
      document.getElementById('examModal').close();
    }
  </script>
@endsection
