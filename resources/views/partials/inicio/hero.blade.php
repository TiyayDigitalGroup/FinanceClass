<section class="bg-gradient-to-br from-blue-50 via-indigo-50 to-purple-50 min-h-[40rem] content-center py-10">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 grid lg:grid-cols-2 gap-12 items-center mt-10">
    <div class="text-center lg:text-left">
      <div class="inline-flex items-center px-4 py-2 bg-blue-100 text-blue-800 rounded-full text-sm font-medium">
        <x-icon.storm class="size-4 mr-2" />
        Educación Financiera del Futuro
      </div>
      <h1 class="text-4xl lg:text-6xl font-bold text-gray-900 mb-4 leading-16">
        Bienvenido a
        <span class="bg-gradient-to-r from-blue-600 to-purple-600 bg-clip-text text-transparent">
          Finance Class
        </span>
      </h1>
      <p class="text-lg text-gray-600 leading-relaxed">
        Tu futuro empieza con una <strong class="text-blue-600">buena decisión</strong> hoy.
      </p>
      <p class="text-gray-500 mb-6">
        Descubre el poder de la educación financiera. Aprende a manejar tu dinero, planificar tu futuro y tomar
        decisiones inteligentes que transformarán tu vida.
      </p>
      <x-ui.button href="{{ route('cursos.index') }}" variant="primary" class="group mb-6 px-8 py-4">
        Comienza ahora
        <x-icon.arrow-right class="w-5 h-5 ml-2 group-hover:translate-x-2 transition-transform" />
      </x-ui.button>
      <div class="grid grid-cols-3 text-center max-w-lg mx-auto">
        <div>
          <span class="block text-2xl font-bold text-blue-600">1000+</span>
          <span class="block text-sm text-gray-500">Estudiantes</span>
        </div>
        <div>
          <span class="block text-2xl font-bold text-purple-600">50+</span>
          <span class="block text-sm text-gray-500">Lecciones</span>
        </div>
        <div>
          <span class="block text-2xl font-bold text-green-600">95%</span>
          <span class="block text-sm text-gray-500">Satisfacción</span>
        </div>
      </div>
    </div>
    <div class="relative mx-5">
      <img src="{{ asset('images/contabilidad-y-finanzas.jpg') }}" alt="Educación Financiera"
        class="w-full h-auto rounded-2xl shadow-xl" />
      <span class="absolute -top-4 -left-4 w-24 h-24 bg-blue-500 rounded-full opacity-20 animate-pulse"></span>
      <span class="absolute -bottom-4 -right-4 w-32 h-32 bg-purple-500 rounded-full opacity-20 animate-pulse"
        style="animation-delay: 1s;"></span>
      <div
        class="absolute top-8 -left-8 bg-white p-4 rounded-xl shadow-lg transform rotate-3 hover:rotate-0 transition-transform duration-300 flex items-center space-x-2">
        <span class="w-3 h-3 bg-green-500 rounded-full"></span>
        <span class="text-sm font-medium">Ahorro Inteligente</span>
      </div>
      <div
        class="flex items-center space-x-2 absolute bottom-8 -right-8 bg-white p-4 rounded-xl shadow-lg transform -rotate-3 hover:rotate-0 transition-transform duration-300">
        <span class="w-3 h-3 bg-blue-500 rounded-full"></span>
        <span class="text-sm font-medium">Inversión Segura</span>
      </div>
    </div>
  </div>
</section>