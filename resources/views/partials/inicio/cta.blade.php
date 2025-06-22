<section class="py-16 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center space-y-4">
  <h2 class="text-2xl lg:text-3xl font-bold text-gray-900">
    ¿Listo para transformar tu futuro financiero?
  </h2>
  <p class="text-lg text-gray-600">
    Únete a miles de jóvenes que ya están construyendo un futuro próspero con Finance Class.
  </p>
  <div class="flex gap-4 mx-auto w-fit">
    <x-ui.button href="{{ route('cursos.index') }}" variant="primary" class="group px-6 py-3 text-white hover:scale-101 shadow-md">
      Comenzar mi viaje
      <x-icon.arrow-right class="w-5 h-5 ml-2 group-hover:translate-x-2 transition-transform" />
    </x-ui.button>
    <x-ui.button href="{{ route('simuladores') }}"
      class="outline-2 outline-gray-300 text-gray-700 hover:outline-blue-500 hover:text-blue-600 transition-all duration-300 px-6 py-3">
      Probar simulaciones
    </x-ui.button>
  </div>
</section>