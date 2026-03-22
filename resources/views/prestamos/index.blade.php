@extends('layout.admin')

@section('content')
<div class="container mx-auto px-4 py-8">
    <h1 class="text-2xl font-bold mb-4"> Préstamos </h1>

    @if(session('success'))
        <div class="bg-green-100 text-green-700 px-4 py-2 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif
    
    <a href = "{{ route('prestamos.create') }} " class="bg-blue-500 text-white px-4 py-2 rounded mb-4 inline-block">Crear Préstamo</a>
    <div class="bg-white shadow-md rounded-lg p-6 mt-4">
        <table class="min-w-full table-auto">
            <thead>
                <tr>
                    <th class="px-4 py-2 border-b">ID</th>
                    <th class="px-4 py-2 border-b">Libro</th>
                    <th class="px-4 py-2 border-b">Usuario</th>
                    <th class="px-4 py-2 border-b">Fecha</th>
                    <th class="px-4 py-2 border-b">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($prestamos as $prestamo)
                    <tr>
                        <td class="px-4 py-2 border-b">{{ $prestamo->id }}</td>
                        <td class="px-4 py-2 border-b">{{ $prestamo->libro->nombre }}</td>
                        <td class="px-4 py-2 border-b">{{ $prestamo->usuario->name }}</td>
                        <td class="px-4 py-2 border-b">{{ $prestamo->created_at -> format('Y/m/d')}}</td>
                        <td class="px-4 py-2 border-b text-center"> 
                            </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

</div>

@endsection