<div class="min-h-screen flex items-center justify-center bg-gray-100 px-4 {{ $clasePersonalizada }}">
  <div class="max-w-2xl w-full">
    <div class="rounded-lg shadow-lg {{ $config['bg'] }} {{ $config['border'] }} border-2 p-8 text-center">

      @if ($mostrarIcono)
      <div class="mx-auto border flex items-center justify-center h-16 w-16 rounded-full {{ $config['bg'] }} {{ $config['border'] }} mb-6">
        <x-dynamic-component :component="$iconComponent" class="size-10 {{ $config['icono'] }}" />
      </div>
      @endif

      <h1 class="text-3xl font-bold {{ $config['titulo'] }} mb-4">
        {{ $titulo }}
      </h1>

      <p class="text-lg {{ $config['texto'] }} mb-6 leading-relaxed">
        {{ $mensaje }}
      </p>

      @if ($slot->isNotEmpty())
      <div class="mb-6">
        {{ $slot }}
      </div>
      @endif

      @if ($mostrarProgreso)
      <div class="mb-6">
        <div class="flex justify-between text-sm {{ $config['texto'] }} mb-2">
          <span>Progreso del desarrollo</span>
          <span>{{ $porcentajeProgreso }}%</span>
        </div>
        <div class="w-full bg-gray-200 rounded-full h-3">
          <div class="bg-gradient-to-r from-blue-500 to-purple-600 h-3 rounded-full transition-all duration-300"
            style="width: {{ $porcentajeProgreso }}%"></div>
        </div>
      </div>
      @endif

      <div class="flex flex-col sm:flex-row gap-4 justify-center">
        @if ($mostrarBotonVolver)
        <a href="{{ $urlVolver }}"
          class="inline-flex items-center px-6 py-3 {{ $config['boton'] }} font-medium rounded-lg transition-colors duration-200 hover:shadow-lg">
          <x-icon.arrow-right class="w-5 h-5 mr-2" />
          {{ $textoBotonVolver }}
        </a>
        @endif

        @isset($botones)
        {{ $botones }}
        @endisset
      </div>
    </div>

    <div class="mt-8 text-center">
      <p class="text-gray-600 text-sm">
        Última actualización: {{ now()->format('d/m/Y H:i') }}
      </p>
    </div>
  </div>
</div>