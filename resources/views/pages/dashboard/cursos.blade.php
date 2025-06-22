@extends('layouts.app')

@section('title', 'Gestión de Cursos')
@section('description', 'Lista de cursos y sus archivos')

@section('content')
<section class="max-w-6xl mx-auto mt-20 px-4 space-y-8">
  <h1 class="text-2xl font-bold">Gestión de Cursos</h1>

  @if(session('success'))
  <div class="bg-green-100 border border-green-400 text-green-700 p-3 rounded">
    {{ session('success') }}
  </div>
  @endif

  <!-- Botón para abrir modal -->
  <button onclick="document.getElementById('crearCursoModal').classList.remove('hidden')" class="btn btn-primary">
    Nuevo Curso
  </button>

  <!-- Modal -->
  <div id="crearCursoModal" class="fixed inset-0 bg-black/50 hidden items-center justify-center z-50">
    <div class="bg-white p-6 rounded-xl w-full max-w-lg relative">
      <button onclick="document.getElementById('crearCursoModal').classList.add('hidden')"
        class="absolute top-2 right-2 text-gray-500">✖</button>
      <h2 class="text-xl font-semibold mb-4">Nuevo Curso</h2>
      <form method="POST" action="{{ route('dashboard.cursos.store') }}" enctype="multipart/form-data"
        class="space-y-4">
        @csrf
        <input type="text" name="titulo" placeholder="Título del curso" class="input w-full" required>
        <textarea name="descripcion" placeholder="Descripción" class="input w-full"></textarea>
        <select name="premium" class="input w-full" required>
          <option value="0">Gratuito</option>
          <option value="1">Premium</option>
        </select>
        <hr class="my-2">
        <h3 class="font-semibold">Archivo inicial</h3>
        <input type="text" name="archivo_titulo" placeholder="Título del archivo" class="input w-full" required>
        <input type="file" name="archivo" class="input w-full" required>
        <button type="submit" class="btn btn-primary w-full">Crear Curso</button>
      </form>
    </div>
  </div>



  @foreach($cursos as $curso)
  <div class="bg-white border border-gray-200 rounded-lg p-5 shadow">
    <div class="flex justify-between items-center mb-3">
      <div>
        <h2 class="text-xl font-semibold">{{ $curso->titulo }}</h2>
        <p class="text-sm text-gray-500">{{ $curso->premium ? 'Premium' : 'Gratuito' }}</p>
      </div>
      <form method="POST" action="{{ route('dashboard.cursos.destroy', $curso) }}"
        onsubmit="return confirm('¿Estás seguro de eliminar este curso?')">
        @csrf
        @method('DELETE')
        <button type="submit" class="text-red-600 hover:underline">Eliminar</button>
      </form>
      <form method="POST" action="{{ route('cursos.archivos.store', $curso) }}" enctype="multipart/form-data"
        class="mt-4 space-y-2">
        @csrf
        <input type="text" name="titulo" placeholder="Título del archivo" required class="input w-full" />
        <input type="file" name="archivo" required class="input w-full" />
        <button class="btn btn-primary" type="submit">Subir archivo</button>
      </form>
      <span class="text-xs text-gray-400">Código: {{ $curso->codigo }}</span>
    </div>

    @if($curso->archivos->count())
    <table class="w-full table-auto text-sm border">
      <thead>
        <tr class="bg-gray-100">
          <th class="text-left px-3 py-2 border">Título</th>
          <th class="text-left px-3 py-2 border">Tipo</th>
          <th class="px-3 py-2 border">Ver</th>
        </tr>
      </thead>
      <tbody>
        @foreach($curso->archivos as $archivo)
        <tr>
          <td class="px-3 py-2 border">{{ $archivo->titulo }}</td>
          <td class="px-3 py-2 border">{{ ucfirst($archivo->tipo) }}</td>
          <td class="px-3 py-2 border text-center">
            <a href="{{ Storage::url($archivo->ruta) }}" target="_blank" class="text-blue-600 hover:underline">Ver</a>
          </td>
          <td>
            <form method="POST" action="{{ route('archivos.destroy', $archivo) }}"
              onsubmit="return confirm('¿Eliminar este archivo?')">
              @csrf
              @method('DELETE')
              <button class="text-red-600 text-sm hover:underline" type="submit">Eliminar</button>
            </form>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
    @else
    <p class="text-gray-500 italic">Este curso no tiene archivos asociados.</p>
    @endif
  </div>
  @endforeach

  <script>
    let archivoIndex = 1;

  function agregarArchivo() {
    const container = document.getElementById('archivosContainer');
    const html = `
      <div class="archivo-item space-y-2">
        <input type="text" name="archivos[${archivoIndex}][titulo]" class="input w-full" placeholder="Título del archivo" required>
        <input type="file" name="archivos[${archivoIndex}][archivo]" class="input w-full" required>
      </div>
    `;
    container.insertAdjacentHTML('beforeend', html);
    archivoIndex++;
  }
  </script>

</section>
@endsection