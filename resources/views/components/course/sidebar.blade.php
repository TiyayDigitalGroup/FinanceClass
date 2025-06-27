@props(['archivos'])

<section class="bg-gray-100 rounded-2xl p-4 sticky top-16 h-fit"
  x-init="$watch('index', i => document.getElementById('archivo-scroll')?.scrollIntoView({ behavior: 'smooth' }))">
  <h3 class="text-lg font-semibold text-gray-900 mb-4 flex items-center">
    <x-icon.note class="size-6 mr-1 text-blue-600" />
    Índice del Curso
  </h3>

  <div class="space-y-2">
    @foreach ($archivos as $i => $archivo)
    <button class="w-full flex justify-between items-center px-3 py-2 rounded-lg cursor-pointer gap-1.5 text-left"
      :class="index === {{ $i }} ? 'bg-blue-100 text-blue-800 border-l-4 border-blue-500' : 'hover:bg-gray-200 text-gray-700'"
      @click="index = {{ $i }}">
      <div class="flex items-center gap-2">
        <span class="w-6 h-6 flex items-center justify-center bg-blue-500 text-white rounded-full text-xs font-medium">
          {{ $i + 1 }}
        </span>
        <span class="text-sm font-medium">{{ $archivo->title }}</span>
      </div>
      <x-icon.arrow-right class="w-4 h-4 text-gray-400" />
    </button>
    @endforeach
  </div>
</section>
