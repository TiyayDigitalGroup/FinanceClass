@props(['curso'])

<section class="lg:col-span-3">
  <header class="bg-white border border-gray-200 rounded-2xl p-4 shadow-sm" id="archivo-scroll">
    <div class="flex justify-between mb-2">
      <div>
        <h2 class="text-xl font-bold text-gray-900">
          <span
            x-text="$el.innerText = '{{ $curso->archivos[0]->titulo ?? 'Material' }}'; $watch('index', i => $el.innerText = '{{ $curso->archivos }}'[i]?.titulo ?? 'Material')">
          </span>
        </h2>
        <span class="flex items-center gap-1.5 text-sm text-gray-600">
          <x-icon.book class="size-4 inline-block" />
          <span x-text="'Documento ' + '{{ $curso->archivos[0]->tipo ?? '' }}'"></span>
        </span>
      </div>
      <span class="px-3 py-1 h-fit bg-blue-100 text-blue-800 rounded-full text-sm font-medium">
        <span x-text="`Material ${index + 1} de ${total}`"></span>
      </span>
    </div>
  </header>

  <template x-if="index < total">
    <div x-ref="viewer-iframe">
      @foreach ($curso->archivos as $i => $archivo)
      <div x-show="index === {{ $i }}">
        <x-course.viewer :archivo="$archivo" />
      </div>
      @endforeach
    </div>
  </template>

  <div class="mt-4 flex justify-between">
    <button class="px-4 cursor-pointer py-2 bg-gray-200 text-gray-800 disabled:cursor-no-drop rounded-lg" @click="index--"
      :disabled="index <= 0">
      ← Anterior
    </button>

    <template x-if="index + 1 < total">
      <button class="px-4 cursor-pointer py-2 bg-gradient-to-r from-blue-600 to-indigo-600 text-white rounded-lg"
        @click="index++">
        Siguiente →
      </button>
    </template>

    <template x-if="index + 1 === total">
      <x-ui.button href="{{ route('cursos.chat', ['codigo' => $curso->codigo]) }}" variant="ocean"
        class="group px-4 py-2 w-fit text-white hover:scale-101 shadow-md">
        Ir al chat del curso
        <x-icon.arrow-right class="size-4 ml-2 group-hover:translate-x-2 transition-transform" />
      </x-ui.button>
    </template>
  </div>
</section>