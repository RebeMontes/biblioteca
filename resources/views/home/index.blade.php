@extends('layout.admin')
@section('content')

<!-- Contenido principal -->
        <main id="mainContent" class="content-transition flex-1 p-4 md:p-6">
            <!-- Título de página actual -->
            <div class="mb-6">
                <h2 id="pageTitle" class="text-2xl font-bold text-gray-800">Inicio</h2>
                <p class="text-gray-600">Panel de administración de la biblioteca</p>
            </div>
            
            <!-- Contenido dinámico según la página seleccionada -->
            <div id="contentContainer">
                <!-- Contenido de inicio (página por defecto) -->
                <div id="inicioContent" class="page-content">
                    <!-- Estadísticas -->
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4 mb-6">
                        <div class="bg-white rounded-lg shadow p-4">
                            <div class="flex items-center">
                                <div class="p-3 bg-blue-100 rounded-lg mr-4">
                                    <i class="fas fa-book text-blue-600 text-xl"></i>
                                </div>
                                <div>
                                    <p class="text-gray-500">Total de libros</p>
                                    <h3 class="text-2xl font-bold">1,248</h3>
                                </div>
                            </div>
                        </div>
                        
                        <div class="bg-white rounded-lg shadow p-4">
                            <div class="flex items-center">
                                <div class="p-3 bg-green-100 rounded-lg mr-4">
                                    <i class="fas fa-users text-green-600 text-xl"></i>
                                </div>
                                <div>
                                    <p class="text-gray-500">Usuarios activos</p>
                                    <h3 class="text-2xl font-bold">342</h3>
                                </div>
                            </div>
                        </div>
                        
                        <div class="bg-white rounded-lg shadow p-4">
                            <div class="flex items-center">
                                <div class="p-3 bg-yellow-100 rounded-lg mr-4">
                                    <i class="fas fa-exchange-alt text-yellow-600 text-xl"></i>
                                </div>
                                <div>
                                    <p class="text-gray-500">Préstamos activos</p>
                                    <h3 class="text-2xl font-bold">15</h3>
                                </div>
                            </div>
                        </div>
                        
                        <div class="bg-white rounded-lg shadow p-4">
                            <div class="flex items-center">
                                <div class="p-3 bg-red-100 rounded-lg mr-4">
                                    <i class="fas fa-clock text-red-600 text-xl"></i>
                                </div>
                                <div>
                                    <p class="text-gray-500">Pendientes</p>
                                    <h3 class="text-2xl font-bold">3</h3>
                                </div>
                            </div>
                        </div>
                    </div>

                    @if(session('success'))
                        <div class="bg-green-100 text-green-700 px-4 py-2 rounded mb-4">
                            {{ session('success') }}
                        </div>
                    @endif


                    <!-- Botón agregar libro -->
                    <div class="flex justify-end mb-4">
                        <a href="{{ route('libros.create') }}" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg flex items-center gap-2">
                            <i class="fas fa-plus"></i>
                            <span>Agregar Libro</span>
                        </a>
                    </div>

                    <!-- Actividad reciente -->
                    <div class="bg-white rounded-lg shadow p-4 md:p-6 mb-6">
                        <h3 class="text-lg font-semibold mb-4">Libros agregados</h3>
                        <div class="overflow-x-auto">
                            <table class="min-w-full divide-y divide-gray-200">
                                <thead>
                                    <tr>
                                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nombre</th>
                                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ISBN</th>
                                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Autor</th>
                                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Editorial</th>
                                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Categoría</th>
                                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Estado</th>
                                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Acciones</th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-gray-200">
                                    @foreach($libros as $libro)
                                    <tr>
                                        <td class="px-4 py-3 whitespace-nowrap ">
                                            <div class="font-medium text-gray-900">{{ $libro->nombre }}</div>
                                        </td>
                                        <td class="px-4 py-3 whitespace-nowrap ">
                                            <div class="text-gray-900">{{ $libro->isbn }}</div>
                                        </td>
                                        <td class="px-4 py-3 whitespace-nowrap ">
                                            <div class="text-gray-900">{{ $libro->autor }}</div>    
                                        </td>
                                        <td class="px-4 py-3 whitespace-nowrap ">
                                            <div class="text-gray-900">{{ $libro->editorial }}</div>
                                        </td>
                                        <td class="px-4 py-3 whitespace-nowrap ">
                                            <div class="text-gray-900">{{ $libro->categoria->nombre }}</div>    
                                        </td>

                                        <td class = "px-6 py-4 whitespace-nowrap">
                                            @if($libro->estatus == 0)
                                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                                    Disponible
                                                </span>
                                            @else
                                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">
                                                    Prestado
                                                </span>
                                            @endif

                                        </td>

                                        <td class="px-4 py-3 whitespace-nowrap text-sm font-medium">
                                            <a href="{{ route('libros.edit', $libro->id) }}" class="text-blue-600 hover:text-blue-900">Editar</a>
                                            <form action="{{ route('libros.destroy', $libro->id) }}" method="POST" class="inline-block">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="text-red-600 hover:text-red-900 ml-4">Eliminar</button>
                                            </form>
                                        </td>

                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                             <div class="px-6 py-4 border-t border-gray-200 flex items-center justify-between">
                                {{ $libros->links() }}
                    </div>
                        </div>
                    </div>

                    <!-- Información adicional -->
                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                        <div class="bg-white rounded-lg shadow p-4 md:p-6">
                            <h3 class="text-lg font-semibold mb-4">Préstamos próximos a vencer</h3>
                            <ul class="space-y-3">
                                <li class="flex justify-between items-center p-3 bg-yellow-50 rounded-lg">
                                    <div>
                                        <p class="font-medium">Don Quijote de la Mancha</p>
                                        <p class="text-sm text-gray-600">Juan Martínez</p>
                                    </div>
                                    <span class="text-red-600 font-medium">Mañana</span>
                                </li>
                                <li class="flex justify-between items-center p-3 bg-yellow-50 rounded-lg">
                                    <div>
                                        <p class="font-medium">Orgullo y prejuicio</p>
                                        <p class="text-sm text-gray-600">Laura Sánchez</p>
                                    </div>
                                    <span class="text-orange-600 font-medium">2 días</span>
                                </li>
                            </ul>
                        </div>
                        
                        <div class="bg-white rounded-lg shadow p-4 md:p-6">
                            <h3 class="text-lg font-semibold mb-4">Libros más populares</h3>
                            <ul class="space-y-3">
                                <li class="flex items-center p-3 bg-blue-50 rounded-lg">
                                    <div class="h-10 w-10 flex items-center justify-center bg-blue-100 rounded-lg mr-3">
                                        <i class="fas fa-book text-blue-600"></i>
                                    </div>
                                    <div>
                                        <p class="font-medium">Cien años de soledad</p>
                                        <p class="text-sm text-gray-600">42 préstamos este mes</p>
                                    </div>
                                </li>
                                <li class="flex items-center p-3 bg-blue-50 rounded-lg">
                                    <div class="h-10 w-10 flex items-center justify-center bg-blue-100 rounded-lg mr-3">
                                        <i class="fas fa-book text-blue-600"></i>
                                    </div>
                                    <div>
                                        <p class="font-medium">1984</p>
                                        <p class="text-sm text-gray-600">35 préstamos este mes</p>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                
                <!-- Contenido de usuarios (oculto por defecto) -->
                <div id="usuariosContent" class="page-content hidden">
                    <div class="bg-white rounded-lg shadow p-4 md:p-6">
                        <h3 class="text-lg font-semibold mb-4">Gestión de Usuarios</h3>
                        <p class="text-gray-600 mb-4">Aquí puedes administrar los usuarios de la biblioteca.</p>
                        <!-- Contenido específico de usuarios -->
                    </div>
                </div>
                
                <!-- Contenido de libros (oculto por defecto) -->
                <div id="librosContent" class="page-content hidden">
                    <div class="bg-white rounded-lg shadow p-4 md:p-6">
                        <h3 class="text-lg font-semibold mb-4">Gestión de Libros</h3>
                        <p class="text-gray-600 mb-4">Aquí puedes administrar el catálogo de libros.</p>
                        <!-- Contenido específico de libros -->
                    </div>
                </div>
                
                <!-- Contenido de préstamos (oculto por defecto) -->
                <div id="prestamosContent" class="page-content hidden">
                    <div class="bg-white rounded-lg shadow p-4 md:p-6">
                        <h3 class="text-lg font-semibold mb-4">Gestión de Préstamos</h3>
                        <p class="text-gray-600 mb-4">Aquí puedes administrar los préstamos de libros.</p>
                        <!-- Contenido específico de préstamos -->
                    </div>
                </div>
                
                <!-- Contenido de reportes (oculto por defecto) -->
                <div id="reportesContent" class="page-content hidden">
                    <div class="bg-white rounded-lg shadow p-4 md:p-6">
                        <h3 class="text-lg font-semibold mb-4">Reportes</h3>
                        <p class="text-gray-600 mb-4">Aquí puedes visualizar reportes y estadísticas.</p>
                        <!-- Contenido específico de reportes -->
                    </div>
                </div>
                
                <!-- Contenido de salir (oculto por defecto) -->
                <div id="salirContent" class="page-content hidden">
                    <div class="bg-white rounded-lg shadow p-4 md:p-6">
                        <h3 class="text-lg font-semibold mb-4">Cerrar Sesión</h3>
                        <p class="text-gray-600 mb-4">¿Estás seguro de que deseas salir?</p>
                        <button id="logoutBtn" class="bg-red-600 text-white px-4 py-2 rounded-lg hover:bg-red-700 transition-colors">
                            Confirmar salida
                        </button>
                    </div>
                </div>
            </div>
        </main>
    </div>
@endsection