<dialog id="modal-{{ $curso->id }}"
  class="backdrop:bg-black/60 max-w-2xl w-full max-h-[90vh] rounded-2xl overflow-hidden m-auto">
  <div class="bg-white rounded-2xl max-h-[90vh] overflow-y-auto">
    <div class="relative p-4 border-b border-gray-200">
      <form method="dialog">
        <button
          class="absolute top-4 right-4 w-8 h-8 bg-gray-100 hover:bg-gray-200 rounded-full flex items-center justify-center transition">
          <x-icon.close class="w-5 h-5 text-gray-600" />
        </button>
      </form>

      <div class="flex items-center space-x-4">
        <div
          class="w-16 h-16 rounded-2xl flex items-center justify-center {{ $tipo === 'premium' ? 'bg-gradient-to-r from-purple-500 to-pink-500' : 'bg-green-500' }}">
          @if ($tipo === 'premium')
          <x-icon.star class="w-6 h-6 text-white" />
          @else
          <x-icon.book class="w-6 h-6 text-white" />
          @endif
        </div>
        <div>
          <h3 class="text-2xl font-bold text-gray-900 mb-1">{{ $curso->titulo }}</h3>
          <span
            class="px-3 py-1 rounded-full text-sm font-medium {{ $tipo === 'premium' ? 'bg-purple-100 text-purple-800' : 'bg-green-100 text-green-800' }}">
            {{ strtoupper($tipo) }}
          </span>
        </div>
      </div>
    </div>

    <div class="p-6">
      <div class="mb-6">
        <img src="{{ $curso->imagen ?? asset('images/curso-bg-default.jpg') }}" alt="Imagen del curso"
          class="w-full h-48 object-cover rounded-xl">
      </div>

      <div>
        <h4 class="text-lg font-semibold text-gray-900 mb-3">Descripción del curso</h4>
        <p class="text-gray-600 leading-relaxed">
          {{ $curso->descripcion ?? 'Este curso aún no tiene descripción.' }}
        </p>
      </div>
    </div>

    <div class="flex flex-col sm:flex-row gap-3 px-4 mb-4">
      <form method="dialog" class="flex-1">
        <button type="submit"
          class="w-full px-6 py-3 border border-gray-300 text-gray-700 font-medium rounded-xl hover:bg-gray-100 transition">
          Cerrar
        </button>
      </form>
      <x-ui.button variant="primary" class="px-6 py-3 flex-1" href="{{ route('cursos.show', ['codigo' => $curso->codigo]) }}">
        Ir al curso
      </x-ui.button>
    </div>
  </div>
</dialog>