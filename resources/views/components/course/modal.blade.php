<dialog id="modal-{{ $curso->id }}"
  class="backdrop:bg-black/60 max-w-2xl w-full max-h-[90vh] rounded-2xl overflow-hidden m-auto">
  <div class="bg-white rounded-2xl max-h-[90vh] overflow-y-auto">
    <div class="relative p-4 border-b border-gray-200">
      <form method="dialog">
        <x-ui.button class="absolute top-4 right-4" type="submit">
          <x-icon.close class="text-gray-600 size-8 p-2 bg-gray-200 rounded-full" />
        </x-ui.button>
      </form>

      <div class="flex items-center space-x-4">
        @if ($tipo === 'premium')
        <x-icon.star class="text-white size-12 p-2 rounded-xl bg-gradient-to-r from-purple-500 to-pink-500" />
        @else
        <x-icon.book class="text-white size-12 p-2 rounded-xl bg-green-500" />
        @endif
        <div>
          <h3 class="text-xl font-bold text-gray-900">{{ $curso->title }}</h3>
          <span
            class="px-3 py-1 rounded-full text-xs {{ $tipo === 'premium' ? 'bg-purple-100 text-purple-800' : 'bg-green-100 text-green-800' }}">
            {{ strtoupper($tipo) }}
          </span>
        </div>
      </div>
    </div>

    <div class="p-4 space-y-2">
      <img src="{{ $curso->imagen ?? asset('images/curso-bg-default.jpg') }}" alt="Imagen del curso"
        class="w-full h-48 object-cover rounded-xl">
      <div>
        <h4 class="text-lg font-semibold text-gray-900">Descripción del curso</h4>
        <p class="text-gray-600 leading-tight text-sm">
          {{ $curso->description ?? 'Este curso aún no tiene descripción.' }}
        </p>
      </div>
    </div>

    <div class="flex flex-col sm:flex-row gap-3 px-4 pb-4">
      <form method="dialog" class="flex-1">
        <button type="submit"
          class="w-full px-6 py-3 border border-gray-300 text-gray-700 font-medium rounded-xl hover:bg-gray-100 transition">
          Cerrar
        </button>
      </form>
      <x-ui.button variant="primary" class="px-6 py-3 flex-1 text-white"
        href="{{ route('cursos.show', ['codigo' => $curso->code]) }}">
        Ir al curso
      </x-ui.button>
    </div>
  </div>
</dialog>