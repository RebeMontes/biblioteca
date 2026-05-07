<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('titulo', 'Panel de Administración')</title>
    
    <script src="https://cdn.tailwindcss.com"></script>
 
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <style>
        .sidebar-transition { transition: transform 0.3s ease-in-out; }
    </style>
</head>
<body class="bg-gray-100 font-sans leading-normal tracking-normal">

    <header class="bg-blue-800 text-white shadow-md sticky top-0 z-50 w-full h-16 flex items-center justify-between px-6">
        <div class="flex items-center gap-3">
            <button id="mobile-menu-btn" class="md:hidden text-white focus:outline-none mr-2">
                <i class="fas fa-bars text-xl"></i>
            </button>
            <div class="h-8 w-8 bg-white rounded-full flex items-center justify-center text-blue-800">
                <i class="fas fa-book"></i>
            </div>
            <span class="text-lg font-bold tracking-wide">Biblioteca Digital</span>
        </div>

        <div class="flex items-center gap-4">
            <div class="hidden md:flex flex-col text-right mr-2">
                <span class="text-sm font-bold"><a href="{{ route('usuarios.profile') }}" class="hover:underline">{{ auth()->user()->name }}</a></span>
                <span class="text-xs text-blue-200">{{ auth()->user()->email }}</span>
            </div>
            <div class="h-10 w-10 rounded-full bg-blue-600 flex items-center justify-center border-2 border-blue-400">
                <i class="fas fa-user"></i>
            </div>
        </div>
    </header>

    <div class="flex h-[calc(100vh-4rem)] overflow-hidden">

        <aside id="sidebar" class="sidebar-transition bg-white w-64 border-r border-gray-200 fixed inset-y-0 left-0 z-40 md:relative transform -translate-x-full md:translate-x-0 h-full flex flex-col pt-16 md:pt-0">
            
            <nav class="flex-1 overflow-y-auto p-4 space-y-1">
                <p class="px-4 text-xs font-semibold text-gray-400 uppercase tracking-wider mb-2 mt-2">Principal</p>
                
                <a href="{{ route('home') }}" class="flex items-center gap-3 px-4 py-3 rounded-lg text-gray-700 hover:bg-blue-50 hover:text-blue-700 transition">
                    <i class="fas fa-home w-5 text-center"></i>
                    <span>Inicio</span>
                </a>

                <a href="#" class="flex items-center gap-3 px-4 py-3 rounded-lg text-gray-700 hover:bg-blue-50 hover:text-blue-700 transition">
                    <i class="fas fa-book w-5 text-center"></i>
                    <span>Libros</span>
                </a>

                <a href="{{ route('categorias.index') }}" class="flex items-center gap-3 px-4 py-3 rounded-lg text-gray-700 hover:bg-blue-50 hover:text-blue-700 transition">
                    <i class="fas fa-tags w-5 text-center"></i>
                    <span>Categorías</span>
                </a>

                <a href="{{ route('usuarios.index') }}" class="flex items-center gap-3 px-4 py-3 rounded-lg text-gray-700 hover:bg-blue-50 hover:text-blue-700 transition">
                    <i class="fas fa-users w-5 text-center"></i>
                    <span>Usuarios</span>
                </a>

                <a href="{{ route('prestamos.index') }}" class="flex items-center gap-3 px-4 py-3 rounded-lg text-gray-700 hover:bg-blue-50 hover:text-blue-700 transition">
                    <i class="fas fa-users w-5 text-center"></i>
                    <span>Préstamos</span>
                </a>

                <p class="px-4 text-xs font-semibold text-gray-400 uppercase tracking-wider mb-2 mt-6">Sistema</p>

                <a href="{{ route('logout') }}" class="flex items-center gap-3 px-4 py-3 rounded-lg text-red-600 hover:bg-red-50 transition">
                    <i class="fas fa-sign-out-alt w-5 text-center"></i>
                    <span>Cerrar Sesión</span>
                </a>
            </nav>
        </aside>

        <div id="sidebar-overlay" class="fixed inset-0 bg-black bg-opacity-50 z-30 hidden md:hidden"></div>

        <main class="flex-1 overflow-y-auto bg-gray-50 flex flex-col relative w-full">
            
            <div class="flex-1 p-6">
                @yield('content')
            </div>

            @include('partials.admin.footer')
            
        </main>
    </div>

    <script>
        const btn = document.getElementById('mobile-menu-btn');
        const sidebar = document.getElementById('sidebar');
        const overlay = document.getElementById('sidebar-overlay');

        function toggleSidebar() {
            // Si tiene -translate-x-full está oculto, se lo quitamos para mostrar
            if (sidebar.classList.contains('-translate-x-full')) {
                sidebar.classList.remove('-translate-x-full');
                overlay.classList.remove('hidden');
            } else {
                sidebar.classList.add('-translate-x-full');
                overlay.classList.add('hidden');
            }
        }

        btn.addEventListener('click', toggleSidebar);
        overlay.addEventListener('click', toggleSidebar);
    </script>
</body>
</html>