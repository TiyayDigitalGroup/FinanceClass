<aside id="sidebar"
  class="w-64 flex-col bg-white flex min-h-screen border-gray-200 fixed left-0 top-0 z-50 transform -translate-x-full lg:translate-x-0 transition-transform duration-300 ease-in-out shadow-lg">
  <div class="flex justify-between items-center px-5 h-18 border-b">
    <div class="flex items-center gap-2">
      <x-icon.grid class="bg-gradient-to-br from-blue-500 to-purple-600 rounded-xl text-white p-1.5 size-10" />
      <div>
        <h2 class="text-lg font-bold text-gray-900 -mb-1">Dashboard</h2>
        <p class="text-xs text-gray-500">Panel de control</p>
      </div>
    </div>
    <x-ui.button id="close-sidebar"
      class="lg:hidden text-gray-500 hover:text-red-400 rounded-lg transition-colors duration-200">
      <x-icon.close class="size-5" />
    </x-ui.button>
  </div>
  <nav class="overflow-y-auto flex-1 px-2.5 py-4 space-y-1.5 border-b">
    <x-ui.button href="{{ route('dashboard') }}"
      class="px-4 py-3 text-gray-700 rounded-xl hover:bg-blue-50 hover:text-blue-700 transition-all duration-200 gap-2 group w-full justify-normal">
      <x-icon.home class="size-8 p-2 transition-colors bg-gray-200 rounded-lg group-hover:bg-blue-100" />
      Inicio
    </x-ui.button>
    <x-ui.button href="{{ route('dashboard.usuarios') }}"
      class="px-4 py-3 text-gray-700 rounded-xl hover:bg-blue-50 hover:text-blue-700 transition-all duration-200 gap-2 group w-full justify-normal">
      <x-icon.users class="size-8 p-2 transition-colors bg-gray-200 rounded-lg group-hover:bg-blue-100" />
      Usuarios
    </x-ui.button>
    <x-ui.button href="{{ route('dashboard.cursos') }}"
      class="px-4 py-3 text-gray-700 rounded-xl hover:bg-blue-50 hover:text-blue-700 transition-all duration-200 gap-2 group w-full justify-normal">
      <x-icon.book class="size-8 p-2 transition-colors bg-gray-200 rounded-lg group-hover:bg-blue-100" />
      Cursos
    </x-ui.button>
  </nav>
  <div class="flex items-center gap-1.5 px-2.5 py-4">
    <div class="size-5 bg-gray-800 flex items-center justify-center p-5 rounded-full">
      <span class="text-white font-semibold text-sm uppercase">{{ substr(auth()->user()->name ?? 'Admin', 0, 2)
        }}</span>
    </div>
    <div class="leading-tight flex-1 min-w-0 text-sm">
      <span class="truncate block">{{ auth()->user()->name ?? 'Administrador' }}</span>
      <span class="truncate block">{{ auth()->user()->email ?? 'admin@example.com' }}</span>
    </div>
    <form method="POST" class="flex" action="{{ route('logout') }}">
      @csrf
      <x-ui.button type="submit">
        <x-icon.logout class="size-7 text-red-500 hover:text-red-700 transition-colors" />
      </x-ui.button>
    </form>
  </div>
</aside>