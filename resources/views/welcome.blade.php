<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Biblioteca</title>

        <!-- Fonts -->
         <script src="https://cdn.tailwindcss.com"></script>
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
        <!-- Styles / Scripts -->
        @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
            @vite(['resources/css/app.css', 'resources/js/app.js'])
        @else
        <style>
        /* Estilos personalizados */
        .hero-overlay {
            background: linear-gradient(to right, rgba(30, 58, 138, 0.85), rgba(56, 30, 114, 0.75));
        }
        
        .book-card:hover {
            transform: translateY(-5px);
            transition: transform 0.3s ease;
        }
        
        .mobile-menu {
            transition: all 0.3s ease;
        }
        
        .nav-link {
            position: relative;
        }
        
        .nav-link::after {
            content: '';
            position: absolute;
            width: 0;
            height: 2px;
            bottom: -5px;
            left: 0;
            background-color: #3b82f6;
            transition: width 0.3s ease;
        }
        
        .nav-link:hover::after {
            width: 100%;
        }
    </style>
        @endif
    </head>
<body class="font-sans bg-gray-50">
    <!-- Header con navegación -->
    <header class="sticky top-0 z-50 bg-white shadow-md">
        <div class="container mx-auto px-4 py-3 flex justify-between items-center">
            <!-- Logo -->
            <div class="flex items-center">
                <i class="fas fa-book text-3xl text-blue-700 mr-3"></i>
                <div>
                    <h1 class="text-2xl font-bold text-gray-800">Biblioteca Central</h1>
                    <p class="text-sm text-gray-600">El conocimiento al alcance de todos</p>
                </div>
            </div>
            
            <!-- Menú de navegación (escritorio) -->
            <nav class="hidden md:flex space-x-8">
                <a href="#" class="nav-link text-gray-700 font-medium hover:text-blue-700">Inicio</a>
                <a href="#" class="nav-link text-gray-700 font-medium hover:text-blue-700">Catálogo</a>
                <a href="#" class="nav-link text-gray-700 font-medium hover:text-blue-700">Eventos</a>
                <a href="#" class="nav-link text-gray-700 font-medium hover:text-blue-700">Servicios</a>
                <a href="#" class="nav-link text-gray-700 font-medium hover:text-blue-700">Contacto</a>
                <button id="login-btn" class="bg-blue-600 text-white px-5 py-2 rounded-lg hover:bg-blue-700 transition duration-300">
                    <i class="fas fa-sign-in-alt mr-2"></i>Iniciar Sesión
                </button>
            </nav>
            
            <!-- Botón menú hamburguesa (móvil) -->
            <button id="hamburger-btn" class="md:hidden text-2xl text-gray-700 focus:outline-none">
                <i class="fas fa-bars"></i>
            </button>
        </div>
        
        <!-- Menú móvil (oculto por defecto) -->
        <div id="mobile-menu" class="mobile-menu md:hidden hidden bg-white shadow-lg">
            <div class="container mx-auto px-4 py-4 flex flex-col space-y-4">
                <a href="#" class="text-gray-700 font-medium py-2 border-b hover:text-blue-700">Inicio</a>
                <a href="#" class="text-gray-700 font-medium py-2 border-b hover:text-blue-700">Catálogo</a>
                <a href="#" class="text-gray-700 font-medium py-2 border-b hover:text-blue-700">Eventos</a>
                <a href="#" class="text-gray-700 font-medium py-2 border-b hover:text-blue-700">Servicios</a>
                <a href="#" class="text-gray-700 font-medium py-2 border-b hover:text-blue-700">Contacto</a>
                <button id="mobile-login-btn" class="bg-blue-600 text-white py-3 rounded-lg hover:bg-blue-700 transition duration-300 mt-2">
                    <i class="fas fa-sign-in-alt mr-2"></i>Iniciar Sesión
                </button>
            </div>
        </div>
    </header>

    <!-- Sección Hero -->
    <section class="relative">
        <div class="hero-overlay">
            <div class="container mx-auto px-4 py-24 md:py-32 text-white">
                <div class="max-w-3xl">
                    <h2 class="text-4xl md:text-5xl font-bold mb-6">Descubre un mundo de conocimiento</h2>
                    <p class="text-xl mb-8 opacity-90">Explora nuestra colección de más de 50,000 libros, revistas y recursos digitales. Tu puerta de acceso al aprendizaje.</p>
                    <div class="flex flex-col sm:flex-row space-y-4 sm:space-y-0 sm:space-x-6">
                        <button class="bg-white text-blue-700 font-bold py-3 px-8 rounded-lg hover:bg-gray-100 transition duration-300 shadow-lg">
                            <i class="fas fa-search mr-2"></i>Buscar en el catálogo
                        </button>
                        <button class="bg-transparent border-2 border-white text-white font-bold py-3 px-8 rounded-lg hover:bg-white hover:text-blue-700 transition duration-300">
                            <i class="fas fa-user-plus mr-2"></i>Hazte socio
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <!-- Imagen de fondo de hero (copyright free) -->
        <div class="absolute inset-0 -z-10">
            <img src="https://images.unsplash.com/photo-1507842217343-583bb7270b66?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2070&q=80" 
                 alt="Biblioteca con estanterías llenas de libros" 
                 class="w-full h-full object-cover">
        </div>
    </section>

    <!-- Sección de características principales -->
    <section class="py-16 bg-white">
        <div class="container mx-auto px-4">
            <h2 class="text-3xl font-bold text-center text-gray-800 mb-12">Nuestros Servicios</h2>
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Tarjeta 1 -->
                <div class="bg-gray-50 rounded-xl shadow-lg p-6 book-card">
                    <div class="text-blue-600 text-4xl mb-4">
                        <i class="fas fa-book-open"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 mb-3">Préstamo de Libros</h3>
                    <p class="text-gray-600 mb-4">Accede a nuestro extenso catálogo de libros físicos y digitales. Préstamos por 15 días renovables.</p>
                    <a href="#" class="text-blue-600 font-medium hover:text-blue-800">Más información <i class="fas fa-arrow-right ml-1"></i></a>
                </div>
                
                <!-- Tarjeta 2 -->
                <div class="bg-gray-50 rounded-xl shadow-lg p-6 book-card">
                    <div class="text-blue-600 text-4xl mb-4">
                        <i class="fas fa-desktop"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 mb-3">Sala Digital</h3>
                    <p class="text-gray-600 mb-4">Acceso a computadoras, bases de datos académicas y recursos digitales especializados.</p>
                    <a href="#" class="text-blue-600 font-medium hover:text-blue-800">Más información <i class="fas fa-arrow-right ml-1"></i></a>
                </div>
                
                <!-- Tarjeta 3 -->
                <div class="bg-gray-50 rounded-xl shadow-lg p-6 book-card">
                    <div class="text-blue-600 text-4xl mb-4">
                        <i class="fas fa-users"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 mb-3">Actividades Culturales</h3>
                    <p class="text-gray-600 mb-4">Club de lectura, talleres, presentaciones de libros y eventos culturales semanales.</p>
                    <a href="#" class="text-blue-600 font-medium hover:text-blue-800">Más información <i class="fas fa-arrow-right ml-1"></i></a>
                </div>
            </div>
        </div>
    </section>

    <!-- Sección de libros destacados -->
    <section class="py-16 bg-gray-100">
        <div class="container mx-auto px-4">
            <h2 class="text-3xl font-bold text-center text-gray-800 mb-12">Libros Destacados</h2>
            
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
                <!-- Libro 1 -->
                <div class="bg-white rounded-xl shadow-md overflow-hidden book-card">
                    <img src="https://images.unsplash.com/photo-1544947950-fa07a98d237f?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1074&q=80" 
                         alt="Portada de libro abierto" 
                         class="w-full h-48 object-cover">
                    <div class="p-5">
                        <h3 class="font-bold text-lg text-gray-800 mb-2">El arte de la lectura</h3>
                        <p class="text-gray-600 text-sm mb-3">Una exploración profunda sobre la importancia de la lectura en la era digital.</p>
                        <div class="flex justify-between items-center">
                            <span class="text-blue-600 font-medium">Disponible</span>
                            <button class="bg-blue-100 text-blue-700 text-sm py-1 px-3 rounded hover:bg-blue-200">Reservar</button>
                        </div>
                    </div>
                </div>
                
                <!-- Libro 2 -->
                <div class="bg-white rounded-xl shadow-md overflow-hidden book-card">
                    <img src="https://images.unsplash.com/photo-1512820790803-83ca734da794?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1198&q=80" 
                         alt="Libro antiguo en estantería" 
                         class="w-full h-48 object-cover">
                    <div class="p-5">
                        <h3 class="font-bold text-lg text-gray-800 mb-2">Historia de las Bibliotecas</h3>
                        <p class="text-gray-600 text-sm mb-3">Un viaje a través del tiempo explorando la evolución de las bibliotecas.</p>
                        <div class="flex justify-between items-center">
                            <span class="text-green-600 font-medium">Prestado</span>
                            <button class="bg-gray-100 text-gray-700 text-sm py-1 px-3 rounded cursor-not-allowed" disabled>No disponible</button>
                        </div>
                    </div>
                </div>
                
                <!-- Libro 3 -->
                <div class="bg-white rounded-xl shadow-md overflow-hidden book-card">
                    <img src="https://images.unsplash.com/photo-1481627834876-b7833e8f5570?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1128&q=80" 
                         alt="Libro sobre mesa con lentes" 
                         class="w-full h-48 object-cover">
                    <div class="p-5">
                        <h3 class="font-bold text-lg text-gray-800 mb-2">Ciencia y Literatura</h3>
                        <p class="text-gray-600 text-sm mb-3">La intersección entre el método científico y la creación literaria.</p>
                        <div class="flex justify-between items-center">
                            <span class="text-blue-600 font-medium">Disponible</span>
                            <button class="bg-blue-100 text-blue-700 text-sm py-1 px-3 rounded hover:bg-blue-200">Reservar</button>
                        </div>
                    </div>
                </div>
                
                <!-- Libro 4 -->
                <div class="bg-white rounded-xl shadow-md overflow-hidden book-card">
                    <img src="https://images.unsplash.com/photo-1516979187457-637abb4f9353?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1170&q=80" 
                         alt="Libro abierto con anotaciones" 
                         class="w-full h-48 object-cover">
                    <div class="p-5">
                        <h3 class="font-bold text-lg text-gray-800 mb-2">Filosofía Moderna</h3>
                        <p class="text-gray-600 text-sm mb-3">Un análisis de las corrientes filosóficas del siglo XX y su impacto actual.</p>
                        <div class="flex justify-between items-center">
                            <span class="text-blue-600 font-medium">Disponible</span>
                            <button class="bg-blue-100 text-blue-700 text-sm py-1 px-3 rounded hover:bg-blue-200">Reservar</button>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="text-center mt-12">
                <button class="bg-blue-600 text-white font-medium py-3 px-8 rounded-lg hover:bg-blue-700 transition duration-300 shadow-md">
                    <i class="fas fa-book mr-2"></i>Ver catálogo completo
                </button>
            </div>
        </div>
    </section>

    <!-- Sección de información -->
    <section class="py-16 bg-white">
        <div class="container mx-auto px-4">
            <div class="flex flex-col lg:flex-row items-center">
                <div class="lg:w-1/2 mb-12 lg:mb-0 lg:pr-12">
                    <h2 class="text-3xl font-bold text-gray-800 mb-6">Nuestra Biblioteca</h2>
                    <p class="text-gray-600 mb-6">Fundada en 1985, la Biblioteca Central se ha dedicado a fomentar la lectura y el acceso al conocimiento para todos los ciudadanos. Contamos con un espacio de 2,500 m² distribuidos en 3 plantas.</p>
                    <p class="text-gray-600 mb-8">Nuestra misión es ser un centro de recursos educativos y culturales que impulse el desarrollo comunitario a través de la promoción de la lectura y el aprendizaje permanente.</p>
                    
                    <div class="grid grid-cols-2 gap-6">
                        <div class="bg-blue-50 p-4 rounded-lg">
                            <div class="text-blue-600 text-2xl font-bold mb-1">50,000+</div>
                            <div class="text-gray-700">Libros disponibles</div>
                        </div>
                        <div class="bg-blue-50 p-4 rounded-lg">
                            <div class="text-blue-600 text-2xl font-bold mb-1">5,000+</div>
                            <div class="text-gray-700">Socios activos</div>
                        </div>
                        <div class="bg-blue-50 p-4 rounded-lg">
                            <div class="text-blue-600 text-2xl font-bold mb-1">120+</div>
                            <div class="text-gray-700">Eventos anuales</div>
                        </div>
                        <div class="bg-blue-50 p-4 rounded-lg">
                            <div class="text-blue-600 text-2xl font-bold mb-1">24/7</div>
                            <div class="text-gray-700">Catálogo online</div>
                        </div>
                    </div>
                </div>
                
                <div class="lg:w-1/2">
                    <img src="https://images.unsplash.com/photo-1521587760476-6c12a4b040da?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1170&q=80" 
                         alt="Interior moderno de biblioteca" 
                         class="w-full h-auto rounded-xl shadow-lg">
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-gray-800 text-white pt-12 pb-6">
        <div class="container mx-auto px-4">
            <div class="flex flex-col md:flex-row justify-between">
                <div class="mb-8 md:mb-0 md:w-1/3">
                    <div class="flex items-center mb-4">
                        <i class="fas fa-book text-3xl text-blue-400 mr-3"></i>
                        <div>
                            <h2 class="text-2xl font-bold">Biblioteca Central</h2>
                            <p class="text-gray-400 text-sm">Conocimiento sin fronteras</p>
                        </div>
                    </div>
                    <p class="text-gray-400 mb-6">Una institución comprometida con la promoción de la lectura y el acceso a la información para toda la comunidad.</p>
                    <div class="flex space-x-4">
                        <a href="#" class="text-gray-400 hover:text-white text-xl"><i class="fab fa-facebook"></i></a>
                        <a href="#" class="text-gray-400 hover:text-white text-xl"><i class="fab fa-twitter"></i></a>
                        <a href="#" class="text-gray-400 hover:text-white text-xl"><i class="fab fa-instagram"></i></a>
                        <a href="#" class="text-gray-400 hover:text-white text-xl"><i class="fab fa-youtube"></i></a>
                    </div>
                </div>
                
                <div class="md:w-2/3 grid grid-cols-1 sm:grid-cols-3 gap-8">
                    <div>
                        <h3 class="text-lg font-bold mb-4 text-white">Enlaces rápidos</h3>
                        <ul class="space-y-2">
                            <li><a href="#" class="text-gray-400 hover:text-white">Catálogo en línea</a></li>
                            <li><a href="#" class="text-gray-400 hover:text-white">Horarios y ubicación</a></li>
                            <li><a href="#" class="text-gray-400 hover:text-white">Hazte socio</a></li>
                            <li><a href="#" class="text-gray-400 hover:text-white">Donar libros</a></li>
                            <li><a href="#" class="text-gray-400 hover:text-white">Trabaja con nosotros</a></li>
                        </ul>
                    </div>
                    
                    <div>
                        <h3 class="text-lg font-bold mb-4 text-white">Recursos</h3>
                        <ul class="space-y-2">
                            <li><a href="#" class="text-gray-400 hover:text-white">Biblioteca digital</a></li>
                            <li><a href="#" class="text-gray-400 hover:text-white">Recursos para investigadores</a></li>
                            <li><a href="#" class="text-gray-400 hover:text-white">Para niños y jóvenes</a></li>
                            <li><a href="#" class="text-gray-400 hover:text-white">Accesibilidad</a></li>
                            <li><a href="#" class="text-gray-400 hover:text-white">Preguntas frecuentes</a></li>
                        </ul>
                    </div>
                    
                    <div>
                        <h3 class="text-lg font-bold mb-4 text-white">Contacto</h3>
                        <ul class="space-y-3">
                            <li class="flex items-start">
                                <i class="fas fa-map-marker-alt text-blue-400 mt-1 mr-3"></i>
                                <span class="text-gray-400">Av. Conocimiento 123, Centro Cultural</span>
                            </li>
                            <li class="flex items-center">
                                <i class="fas fa-phone text-blue-400 mr-3"></i>
                                <span class="text-gray-400">(123) 456-7890</span>
                            </li>
                            <li class="flex items-center">
                                <i class="fas fa-envelope text-blue-400 mr-3"></i>
                                <span class="text-gray-400">info@bibliotecacentral.org</span>
                            </li>
                            <li class="flex items-center">
                                <i class="fas fa-clock text-blue-400 mr-3"></i>
                                <span class="text-gray-400">Lun-Vie: 9am-8pm, Sáb: 10am-6pm</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            
            <div class="border-t border-gray-700 mt-8 pt-6 text-center text-gray-400">
                <p>&copy; 2023 Biblioteca Central. Todos los derechos reservados.</p>
                <p class="mt-2 text-sm">Imágenes de <a href="https://unsplash.com" class="text-blue-400 hover:text-blue-300" target="_blank">Unsplash</a> - Iconos de <a href="https://fontawesome.com" class="text-blue-400 hover:text-blue-300" target="_blank">FontAwesome</a></p>
            </div>
        </div>
    </footer>

    <!-- Modal de Login (oculto por defecto) -->
    <div id="login-modal" class="fixed inset-0 bg-black bg-opacity-50 z-50 hidden flex items-center justify-center p-4">
        <div class="bg-white rounded-xl shadow-2xl max-w-md w-full">
            <div class="flex justify-between items-center p-6 border-b">
                <h3 class="text-2xl font-bold text-gray-800">Iniciar Sesión</h3>
                <button id="close-modal" class="text-gray-500 hover:text-gray-700 text-2xl">
                    <i class="fas fa-times"></i>
                </button>
            </div>
            
            <div class="p-6">
                <form id="login-form">
                    <div class="mb-5">
                        <label for="email" class="block text-gray-700 font-medium mb-2">Correo electrónico</label>
                        <input type="email" id="email" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="usuario@ejemplo.com" required>
                    </div>
                    
                    <div class="mb-6">
                        <label for="password" class="block text-gray-700 font-medium mb-2">Contraseña</label>
                        <input type="password" id="password" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="••••••••" required>
                    </div>
                    
                    <div class="flex items-center justify-between mb-6">
                        <div class="flex items-center">
                            <input type="checkbox" id="remember" class="h-4 w-4 text-blue-600 rounded focus:ring-blue-500">
                            <label for="remember" class="ml-2 text-gray-700">Recordarme</label>
                        </div>
                        <a href="#" class="text-blue-600 hover:text-blue-800 font-medium">¿Olvidaste tu contraseña?</a>
                    </div>
                    
                    <button type="submit" class="w-full bg-blue-600 text-white font-bold py-3 px-4 rounded-lg hover:bg-blue-700 transition duration-300 mb-4">
                        Iniciar Sesión
                    </button>
                    
                    <div class="text-center">
                        <p class="text-gray-600">¿No tienes una cuenta? <a href="#" class="text-blue-600 hover:text-blue-800 font-medium">Regístrate aquí</a></p>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        // JavaScript Vanilla para funcionalidades
        
        // Elementos del DOM
        const hamburgerBtn = document.getElementById('hamburger-btn');
        const mobileMenu = document.getElementById('mobile-menu');
        const loginBtn = document.getElementById('login-btn');
        const mobileLoginBtn = document.getElementById('mobile-login-btn');
        const loginModal = document.getElementById('login-modal');
        const closeModalBtn = document.getElementById('close-modal');
        const loginForm = document.getElementById('login-form');
        
        // Alternar menú hamburguesa
        hamburgerBtn.addEventListener('click', function() {
            mobileMenu.classList.toggle('hidden');
            const icon = hamburgerBtn.querySelector('i');
            if (mobileMenu.classList.contains('hidden')) {
                icon.className = 'fas fa-bars';
            } else {
                icon.className = 'fas fa-times';
            }
        });
        
        // Mostrar modal de login
        function showLoginModal() {
            loginModal.classList.remove('hidden');
            document.body.style.overflow = 'hidden'; // Prevenir scroll en el fondo
        }
        
        // Ocultar modal de login
        function hideLoginModal() {
            loginModal.classList.add('hidden');
            document.body.style.overflow = 'auto'; // Restaurar scroll
        }
        
        // Event listeners para botones de login
        loginBtn.addEventListener('click', showLoginModal);
        mobileLoginBtn.addEventListener('click', showLoginModal);
        
        // Cerrar modal con botón X
        closeModalBtn.addEventListener('click', hideLoginModal);
        
        // Cerrar modal al hacer clic fuera del contenido
        loginModal.addEventListener('click', function(event) {
            if (event.target === loginModal) {
                hideLoginModal();
            }
        });
        
        // Cerrar modal con tecla Escape
        document.addEventListener('keydown', function(event) {
            if (event.key === 'Escape' && !loginModal.classList.contains('hidden')) {
                hideLoginModal();
            }
        });
        
        // Manejar envío del formulario de login
        loginForm.addEventListener('submit', function(event) {
            event.preventDefault();
            
            const email = document.getElementById('email').value;
            const password = document.getElementById('password').value;
            
            // Aquí normalmente enviaríamos los datos al servidor
            // Por ahora solo mostramos un mensaje de éxito
            alert(`Inicio de sesión exitoso para: ${email}`);
            
            // Cerrar el modal después del "login"
            hideLoginModal();
            
            // Limpiar el formulario
            loginForm.reset();
        });
        
        // Cerrar menú móvil al hacer clic en un enlace
        const mobileLinks = document.querySelectorAll('#mobile-menu a');
        mobileLinks.forEach(link => {
            link.addEventListener('click', function() {
                mobileMenu.classList.add('hidden');
                hamburgerBtn.querySelector('i').className = 'fas fa-bars';
            });
        });
        
        // Efecto de scroll suave para enlaces internos
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function(e) {
                e.preventDefault();
                
                const targetId = this.getAttribute('href');
                if (targetId === '#') return;
                
                const targetElement = document.querySelector(targetId);
                if (targetElement) {
                    window.scrollTo({
                        top: targetElement.offsetTop - 80,
                        behavior: 'smooth'
                    });
                }
            });
        });
    </script>
</body>
</html>
