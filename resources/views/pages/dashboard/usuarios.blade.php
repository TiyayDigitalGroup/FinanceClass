@extends('layouts.app')

@section('title', 'Usuarios')
@section('description', 'Gestión de usuarios')

@section('content')
<section class="max-w-5xl mx-auto mt-20 px-4 space-y-8">

  <h1 class="text-2xl font-bold">Gestión de Usuarios</h1>

  @if(session('success'))
    <div class="bg-green-100 border border-green-400 text-green-700 p-3 rounded">
      {{ session('success') }}
    </div>
  @endif

  <button onclick="document.getElementById('modal').classList.remove('hidden')" class="btn btn-primary">Nuevo Usuario</button>

  <table class="w-full mt-4 table-auto border">
    <thead>
      <tr class="bg-gray-100">
        <th class="px-3 py-2 border">Nombre</th>
        <th class="px-3 py-2 border">Correo</th>
        <th class="px-3 py-2 border">Rol</th>
        <th class="px-3 py-2 border">Acciones</th>
      </tr>
    </thead>
    <tbody>
      @foreach($usuarios as $user)
      <tr>
        <td class="px-3 py-2 border">{{ $user->name }}</td>
        <td class="px-3 py-2 border">{{ $user->email }}</td>
        <td class="px-3 py-2 border">{{ $user->role->nombre }}</td>
        <td class="px-3 py-2 border text-center">
          <form method="POST" action="{{ route('dashboard.usuarios.destroy', $user) }}" onsubmit="return confirm('¿Eliminar este usuario?')">
            @csrf
            @method('DELETE')
            <button type="submit" class="text-red-600 hover:underline">Eliminar</button>
          </form>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>

  <!-- Modal -->
  <div id="modal" class="fixed inset-0 bg-black/50 items-center justify-center hidden z-50">
    <div class="bg-white rounded-xl p-6 w-full max-w-md relative">
      <button class="absolute top-2 right-2 text-gray-500" onclick="document.getElementById('modal').classList.add('hidden')">✖</button>
      <h2 class="text-xl font-semibold mb-4">Crear nuevo usuario</h2>
      <form method="POST" action="{{ route('dashboard.usuarios.store') }}" class="space-y-4">
        @csrf
        <input type="text" name="name" placeholder="Nombre" class="input w-full" required>
        <input type="email" name="email" placeholder="Correo electrónico" class="input w-full" required>
        <input type="password" name="password" placeholder="Contraseña" class="input w-full" required>
        <input type="password" name="password_confirmation" placeholder="Confirmar contraseña" class="input w-full" required>
        <select name="role_id" class="input w-full" required>
          <option value="">Seleccionar Rol</option>
          @foreach($roles as $role)
            <option value="{{ $role->id }}">{{ ucfirst($role->nombre) }}</option>
          @endforeach
        </select>
        <button class="btn btn-primary w-full" type="submit">Crear</button>
      </form>
    </div>
  </div>

</section>
@endsection
