<section class="py-16 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
  <h2 class="text-2xl lg:text-3xl font-bold text-gray-900 mb-3 text-center">
    Diseñado para <span class="text-blue-600">Todos</span>
  </h2>
  <p class="text-gray-600 max-w-3xl mx-auto text-center mb-5">
    Nuestra plataforma se adapta a diferentes necesidades y edades, proporcionando herramientas específicas para
    cada usuario.
  </p>
  <div class="grid lg:grid-cols-2 gap-8 items-center">
    <div class="relative mx-3.5">
      <img src="{{ asset('images/img1.png') }}" alt="Educación Financiera para Jóvenes"
        class="w-full h-auto rounded-2xl shadow-lg" />
      <span class="absolute -top-3 -right-3 w-12 h-12 bg-yellow-400 rounded-full opacity-80 animate-pulse"></span>
      <span class="absolute -bottom-3 -left-3 w-8 h-8 bg-pink-400 rounded-full opacity-80 animate-pulse"></span>
    </div>
    <div class="space-y-8">
      <div class="bg-gradient-to-r from-blue-50 to-indigo-50 p-8 rounded-2xl border border-blue-100">
        <div class="flex items-center mb-4">
          <x-icon.users class="size-12 p-2.5 bg-blue-500 rounded-xl mr-4 text-white" />
          <h3 class="text-xl font-bold text-gray-900">Para los Jóvenes</h3>
        </div>
        <p class="text-gray-600 mb-6 leading-relaxed">
          ¡Descubre cómo manejar tu dinero y cumplir tus metas! Aprende a ahorrar, invertir y planificar tu futuro con
          nuestra plataforma interactiva diseñada especialmente para ti.
        </p>
        <div class="flex flex-wrap gap-2">
          <span class="px-3 py-1 bg-blue-100 text-blue-800 rounded-full text-sm font-medium">Ahorro</span>
          <span class="px-3 py-1 bg-blue-100 text-blue-800 rounded-full text-sm font-medium">Presupuesto</span>
          <span class="px-3 py-1 bg-blue-100 text-blue-800 rounded-full text-sm font-medium">Metas</span>
        </div>
      </div>
      <div class="bg-gradient-to-r from-purple-50 to-pink-50 p-8 rounded-2xl border border-purple-100">
        <div class="flex items-center mb-4">
          <x-icon.office class="size-12 p-2.5 bg-purple-500 rounded-xl mr-4 text-white" />
          <h3 class="text-xl font-bold text-gray-900">Para Padres y Colegios</h3>
        </div>
        <p class="text-gray-600 mb-4 leading-relaxed">
          Ayuda a tus hijos a adquirir hábitos financieros saludables desde temprana edad. Nuestra plataforma les
          enseña a tomar decisiones responsables sobre el dinero.
        </p>
        <div class="bg-purple-100 border-l-4 border-purple-500 p-4 rounded-r-lg">
          <p class="text-purple-800 font-semibold">
            "La educación financiera temprana es la mejor inversión que puedes hacer en el futuro de tus hijos."
          </p>
        </div>
      </div>
    </div>
  </div>
</section>