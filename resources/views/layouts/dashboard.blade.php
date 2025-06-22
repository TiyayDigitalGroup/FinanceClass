<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>{{ config('app.name') }} - @yield('title', 'Inicio') </title>
  <meta name="description" content="@yield('meta_description', 'FinanceClass, tu solución financiera.')">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <link rel="icon" href="{{ asset('favicon.ico') }}">
  @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
  <div class="min-h-screen bg-gradient-to-br from-blue-50 via-gray-100 to-blue-50 flex">
    @include('partials.dashboard.sidebar')
    <main class="flex-1 lg:ml-64 transition-all duration-300">
      @include('partials.dashboard.navbar')
      <div class="p-4 lg:p-6">
        @yield('content')
      </div>
    </main>
  </div>
</body>

</html>

<script>
  const sidebar = document.getElementById('sidebar');
  const menuToggle = document.getElementById('menu-toggle');
  const closeSidebar = document.getElementById('close-sidebar');

  function openSidebar() {
    sidebar.classList.remove('-translate-x-full');
    document.body.style.overflow = 'hidden';
  }

  function closeSidebarFunc() {
    sidebar.classList.add('-translate-x-full');
    document.body.style.overflow = 'auto';
  }

  menuToggle.addEventListener('click', openSidebar);
  closeSidebar.addEventListener('click', closeSidebarFunc);

  document.addEventListener('keydown', function(e) {
    if (e.key === 'Escape' && !sidebar.classList.contains('-translate-x-full')) {
      closeSidebarFunc();
    }
  });

  const sidebarLinks = sidebar.querySelectorAll('a');
  sidebarLinks.forEach(link => {
    link.addEventListener('click', function() {
      if (window.innerWidth < 1024) {
        closeSidebarFunc();
      }
    });
  });

  window.addEventListener('resize', function() {
    if (window.innerWidth >= 1024) {
      sidebar.classList.remove('-translate-x-full');
      document.body.style.overflow = 'auto';
    } else {
      sidebar.classList.add('-translate-x-full');
      document.body.style.overflow = 'auto';
    }
  });
</script>