<header class="bg-white/90 backdrop-blur-lg fixed top-0 shadow z-50 w-full">
  <div
    class="flex max-md:flex-col justify-between items-center max-w-7xl mx-auto relative text-gray-700 text-[15px] overflow-hidden interpolate-keywords px-2">
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

    <nav class="max-md:max-h-0 peer-checked:max-h-max transition-[max-height] duration-300">
      <ul class="flex max-md:flex-col max-md:items-center lg:gap-2 gap-1 max-md:my-2">
        <x-ui.nav-link href="{{ route('inicio') }}">Inicio</x-ui.nav-link>
        <x-ui.nav-link href="{{ route('cursos.index') }}">Cursos</x-ui.nav-link>
        <x-ui.nav-link href="{{ route('simuladores') }}">Simuladores</x-ui.nav-link>
        <x-ui.nav-link href="{{ route('planes') }}">Planes</x-ui.nav-link>
        @auth
          @if (Auth::user()->role->nombre === 'admin')
            <x-ui.nav-link href="{{ route('dashboard') }}">Dashboard</x-ui.nav-link>
          @endif
        @endauth
      </ul>
    </nav>

    <div
      class="flex max-md:flex-col items-center gap-1 max-md:max-h-0 peer-checked:max-h-max transition-[max-height] duration-300 max-md:w-full">
      @guest
        <x-ui.button href="{{ route('login') }}"
          class="hover:text-blue-600 font-medium hover:bg-blue-50/50 block p-2 rounded-lg">
          Iniciar Sesión
        </x-ui.button>
        <x-ui.button href="{{ route('register') }}" variant="teal" class="px-4 py-2 max-md:mb-2 text-white hover:scale-101 shadow-md">
          Registrarse
        </x-ui.button>
      @else
        <div class="flex items-center gap-3 max-md:mb-4">
          <div class="bg-gradient-to-r from-blue-600 to-indigo-600 flex items-center justify-center p-2 rounded-full">
            <span class="text-white text-sm uppercase">
              {{ substr(auth()->user()->name ?? 'Admin', 0, 2) }}
            </span>
          </div>
          <form method="POST" action="{{ route('logout') }}">
            @csrf
            <x-ui.button type="submit">
              <x-icon.logout class="size-8 text-red-500 rounded-md hover:text-red-700 bg-red-50 p-1 transition-colors" />
            </x-ui.button>
          </form>
        </div>
      @endguest
    </div>
  </div>
</header>
