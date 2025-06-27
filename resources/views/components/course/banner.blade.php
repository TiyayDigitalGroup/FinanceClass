@props(['curso'])

<header class="bg-gradient-to-r from-blue-50 to-indigo-50 pt-20 pb-8 px-4 sm:px-6 lg:px-8 text-center space-y-4">
  <div class="inline-flex items-center px-4 py-2 {{ $curso->premium ? 'bg-purple-100 text-purple-800' : 'bg-green-100 text-green-800' }} rounded-full text-sm font-medium">
    @if ($curso->premium)
      <x-icon.star class="size-8 mr-2" />
    @else
      <x-icon.study class="size-8 mr-2" />
    @endif
    {{ $curso->premium ? 'CURSO PREMIUM' : 'CURSO GRATUITO' }}
  </div>

  <h1 class="text-2xl lg:text-3xl font-bold text-gray-900">
    {{ $curso->title }}
  </h1>

  <p class="text-gray-600 max-w-3xl mx-auto leading-snug">
    {{ $curso->description }}
  </p>

  <div class="grid grid-cols-2 gap-8 max-w-md mx-auto text-center">
    <div>
      <span class="block text-2xl font-bold text-blue-600" x-text="total"></span>
      <span class="text-sm text-gray-500">Materiales</span>
    </div>
    <div>
      <span class="block text-2xl font-bold text-green-600" x-text="`${Math.round(((index + 1) / total) * 100)}%`"></span>
      <span class="text-sm text-gray-500">Progreso</span>
    </div>
  </div>
</header>
