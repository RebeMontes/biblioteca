@extends('layout.admin')
@section('content')
<div class="container mx-auto px-4 py-8">
    <h1 class="text-2xl font-bold mb-4">Eliminar Usuario</h1>
    <p class="mb-4">¿Estás seguro de que deseas eliminar el usuario "{{ $usuario->name }}"?</p>
    
    <div class="bg-white shadow-md rounded-lg p-6 mt-4">
        <table class ="min-w-full table-auto">
            <thead>
                <tr>
                    <th class="px-4 py-2 border-b">ID</th>
                    <th class="px-4 py-2 border-b">Nombre</th>
                    <th class="px-4 py-2 border-b">Email</th>
                    <th class="px-4 py-2 border-b">Tipo</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="px-4 py-2 border-b">{{ $usuario->id }}</td>
                    <td class="px-4 py-2 border-b">{{ $usuario->name }}</td>
                    <td class="px-4 py-2 border-b">{{ $usuario->email }}</td>
                    <td class="px-4 py-2 border-b">{{ $usuario->user_type }}</td>
                </tr>
            </tbody>

        </table>

        <form action="{{ route('usuarios.destroy', $usuario->id) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded">Eliminar</button>
            <a href="{{ route('usuarios.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded ml-2">Cancelar</a>
        </form>
    </div>
</div>
@endsection