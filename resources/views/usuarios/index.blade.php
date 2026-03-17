@extends('layout.admin')

@section('content')
<div class="container mx-auto px-4 py-8">
    <h1 class="text-2xl font-bold mb-4"> Lista de Usuarios </h1>
    <a href = "{{ route('usuarios.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded mb-4 inline-block">Crear Usuario</a>
        <div class="bg-white shadow-md rounded-lg p-6 mt-4">
        <table class="min-w-full table-auto">
            <thead>
                <tr>
                    <th class="px-4 py-2 border-b">ID</th>
                    <th class="px-4 py-2 border-b">Nombre</th>
                    <th class="px-4 py-2 border-b">Email</th>
                    <th class="px-4 py-2 border-b">Tipo</th>
                    <th class="px-4 py-2 border-b">Acciones</th>
                </tr>
            </thead>
            

            <tbody>
                @foreach($usuarios as $usuario)
                    <tr>
                        <td class="px-4 py-2 border-b">{{ $usuario->id }}</td>
                        <td class="px-4 py-2 border-b">{{ $usuario->name}}</td>
                        <td class="px-4 py-2 border-b">{{ $usuario->email }}</td>
                        <td class="px-4 py-2 border-b">{{ $usuario->user_type}}</td>
                        <td>
                            <a href = "{{ route('usuarios.edit', $usuario->id) }}" class="bg-green-500 text-white px-2 py-1 rounded">Editar</a>
                            <a href = "{{ route('usuarios.delete-confirm', $usuario->id) }}" class="bg-red-500 text-white px-2 py-1 rounded">Eliminar</a>
                           
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection