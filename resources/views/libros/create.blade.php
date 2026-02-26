@extends('layout.admin' )
@section('content')

<div class = "container mx-auto px-4">
    <h1 class = "text-2xl font-bold mb-4">Crear Libro</h1>
    <form action="{{ route('libros.store') }}" method="POST" class="bg-white p-6 rounded shadow-md">
        @csrf
        <div class="mb-4">
            <label for="nombre" class="block text-gray-700 font-bold mb-2">Nombre:</label>
            <input type="text" name="nombre" id="nombre" class="w-full border border-gray-300 p-2 rounded" required>
        </div>

        <div class="mb-4">
            <label for="isbn" class="block text-gray-700 font-bold mb-2">ISBN:</label>
            <input type="text" name="isbn" id="isbn" class="w-full border border-gray-300 p-2 rounded" required>
        </div>

        <div class="mb-4">
            <label for="autor" class="block text-gray-700 font-bold mb-2">Autor:</label>
            <input type="text" name="autor" id="autor" class="w-full border border-gray-300 p-2 rounded" required>
        </div>

        <div class="mb-4">
            <label for="editorial" class="block text-gray-700 font-bold mb-2">Editorial:</label>
            <input type="text" name="editorial" id="editorial" class="w-full border border-gray-300 p-2 rounded" required>
        </div>

        <div class="mb-4">
            <label for="categoria" class="block text-gray-700 font-bold mb-2">Categoría:</label>
            <select name ="categoria" id="categoria" class="w-full border border-gray-300 p-2 rounded" required>
                <option value="">Seleccione una categoría</option>
                @foreach($categorias as $categoria)
                    <option value="{{ $categoria->id }}">{{ $categoria->nombre }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Crear</button>
    </form>
@endsection
