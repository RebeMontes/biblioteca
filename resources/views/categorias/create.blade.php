@extends('layout.admin')

@section('content')

    <div class="p-6">
        <h1 class="text-2xl font-bold mb-4">Crear Nueva Categoría</h1>

        <form action="{{ route('categorias.store') }}" method="POST" class="bg-white shadow rounded-lg p-4">
            @csrf
            <div class="mb-4">
                <label for="nombre" class="block text-gray-700 font-bold mb-2">Nombre:</label>
                <input type="text" name="nombre" id="nombre" class="w-full border rounded px-3 py-2" required>
            </div>

            <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded">Guardar Categoría</button>
            <a href="{{ route('categorias.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded ml-2">Cancelar</a>
        </form>
@endsection