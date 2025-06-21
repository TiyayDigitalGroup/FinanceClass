@php
  $badgeBg = "bg-{$color}-100";
  $badgeText = "text-{$color}-800";
  $iconBg = "bg-{$color}-500";
@endphp

<div class="flex items-center justify-between mb-8">
  <div class="flex items-center">
    <x-dynamic-component :component="'icon.' . $icono" class="size-12 p-2 mr-4 text-white {{ $iconBg }} rounded-xl" />
    <div>
      <h2 class="text-3xl font-bold text-gray-900">{{ $titulo }}</h2>
      <p class="text-gray-600">{{ $descripcion }}</p>
    </div>
  </div>

  <div class="hidden sm:flex items-center space-x-2">
    <span class="px-3 py-1 {{ $badgeBg }} {{ $badgeText }} rounded-full text-sm font-medium">
      {{ $cantidad }} cursos disponibles
    </span>
  </div>
</div>