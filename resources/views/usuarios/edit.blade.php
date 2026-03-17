@extends ('layout.admin')
@section('content')

<div class="p-6">
        <h1 class="text-2xl font-bold mb-4">Crear Nuevo Usuario</h1>

        <form action="{{ route('usuarios.update', $usuario->id) }}" method="POST" class="bg-white shadow rounded-lg p-4">
            @csrf
            @method('PUT')
            <div class="mb-4">
                <label for="name" class="block text-gray-700 font-bold mb-2">Nombre del usuario:</label>
                <input type="text" name="name" id="name" value="{{ old('name', $usuario->name) }}" class="w-full border rounded px-3 py-2" required>
                @error('name')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="email" class="block text-gray-700 font-bold mb-2">Correo electrónico:</label>
                <input type="email" name="email" id="email" value="{{ old('email', $usuario->email) }}" class="w-full border rounded px-3 py-2" required>
                @error('email')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="user_type" class="block text-gray-700 font-bold mb-2">Tipo de usuario:</label>
                <select name ="user_type" id="user_type" class="w-full border rounded px-3 py-2">
                    <option value="">Seleccione un tipo de usuario</option>
                    <option value="user" {{old('user_type', $usuario->user_type) == 'user' ? 'selected' : ''}}>Usuario</option>
                    <option value="admin" {{old('user_type', $usuario->user_type) == 'admin' ? 'selected' : ''}}>Administrador</option>
                </select>
                @error('user_type')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded">Guardar Usuario</button>
            <a href="{{ route('usuarios.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded ml-2">Cancelar</a>
        </form>
@endsection