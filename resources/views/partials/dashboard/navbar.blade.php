<header class="bg-white sticky top-0 h-18 w-full border-b shadow-2xs flex items-center px-4 justify-between z-40">
  <x-ui.button id="menu-toggle"
    class="lg:hidden text-gray-700 hover:text-blue-400 rounded-lg transition-colors duration-200">
    <x-icon.menu class="size-7" />
  </x-ui.button>
  <x-ui.button href="{{ route('inicio') }}" class="flex items-center gap-1.5 py-2.5 max-lg:ml-3">
    <x-application-logo />
    <span class="text-xl font-bold bg-gradient-to-r from-blue-600 to-indigo-600 bg-clip-text text-transparent">
      FinanceClass
    </span>
  </x-ui.button>
  <div class="relative">
    <input type="text" placeholder="Buscar..."
      class="md:pl-10 pr-4 py-2 max-md:placeholder:w-0 border border-gray-200 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200 w-11 md:w-48 lg:w-64" />
    <x-icon.find class="size-5 text-gray-400 absolute left-3 -translate-y-1/2 top-1/2" />
  </div>
</header>