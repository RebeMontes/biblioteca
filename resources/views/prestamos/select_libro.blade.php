@extends('layout.admin')

@section('content')

<div class ="container mx-auto px-4 py-8">
    <h1 class = "text-2xl font-bold mb-4">Seleccionar Libro</h1>

    <div class="bg-white shadow-md rounded-lg p-6 mt-4">
        <h2 class="text-xl font-bold mb-2">Usuario:</h2>
        <p class="text-gray-700">ID: {{ $usuario->id }}</p>
        <p class="text-gray-700">Nombre: {{ $usuario->name }}</p>
        <p class="text-gray-700">Correo: {{ $usuario->email }}</p>
    
        <form action="{{ route('prestamos.store') }}" method="POST">
            @csrf
            <label for="libro_id" class="block text-gray-700 font-bold mb-2">Libro:</label>
            <select name="libro_id" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                <option value="">Seleccione un libro</option>
                @foreach($libros as $libro)
                    <option value="{{ $libro->id }}">{{ $libro->nombre }} - {{ $libro->autor }}</option>
                @endforeach
            </select>
            <input type = "hidden" name="usuario_id" value="{{ $usuario->id }}">

            <div class="flex items-center justify-between mt-4">
                <input type="submit" value="Prestar" class="bg-green-500 text-white px-4 py-2 rounded">
                <a href="{{ route('prestamos.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded ml-2">Cancelar</a>
            </div>
        </form>
    </div>
</div>
@endsection