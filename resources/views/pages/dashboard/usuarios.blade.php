@extends('layouts.dashboard')

@section('title', 'Usuarios')
@section('description', 'Gestión de usuarios')

@section('content')
<div class="space-y-8">
  <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between space-y-4 lg:space-y-0">
    <div>
      <h1 class="text-3xl font-bold text-gray-900">Gestión de Usuarios</h1>
      <p class="text-gray-600 mt-2">Administra y gestiona todos los usuarios del sistema</p>
    </div>

    <div class="flex items-center space-x-6 text-sm">
      <div class="text-center">
        <div class="text-2xl font-bold text-blue-600">{{ $usuarios->count() }}</div>
        <div class="text-gray-500">Total</div>
      </div>
      <div class="text-center">
        <div class="text-2xl font-bold text-purple-600">{{ $usuarios->where('role.nombre', 'admin')->count() }}</div>
        <div class="text-gray-500">Admins</div>
      </div>
      <div class="text-center">
        <div class="text-2xl font-bold text-green-600">{{ $usuarios->where('role.nombre', 'estudiante')->count() }}
        </div>
        <div class="text-gray-500">Estudiantes</div>
      </div>
    </div>
  </div>

  @if(session('success'))
  <div
    class="p-4 bg-gradient-to-r from-green-50 to-emerald-50 border border-green-200 rounded-2xl relative overflow-hidden animate-fade-in">
    <div class="absolute inset-0 bg-gradient-to-r from-green-500/5 to-emerald-500/5"></div>
    <div class="relative flex items-center space-x-3">
      <div class="w-8 h-8 bg-green-100 rounded-full flex items-center justify-center flex-shrink-0">
        <svg class="w-4 h-4 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
        </svg>
      </div>
      <p class="text-green-700 font-medium">{{ session('success') }}</p>
      <button onclick="this.parentElement.parentElement.remove()" class="ml-auto text-green-400 hover:text-green-600">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
        </svg>
      </button>
    </div>
  </div>
  @endif

  <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">

    <div
      class="bg-white rounded-2xl shadow-lg border border-gray-100 p-6 hover:shadow-xl transition-all duration-300 group">
      <div class="flex items-center justify-between">
        <div>
          <p class="text-gray-500 text-sm font-medium">Total Usuarios</p>
          <p class="text-3xl font-bold text-gray-900 mt-2">{{ $usuarios->count() }}</p>
          <div class="flex items-center mt-2">
            <div class="w-2 h-2 bg-green-500 rounded-full mr-2"></div>
            <span class="text-green-600 text-sm font-medium">Activos</span>
          </div>
        </div>
        <div
          class="w-12 h-12 bg-blue-100 rounded-xl flex items-center justify-center group-hover:scale-110 transition-transform duration-200">
          <x-icon.users class="size-10 p-2 text-blue-600" />
        </div>
      </div>
    </div>

    <div
      class="bg-white rounded-2xl shadow-lg border border-gray-100 p-6 hover:shadow-xl transition-all duration-300 group">
      <div class="flex items-center justify-between">
        <div>
          <p class="text-gray-500 text-sm font-medium">Administradores</p>
          <p class="text-3xl font-bold text-gray-900 mt-2">{{ $usuarios->where('role.nombre', 'admin')->count() }}</p>
          <div class="flex items-center mt-2">
            <svg class="w-4 h-4 text-purple-500 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
            </svg>
            <span class="text-purple-600 text-sm font-medium">Con permisos</span>
          </div>
        </div>
        <div
          class="w-12 h-12 bg-purple-100 rounded-xl flex items-center justify-center group-hover:scale-110 transition-transform duration-200">
          <svg class="w-6 h-6 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
              d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
          </svg>
        </div>
      </div>
    </div>

    <div
      class="bg-white rounded-2xl shadow-lg border border-gray-100 p-6 hover:shadow-xl transition-all duration-300 group">
      <div class="flex items-center justify-between">
        <div>
          <p class="text-gray-500 text-sm font-medium">Estudiantes</p>
          <p class="text-3xl font-bold text-gray-900 mt-2">{{ $usuarios->where('role.nombre', 'estudiante')->count() }}
          </p>
          <div class="flex items-center mt-2">
            <svg class="w-4 h-4 text-green-500 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
            </svg>
            <span class="text-green-600 text-sm font-medium">Aprendiendo</span>
          </div>
        </div>
        <div
          class="w-12 h-12 bg-green-100 rounded-xl flex items-center justify-center group-hover:scale-110 transition-transform duration-200">
          <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
              d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
          </svg>
        </div>
      </div>
    </div>
  </div>

  <div class="bg-white rounded-2xl shadow-lg border border-gray-100 p-6">
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between space-y-4 sm:space-y-0">
      <div class="flex items-center space-x-4">
        <button onclick="openModal()"
          class="inline-flex items-center px-6 py-3 bg-gradient-to-r from-blue-500 to-purple-600 hover:from-blue-600 hover:to-purple-700 text-white font-semibold rounded-xl shadow-lg hover:shadow-xl transform hover:-translate-y-0.5 transition-all duration-300 group">
          <svg class="w-5 h-5 mr-2 group-hover:rotate-90 transition-transform duration-300" fill="none"
            stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
          </svg>
          Nuevo Usuario
        </button>
      </div>

      <div class="flex flex-col sm:flex-row items-stretch sm:items-center space-y-3 sm:space-y-0 sm:space-x-3">
        <div class="relative">
          <input type="text" id="searchUsers" placeholder="Buscar usuarios..."
            class="pl-10 pr-4 py-2 border border-gray-200 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200 w-full sm:w-64">
          <svg class="w-4 h-4 text-gray-400 absolute left-3 top-3" fill="none" stroke="currentColor"
            viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
              d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
          </svg>
        </div>

        <select id="roleFilter"
          class="border border-gray-200 rounded-lg px-3 py-2 focus:ring-2 focus:ring-blue-500 focus:border-transparent text-sm">
          <option value="">Todos los roles</option>
          @foreach($roles as $role)
          <option value="{{ $role->nombre }}">{{ ucfirst($role->nombre) }}</option>
          @endforeach
        </select>
      </div>
    </div>
  </div>

  <div class="bg-white rounded-2xl shadow-lg border border-gray-100 overflow-hidden">
    <div class="px-6 py-4 border-b border-gray-200">
      <h3 class="text-lg font-semibold text-gray-900">Lista de Usuarios</h3>
      <p class="text-sm text-gray-500 mt-1">Gestiona y administra todos los usuarios del sistema</p>
    </div>

    <div class="overflow-x-auto">
      <table class="w-full">
        <thead class="bg-gray-50">
          <tr>
            <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
              <div class="flex items-center space-x-1">
                <span>Usuario</span>
                <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M7 16V4m0 0L3 8m4-4l4 4m6 0v12m0 0l4-4m-4 4l-4-4" />
                </svg>
              </div>
            </th>
            <th
              class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider hidden md:table-cell">
              Correo Electrónico
            </th>
            <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
              Rol
            </th>
            <th
              class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider hidden lg:table-cell">
              Fecha de Registro
            </th>
            <th class="px-6 py-4 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">
              Acciones
            </th>
          </tr>
        </thead>
        <tbody id="usersTableBody" class="bg-white divide-y divide-gray-200">
          @foreach($usuarios as $index => $user)
          <tr class="user-row hover:bg-gray-50 transition-colors duration-200" data-name="{{ strtolower($user->name) }}"
            data-email="{{ strtolower($user->email) }}" data-role="{{ $user->role->nombre }}">
            <td class="px-6 py-4 whitespace-nowrap overflow-hidden">
              <div class="flex items-center">
                <div
                  class="w-10 h-10 bg-gradient-to-br from-blue-400 to-purple-500 rounded-full flex items-center justify-center">
                  <span class="text-white font-semibold text-sm">{{ substr($user->name, 0, 2) }}</span>
                </div>
                <div class="ml-2">
                  <div class="text-sm font-medium text-gray-900">{{ $user->name }}</div>
                  <div class="text-sm text-gray-500 md:hidden truncate">{{ $user->email }}</div>
                </div>
              </div>
            </td>
            <td class="px-6 py-4 whitespace-nowrap hidden md:table-cell">
              <div class="text-sm text-gray-900">{{ $user->email }}</div>
            </td>
            <td class="px-6 py-4 whitespace-nowrap">
              <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium
                  {{ $user->role->nombre === 'admin' ? 'bg-purple-100 text-purple-800' : 
                     ($user->role->nombre === 'profesor' ? 'bg-blue-100 text-blue-800' : 
                      'bg-green-100 text-green-800') }}">
                {{ ucfirst($user->role->nombre) }}
              </span>
            </td>
            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 hidden lg:table-cell">
              {{ $user->created_at->format('d/m/Y') }}
            </td>
            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
              <div class="flex items-center justify-end space-x-2">
                <button onclick="confirmDelete({{ $user->id }}, '{{ $user->name }}')"
                  class="text-red-600 hover:text-red-800 p-2 hover:bg-red-50 rounded-lg transition-colors duration-200"
                  title="Eliminar usuario">
                  <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                  </svg>
                </button>
              </div>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>

    <div id="emptyState" class="hidden text-center py-12">
      <svg class="w-16 h-16 text-gray-300 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
          d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197m13.5-9a2.5 2.5 0 11-5 0 2.5 2.5 0 015 0z" />
      </svg>
      <h3 class="text-lg font-medium text-gray-900 mb-2">No se encontraron usuarios</h3>
      <p class="text-gray-500">Intenta ajustar los filtros de búsqueda</p>
    </div>
  </div>
</div>

<div id="userModal" class="fixed inset-0 bg-black/60 backdrop-blur-sm z-50 hidden items-center justify-center p-4">
  <div class="bg-white rounded-3xl shadow-2xl max-w-md w-full max-h-[90vh] overflow-y-auto animate-scale-in">

    <div class="bg-gradient-to-r from-blue-500 to-purple-600 px-8 py-6">
      <div class="flex items-center justify-between">
        <div class="flex items-center space-x-3">
          <div class="w-10 h-10 bg-white/20 rounded-xl flex items-center justify-center">
            <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
            </svg>
          </div>
          <div>
            <h2 id="modalTitle" class="text-2xl font-bold text-white">Crear nuevo usuario</h2>
            <p class="text-blue-100 text-sm">Completa la información del usuario</p>
          </div>
        </div>
        <button onclick="closeModal()"
          class="w-8 h-8 bg-white/20 hover:bg-white/30 rounded-lg flex items-center justify-center text-white transition-colors">
          <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
          </svg>
        </button>
      </div>
    </div>

    <div class="p-4">
      <form id="userForm" method="POST" action="{{ route('dashboard.usuarios.store') }}" class="space-y-4">
        @csrf
        <input type="hidden" id="userId" name="user_id">
        <input type="hidden" id="formMethod" name="_method" value="POST">

        <div class="space-y-2">
          <label for="name" class="block text-sm font-semibold text-gray-700">
            Nombre completo *
          </label>
          <div class="relative group">
            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
              <svg class="w-5 h-5 text-gray-400 group-focus-within:text-blue-500 transition-colors duration-200"
                fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
              </svg>
            </div>
            <input type="text" id="name" name="name" required
              class="w-full pl-12 pr-4 py-3 bg-gray-50/50 border border-gray-200 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200 placeholder-gray-400 hover:bg-gray-50 focus:bg-white"
              placeholder="Juan Pérez">
          </div>
        </div>

        <div class="space-y-2">
          <label for="email" class="block text-sm font-semibold text-gray-700">
            Correo electrónico *
          </label>
          <div class="relative group">
            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
              <svg class="w-5 h-5 text-gray-400 group-focus-within:text-blue-500 transition-colors duration-200"
                fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207" />
              </svg>
            </div>
            <input type="email" id="email" name="email" required
              class="w-full pl-12 pr-4 py-3 bg-gray-50/50 border border-gray-200 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200 placeholder-gray-400 hover:bg-gray-50 focus:bg-white"
              placeholder="juan@email.com">
          </div>
        </div>

        <div class="space-y-2" id="passwordField">
          <label for="password" class="block text-sm font-semibold text-gray-700">
            Contraseña *
          </label>
          <div class="relative group">
            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
              <svg class="w-5 h-5 text-gray-400 group-focus-within:text-blue-500 transition-colors duration-200"
                fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
              </svg>
            </div>
            <input type="password" id="password" name="password"
              class="w-full pl-12 pr-4 py-3 bg-gray-50/50 border border-gray-200 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200 placeholder-gray-400 hover:bg-gray-50 focus:bg-white"
              placeholder="••••••••">
          </div>
        </div>

        <div class="space-y-2" id="passwordConfirmField">
          <label for="password_confirmation" class="block text-sm font-semibold text-gray-700">
            Confirmar contraseña *
          </label>
          <div class="relative group">
            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
              <svg class="w-5 h-5 text-gray-400 group-focus-within:text-blue-500 transition-colors duration-200"
                fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
              </svg>
            </div>
            <input type="password" id="password_confirmation" name="password_confirmation"
              class="w-full pl-12 pr-4 py-3 bg-gray-50/50 border border-gray-200 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200 placeholder-gray-400 hover:bg-gray-50 focus:bg-white"
              placeholder="••••••••">
          </div>
        </div>

        <div class="space-y-2">
          <label for="role_id" class="block text-sm font-semibold text-gray-700">
            Rol del usuario *
          </label>
          <div class="relative group">
            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
              <svg class="w-5 h-5 text-gray-400 group-focus-within:text-blue-500 transition-colors duration-200"
                fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
              </svg>
            </div>
            <select name="role_id" id="role_id" required
              class="w-full pl-12 pr-4 py-3 bg-gray-50/50 border border-gray-200 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200 appearance-none">
              <option value="">Seleccionar rol</option>
              @foreach($roles as $role)
              <option value="{{ $role->id }}">{{ ucfirst($role->nombre) }}</option>
              @endforeach
            </select>
          </div>
        </div>

        <div class="flex justify-end space-x-4 pt-6 border-t border-gray-100">
          <button type="button" onclick="closeModal()"
            class="px-6 py-3 text-gray-600 bg-gray-100 hover:bg-gray-200 rounded-xl font-medium transition-colors">
            Cancelar
          </button>
          <button type="submit" id="submitBtn"
            class="px-8 py-3 bg-gradient-to-r from-blue-500 to-purple-600 hover:from-blue-600 hover:to-purple-700 text-white font-semibold rounded-xl transition-all duration-200 transform hover:scale-101">
            <span id="submitText">Crear Usuario</span>
          </button>
        </div>
      </form>
    </div>
  </div>
</div>

<div id="deleteModal" class="fixed inset-0 bg-black/50 backdrop-blur-sm z-50 hidden items-center justify-center">
  <div class="bg-white rounded-2xl shadow-2xl max-w-md w-full mx-4 animate-scale-in">
    <div class="p-6">
      <div class="flex items-center justify-center w-12 h-12 mx-auto bg-red-100 rounded-full mb-4">
        <svg class="w-6 h-6 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
            d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
        </svg>
      </div>
      <h3 class="text-lg font-semibold text-gray-900 text-center mb-2">¿Eliminar usuario?</h3>
      <p class="text-gray-500 text-center mb-6" id="deleteUserName">Esta acción no se puede deshacer.</p>

      <div class="flex space-x-3">
        <button onclick="closeDeleteModal()"
          class="flex-1 px-4 py-2 text-gray-700 bg-gray-100 hover:bg-gray-200 rounded-xl transition-colors">
          Cancelar
        </button>
        <form id="deleteForm" method="POST" class="flex-1">
          @csrf
          @method('DELETE')
          <button type="submit"
            class="w-full px-4 py-2 bg-red-600 hover:bg-red-700 text-white rounded-xl transition-colors">
            Eliminar
          </button>
        </form>
      </div>
    </div>
  </div>
</div>

<style>
  @keyframes fade-in {
    from {
      opacity: 0;
      transform: translateY(-10px);
    }

    to {
      opacity: 1;
      transform: translateY(0);
    }
  }

  @keyframes scale-in {
    from {
      opacity: 0;
      transform: scale(0.95);
    }

    to {
      opacity: 1;
      transform: scale(1);
    }
  }

  .animate-fade-in {
    animation: fade-in 0.3s ease-out forwards;
  }

  .animate-scale-in {
    animation: scale-in 0.3s ease-out forwards;
  }
</style>

<script>
  // Variables globales
let isEditMode = false;
let currentUserId = null;

// Modal functionality
function openModal() {
  const modal = document.getElementById('userModal');
  const modalTitle = document.getElementById('modalTitle');
  const submitText = document.getElementById('submitText');
  const form = document.getElementById('userForm');
  const passwordField = document.getElementById('passwordField');
  const passwordConfirmField = document.getElementById('passwordConfirmField');
  
  isEditMode = false;
  modalTitle.textContent = 'Crear nuevo usuario';
  submitText.textContent = 'Crear Usuario';
  form.action = '{{ route("dashboard.usuarios.store") }}';
  document.getElementById('formMethod').value = 'POST';
  
  // Mostrar campos de contraseña para crear
  passwordField.style.display = 'block';
  passwordConfirmField.style.display = 'block';
  document.getElementById('password').required = true;
  document.getElementById('password_confirmation').required = true;
  
  // Limpiar formulario
  form.reset();
  document.getElementById('userId').value = '';
  
  modal.classList.remove('hidden');
  modal.classList.add('flex');
  document.body.style.overflow = 'hidden';
}

function closeModal() {
  const modal = document.getElementById('userModal');
  modal.classList.add('hidden');
  modal.classList.remove('flex');
  document.body.style.overflow = 'auto';
  
  // Reset form
  document.getElementById('userForm').reset();
  isEditMode = false;
  currentUserId = null;
}

function editUser(userId, name, email, roleId) {
  const modal = document.getElementById('userModal');
  const modalTitle = document.getElementById('modalTitle');
  const submitText = document.getElementById('submitText');
  const form = document.getElementById('userForm');
  const passwordField = document.getElementById('passwordField');
  const passwordConfirmField = document.getElementById('passwordConfirmField');
  
  isEditMode = true;
  currentUserId = userId;
  modalTitle.textContent = 'Editar usuario';
  submitText.textContent = 'Actualizar Usuario';
  form.action = `/dashboard/usuarios/${userId}`;
  document.getElementById('formMethod').value = 'PUT';
  
  // Ocultar campos de contraseña para editar
  passwordField.style.display = 'none';
  passwordConfirmField.style.display = 'none';
  document.getElementById('password').required = false;
  document.getElementById('password_confirmation').required = false;
  
  // Llenar formulario con datos existentes
  document.getElementById('userId').value = userId;
  document.getElementById('name').value = name;
  document.getElementById('email').value = email;
  document.getElementById('role_id').value = roleId;
  
  modal.classList.remove('hidden');
  modal.classList.add('flex');
  document.body.style.overflow = 'hidden';
}

function confirmDelete(userId, userName) {
  const modal = document.getElementById('deleteModal');
  const userNameElement = document.getElementById('deleteUserName');
  const form = document.getElementById('deleteForm');
  
  userNameElement.textContent = `¿Estás seguro de que quieres eliminar a "${userName}"? Esta acción no se puede deshacer.`;
  form.action = `/dashboard/usuarios/${userId}`;
  
  modal.classList.remove('hidden');
  modal.classList.add('flex');
}

function closeDeleteModal() {
  const modal = document.getElementById('deleteModal');
  modal.classList.add('hidden');
  modal.classList.remove('flex');
}

// Search and filter functionality
function filterUsers() {
  const searchTerm = document.getElementById('searchUsers').value.toLowerCase();
  const roleFilter = document.getElementById('roleFilter').value.toLowerCase();
  const statusFilter = document.getElementById('statusFilter').value.toLowerCase();
  const rows = document.querySelectorAll('.user-row');
  const emptyState = document.getElementById('emptyState');
  let visibleRows = 0;
  
  rows.forEach(row => {
    const name = row.dataset.name;
    const email = row.dataset.email;
    const role = row.dataset.role;
    
    const matchesSearch = name.includes(searchTerm) || email.includes(searchTerm);
    const matchesRole = !roleFilter || role === roleFilter;
    const matchesStatus = !statusFilter; // Por ahora todos son activos
    
    if (matchesSearch && matchesRole && matchesStatus) {
      row.style.display = '';
      visibleRows++;
    } else {
      row.style.display = 'none';
    }
  });
  
  // Mostrar/ocultar estado vacío
  if (visibleRows === 0) {
    emptyState.classList.remove('hidden');
  } else {
    emptyState.classList.add('hidden');
  }
}

// Event listeners para búsqueda y filtros
document.getElementById('searchUsers').addEventListener('input', filterUsers);
document.getElementById('roleFilter').addEventListener('change', filterUsers);
document.getElementById('statusFilter').addEventListener('change', filterUsers);

// Cerrar modales con Escape
document.addEventListener('keydown', function(e) {
  if (e.key === 'Escape') {
    closeModal();
    closeDeleteModal();
  }
});
</script>
@endsection