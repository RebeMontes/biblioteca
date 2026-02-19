@extends('layout.admin')

@section('content')
<div class="p-6">
    <h1 class="text-2xl font-bold mb-4">Editar Categoría</h1>

    <form action="{{ route('categorias.update', $categoria->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-4">
            <label for="nombre" class="block text-gray-700">Nombre:</label>
            <input type="text" name="nombre" id="nombre" value="{{ old('nombre', $categoria->nombre) }}" class="border rounded w-full p-2 mt-1">
        </div>
        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Actualizar Categoría</button>
    </form>
</div>
@endsection