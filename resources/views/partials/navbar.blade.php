<header class="bg-white/90 backdrop-blur-lg fixed top-0 shadow z-50 w-full">
  <div class="flex max-md:flex-col justify-between items-center max-w-7xl mx-auto relative text-gray-700 text-[15px]">
    <div class="flex items-center gap-1.5 py-2.5">
      <x-application-logo />
      <span class="text-xl font-bold bg-gradient-to-r from-blue-600 to-indigo-600 bg-clip-text text-transparent">
        FinanceClass
      </span>
    </div>

    <input type="checkbox" class="peer hidden" id="navbar-open" />
    <label class="w-8 block md:hidden absolute top-2.5 right-2 peer-checked:-rotate-90 transition-transform"
      for="navbar-open">
      <span class="sr-only">botón de menú</span>
      <x-icon.menu class="p-1 text-blue-600 hover:text-indigo-600 transition-colors" />
    </label>

    <nav class="max-md:max-h-0 peer-checked:max-h-max overflow-hidden transition-[max-height] duration-300">
      <ul class="flex max-md:flex-col max-md:items-center gap-2 max-md:my-2">
        <x-ui.nav-link href="{{ route('inicio') }}">Inicio</x-ui.nav-link>
        <x-ui.nav-link href="{{ route('cursos.index') }}">Cursos</x-ui.nav-link>
        <x-ui.nav-link href="{{ route('simuladores') }}">Simuladores</x-ui.nav-link>
        <x-ui.nav-link href="{{ route('planes') }}">Planes</x-ui.nav-link>
        @auth
          @if(Auth::user()->role->nombre === 'admin')
            <x-ui.nav-link href="{{ route('dashboard') }}">Dashboard</x-ui.nav-link>
          @endif
        @endauth
      </ul>
    </nav>

    <div class="flex max-md:flex-col items-center md:gap-3 gap-2 max-md:max-h-0 peer-checked:max-h-max transition-[max-height] duration-300 max-md:w-full">
      @guest
        <x-ui.button href="{{ route('login') }}" class="hover:text-blue-600 font-medium hover:bg-blue-50/50 block px-3 py-2 rounded-lg">
          Iniciar Sesión
        </x-ui.button>
        <x-ui.button href="{{ route('register') }}" class="px-4 py-2 bg-gradient-to-r from-blue-600 to-indigo-600 text-white font-medium rounded-lg hover:from-blue-700 hover:to-indigo-700 max-md:mb-2">
          Registrarse
        </x-ui.button>
      @else
        <div class="flex items-center gap-3">
          <span class="text-sm text-gray-800 font-medium">Hola, {{ Auth::user()->name }}</span>
          <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="text-red-600 hover:text-red-700 text-sm font-medium hover:underline">
              Cerrar sesión
            </button>
          </form>
        </div>
      @endguest
    </div>
  </div>
</header>

{{-- <header class="bg-white/90 backdrop-blur-lg fixed top-0 shadow z-50 w-full">
  <div class="flex max-md:flex-col justify-between items-center max-w-7xl mx-auto relative text-gray-700 text-[15px]">
    <div class="flex items-center gap-1.5 py-2.5">
      <x-application-logo class="" />
      <span class="text-xl font-bold bg-gradient-to-r from-blue-600 to-indigo-600 bg-clip-text text-transparent">
        FinanceClass
      </span>
    </div>
    <input type="checkbox" class="peer hidden" id="navbar-open" />
    <label class="w-8 block md:hidden absolute top-2.5 right-2 peer-checked:-rotate-90 transition-transform"
      for="navbar-open">
      <span class="sr-only">boton de menú</span>
      <x-icon.menu class="p-1 text-blue-600 hover:text-indigo-600 transition-colors" />
    </label>
    <nav
      class="max-md:max-h-0 peer-checked:max-h-max overflow-hidden interpolate-keywords transition-[max-height] duration-300 ">
      <ul class="flex max-md:flex-col max-md:items-center gap-2 max-md:my-2">
        <x-ui.nav-link href="{{ route('inicio') }}">Inicio</x-ui.nav-link>
        <x-ui.nav-link href="{{ route('cursos.index') }}">Cursos</x-ui.nav-link>
        <x-ui.nav-link href="{{ route('simuladores') }}">Simuladores</x-ui.nav-link>
        <x-ui.nav-link href="{{ route('planes') }}">Planes</x-ui.nav-link>
      </ul>
    </nav>
    <div
      class="flex max-md:flex-col items-center md:gap-3 gap-2 max-md:max-h-0 peer-checked:max-h-max overflow-hidden interpolate-keywords transition-[max-height] duration-300 max-md:w-full">
      <x-ui.button href="{{ route('login') }}" class="hover:text-blue-600 font-medium hover:bg-blue-50/50 block px-3 py-2 rounded-lg  content-center">
        Iniciar Sesión
      </x-ui.button>
      <x-ui.button href="{{ route('register') }}" class="px-4 py-2 bg-gradient-to-r from-blue-600 to-indigo-600 text-white font-medium rounded-lg hover:from-blue-700 hover:to-indigo-700 max-md:mb-2">
        Registrarse
      </x-ui.button>
    </div>
  </div>
</header> --}}