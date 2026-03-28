@extends('layout.admin')

@section('content')
<div class="p-6">
    <h1 class="text-2xl font-bold mb-4">Categorías</h1>
    
    @if(session('success'))
        <div class="bg-green-100 text-green-700 px-4 py-2 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <a href="{{ route('categorias.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded mb-4 inline-block">Crear Nueva Categoría</a>

    <div class="bg-white shadow-md rounded-lg p-6 mt-4">
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead>
                <tr>
                    <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ID</th>
                    <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nombre</th>
                    <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Acciones</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                @foreach($categorias as $categoria)
                <tr>
                    <td class="px-4 py-3 whitespace-nowrap">{{ $categoria->id }}</td>
                    <td class="px-4 py-3 whitespace-nowrap">{{ $categoria->nombre }}</td>
                    <td class="px-4 py-3 whitespace-nowrap text-center">
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
        </div>
        {{ $categorias->links() }}
    </div>
@endsection