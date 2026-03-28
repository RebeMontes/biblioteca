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
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead>
                <tr>
                    <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ID</th>
                    <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Libro</th>
                    <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Usuario</th>
                    <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Fecha</th>
                    <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Estatus</th>
                    <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Fecha de Entrega</th>
                    <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Acciones</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                @foreach($prestamos as $prestamo)
                    <tr>
                        <td class="px-4 py-3 whitespace-nowrap">{{ $prestamo->id }}</td>
                        <td class="px-4 py-3 whitespace-nowrap">{{ $prestamo->libro->nombre }}</td>
                        <td class="px-4 py-3 whitespace-nowrap">{{ $prestamo->usuario->name }}</td>
                        <td class="px-4 py-3 whitespace-nowrap">{{ $prestamo->created_at -> format('Y/m/d')}}</td>
                         <td class = "px-6 py-4 whitespace-nowrap">
                            @if($prestamo->estado == 'pendiente')
                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">
                                    Pendiente
                                </span>
                            @else
                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                    Entregado
                                    </span>
                            @endif
                        </td>
                        <td class="px-4 py-3 whitespace-nowrap">{{ $prestamo->fecha_entrega ? $prestamo->fecha_entrega: ' ' }}</td>
                        <td class="px-4 py-3 whitespace-nowrap text-center">
                            @if($prestamo->estado == 'pendiente')
                            <a href = "{{ route('prestamos.entregar', $prestamo->id) }}" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">Entregar</a>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
            </table>
        </div>
    </div>
</div>

@endsection