@extends('layout.admin' )

@section('content')
<div class="container mx-auto px-4 py-8">
    <h1 class="text-2xl font-bold mb-4"> Crear préstamo</h1>
   
    <div class="bg-white shadow-md rounded-lg p-6 mt-4">
    <form action="{{ route('prestamos.buscar_usuario') }}" method="POST">
        @csrf
        <label for="usuario_id" class="block text-gray-700 font-bold mb-2">ID del usuario:</label>
        <input type="text" name="usuario_id" class= "w-full border rounded px-3 py-2">
        <label for="usuario_nombre" class="block text-gray-700 font-bold mb-2">Nombre del usuario:</label>
        <input type="text" name="usuario_nombre" class= "w-full border rounded px-3 py-2">
        
        <div class="flex items-center justify-between mt-4">
            <input type="submit" value="Buscar" class="bg-green-500 text-white px-4 py-2 rounded">
            <a href="{{ route('prestamos.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded ml-2">Cancelar</a>
        </div>
    </form>

    @isset($usuario)
    <div class="mt-4">
        <h2 class="text-xl font-bold mb-2">Información del usuario:</h2>
        <p class="text-gray-700">ID: {{ $usuario->id }}</p>
        <p class="text-gray-700">Nombre: {{ $usuario->name }}</p>
        <p class="text-gray-700">Correo: {{ $usuario->email }}</p>
    </div>
    
    <form action="{{ route('prestamos.select_libro') }} " method="POST">
        @csrf
        <input type="hidden" name="usuario_id" value="{{ $usuario->id }}">
        <input type = "submit" value="Seleccionar libro" class="bg-green-500 text-white px-4 py-2 rounded mt-4">
    </form>
    @endisset
    </div>
</div>
@endsection