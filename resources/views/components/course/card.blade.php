<div
  class="group bg-white border border-gray-200 rounded-2xl p-6 hover:shadow-xl {{ $borderClass }} transition-all duration-300 cursor-pointer transform hover:-translate-y-1 relative overflow-hidden"
  onclick="document.getElementById('modal-{{ $curso->id }}').showModal()">

  @if ($tipo === 'premium')
  <div
    class="absolute top-0 right-0 bg-gradient-to-r from-purple-500 to-pink-500 text-white px-3 py-1 rounded-bl-xl text-xs font-medium">
    PREMIUM
  </div>
  @elseif ($tipo === 'gratis')
  <span class="absolute top-0 right-0 px-3 py-1 bg-green-100 text-green-800 rounded-bl-xl text-xs font-medium">
    GRATIS
  </span>
  @endif

  <div class="flex items-center justify-between mb-4">
    <x-icon.book class="size-12 p-3 text-white bg-gradient-to-r {{ $gradientFrom }} {{ $gradientTo }} rounded-xl" />

    @if ($tipo === 'premium')
    <div class="flex items-center space-x-1">
      @for ($i = 0; $i
      < 5; $i++) <x-icon.star class="size-4 text-yellow-400" />
      @endfor
    </div>
    @endif
  </div>

  <h3 class="text-lg font-semibold text-gray-900 mb-2 {{ $textHoverClass }} transition-colors duration-200">
    {{ $curso->titulo }}
  </h3>

  <p class="text-gray-600 text-sm mb-4 line-clamp-2">
    {{ Str::limit($curso->descripcion, 80) }}
  </p>

  <x-icon.arrow-right
    class="w-5 h-5 text-gray-400 {{ $arrowHoverClass }} transition-all duration-200 group-hover:translate-x-1" />
</div>

<x-course.modal :curso="$curso" :tipo="$tipo" :color="$color" />