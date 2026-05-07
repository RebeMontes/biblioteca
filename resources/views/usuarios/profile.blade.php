@extends('layout.admin')

@section('content')

<div class="p-6">

    <h1 class="text-2xl font-bold mb-4">Editar Usuario</h1>
    @if (session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
            <span class="font-bold">Éxito:</span> {{ session('success') }}
        </div>
    @endif

    @if (session('error'))
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
            <span class="font-bold">Error:</span> {{ session('error') }}
        </div>
    @endif

        <form action="{{ route('usuarios.update_profile') }}" method="POST" class="bg-white shadow rounded-lg p-4">
            @csrf
            @method('PUT')
            <div class="mb-4">
                <label for="name" class="block text-gray-700 font-bold mb-2">Nombre del usuario:</label>
                <input type="text" name="name" id="name" value="{{ old('name', $user->name) }}" class="w-full border rounded px-3 py-2" required>
                @error('name')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>
            <div class = flex items-center justify-between gap-4>
                <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded">Guardar Usuario</button>
                <a href="{{ route('home') }}" class="bg-gray-500 text-white px-4 py-2 rounded ml-2">Cancelar</a>
            </div>
        </form>

        <form action="{{ route('usuarios.update_password') }}" method="POST" class="bg-white shadow rounded-lg p-4">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label for="current_password" class="block text-gray-700 font-bold mb-2">Contraseña Actual:</label>
                <input type="password" name="current_password" id="current_password" class="w-full border rounded px-3 py-2" required>
                @error('current_password')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="new_password" class="block text-gray-700 font-bold mb-2">Nueva Contraseña:</label>
                <input type="password" name="new_password" id="new_password" class="w-full border rounded px-3 py-2" required>
                @error('new_password')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="new_password_confirmation" class="block text-gray-700 font-bold mb-2">Confirmar Nueva Contraseña:</label>
                <input type="password" name="new_password_confirmation" id="new_password_confirmation" class="w-full border rounded px-3 py-2" required>
                @error('new_password_confirmation')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class = flex items-center justify-between gap-4>
                <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded">Guardar Contraseña</button>
                <a href="{{ route('home') }}" class="bg-gray-500 text-white px-4 py-2 rounded ml-2">Cancelar</a>
            </div>
        </form>
</div>
        
@endsection