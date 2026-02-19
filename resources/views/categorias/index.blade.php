@extends('layout.admin')

@section('content')
<div class="p-6">
    <h1 class="text-2xl font-bold mb-4">Categorías</h1>
    <a href="{{ route('categorias.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded mb-4 inline-block">Crear Nueva Categoría</a>

    <div class="bg-white shadow rounded-lg p-4">
        <table class="min-w-full table-auto">
            <thead>
                <tr>
                    <th class="px-4 py-2 border-b">ID</th>
                    <th class="px-4 py-2 border-b">Nombre</th>
                    <th class="px-4 py-2 border-b">Descripción</th>
                    <th class="px-4 py-2 border-b">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($categorias as $categoria)
                <tr>
                    <td class="px-4 py-2 border-b">{{ $categoria->id }}</td>
                    <td class="px-4 py-2 border-b">{{ $categoria->nombre }}</td>
                    <td class="px-4 py-2 border-b">{{ $categoria->descripcion }}</td>
                    <td class="px-4 py-2 border-b text-center">
                    <a href="{{ route('categorias.edit', $categoria->id) }}" class="bg-green-500 text-white px-2 py-1 rounded">Editar</a>
                    <form action="{{ route('categorias.destroy', $categoria->id) }}" method="POST" class="inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="bg-red-500 text-white px-2 py-1 rounded">Eliminar</button>
                    </form>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection