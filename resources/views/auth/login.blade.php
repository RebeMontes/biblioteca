 @extends('layout.auth')

 @section('content')
 <!-- Header -->
    <header class="sticky top-0 z-50 bg-white shadow-md">
        <div class="container mx-auto px-4 py-3 flex justify-between items-center">
            <!-- Logo -->
            <div class="flex items-center">
                <i class="fas fa-book text-3xl text-blue-700 mr-3"></i>
                <div>
                    <h1 class="text-2xl font-bold text-gray-800">Biblioteca Central</h1>
                    <p class="text-sm text-gray-600">Acceso a usuarios</p>
                </div>
            </div>
            
            <!-- Navegación entre formularios -->
            <nav class="hidden md:flex space-x-6">
                <a href="#login-form" class="text-blue-600 font-medium border-b-2 border-blue-600 pb-1">Login</a>
                <a href="#register-form" class="text-gray-600 font-medium hover:text-blue-600 pb-1">Registro</a>
                <a href="index.html" class="text-gray-600 font-medium hover:text-blue-600 pb-1">
                    <i class="fas fa-home mr-1"></i>Inicio
                </a>
            </nav>
            
            <!-- Menú hamburguesa para móvil -->
            <button id="mobile-menu-btn" class="md:hidden text-gray-700 text-2xl">
                <i class="fas fa-bars"></i>
            </button>
        </div>
        
        <!-- Menú móvil -->
        <div id="mobile-menu" class="md:hidden hidden bg-white shadow-lg">
            <div class="container mx-auto px-4 py-4 flex flex-col space-y-3">
                <a href="#login-form" class="text-blue-600 font-medium py-2 border-b">Login</a>
                <a href="#register-form" class="text-gray-700 font-medium py-2 border-b hover:text-blue-600">Registro</a>
                <a href="index.html" class="text-gray-700 font-medium py-2 border-b hover:text-blue-600">
                    <i class="fas fa-home mr-2"></i>Volver al Inicio
                </a>
            </div>
        </div>
    </header>

    <!-- Contenedor principal con ambos formularios -->
    <main class="form-container">
        <div class="container mx-auto px-4 py-12">
            <!-- Título principal -->
            <div class="text-center mb-12">
                <h2 class="text-3xl md:text-4xl font-bold text-gray-800 mb-4">Acceso a la Biblioteca</h2>
                <p class="text-gray-600 max-w-2xl mx-auto">Inicia sesión con tu cuenta o regístrate para acceder a todos los servicios de la biblioteca: préstamos, reservas, eventos y más.</p>
            </div>
            
            <!-- Sección de formularios -->
            <div class="flex flex-col lg:flex-row gap-12">
                <!-- Formulario de Login -->
                <div id="login-form" class="lg:w-1/2">
                    <div class="bg-white rounded-2xl shadow-xl p-8 form-card">
                        <div class="text-center mb-8">
                            <div class="inline-flex items-center justify-center w-16 h-16 rounded-full bg-blue-100 mb-4">
                                <i class="fas fa-sign-in-alt text-2xl text-blue-600"></i>
                            </div>
                            <h3 class="text-2xl font-bold text-gray-800">Iniciar Sesión</h3>
                            <p class="text-gray-600 mt-2">Accede a tu cuenta existente</p>
                        </div>
                        
                        <form action="{{ route('login') }}" method="POST">
                            @csrf
                            <!-- Campo de email -->
                            <div class="mb-6">
                                <label for="login-email" class="block text-gray-700 font-medium mb-2">
                                    <i class="fas fa-envelope text-blue-500 mr-2"></i>Correo Electrónico
                                </label>
                                <div class="relative">
                                    <input 
                                        type="email" 
                                        id="login-email" 
                                        name="email"
                                        class="form-input w-full pl-12 pr-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500" 
                                        placeholder="ejemplo@correo.com"
                                        required
                                    >
                                    <i class="fas fa-envelope input-icon absolute left-4 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
                                </div>
                                <p class="text-gray-500 text-sm mt-1">Introduce el email con el que te registraste</p>
                            </div>
                            
                            <!-- Campo de contraseña -->
                            <div class="mb-8">
                                <label for="login-password" class="block text-gray-700 font-medium mb-2">
                                    <i class="fas fa-lock text-blue-500 mr-2"></i>Contraseña
                                </label>
                                <div class="relative">
                                    <input 
                                        type="password" 
                                        id="login-password" 
                                        name="password"
                                        class="form-input w-full pl-12 pr-12 py-3 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500" 
                                        placeholder="••••••••"
                                        required
                                        minlength="6"
                                    >
                                    <i class="fas fa-lock input-icon absolute left-4 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
                                    <button type="button" class="absolute right-4 top-1/2 transform -translate-y-1/2 text-gray-400 hover:text-blue-500" onclick="togglePasswordVisibility('login-password', this)">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                </div>
                                <p class="text-gray-500 text-sm mt-1">Mínimo 6 caracteres</p>
                            </div>
                            
                            <!-- Opciones adicionales -->
                            <div class="flex flex-col sm:flex-row justify-between items-center mb-8">
                                <div class="flex items-center mb-4 sm:mb-0">
                                    <input 
                                        type="checkbox" 
                                        id="remember-me" 
                                        name="remember"
                                        class="h-4 w-4 text-blue-600 rounded focus:ring-blue-500"
                                    >
                                    <label for="remember-me" class="ml-2 text-gray-700">Recordar mi sesión</label>
                                </div>
                                <a href="#" class="text-blue-600 hover:text-blue-800 font-medium">
                                    ¿Olvidaste tu contraseña?
                                </a>
                            </div>
                            
                            <!-- Botón de envío -->
                            <button 
                                type="submit" 
                                class="btn-primary w-full bg-blue-600 text-white font-bold py-3 px-4 rounded-lg hover:bg-blue-700 shadow-md"
                            >
                                <i class="fas fa-sign-in-alt mr-2"></i>Iniciar Sesión
                            </button>
                            
                            <!-- Separador -->
                            <div class="separator my-8">
                                <span class="bg-white px-4 text-gray-500">o continua con</span>
                            </div>
                            
                            <!-- Login con redes sociales -->
                            <div class="mb-6">
                                <div class="grid grid-cols-3 gap-4">
                                    <button type="button" class="flex items-center justify-center py-3 bg-red-50 text-red-600 rounded-lg hover:bg-red-100 transition duration-300">
                                        <i class="fab fa-google mr-2"></i> Google
                                    </button>
                                    <button type="button" class="flex items-center justify-center py-3 bg-blue-50 text-blue-600 rounded-lg hover:bg-blue-100 transition duration-300">
                                        <i class="fab fa-facebook mr-2"></i> Facebook
                                    </button>
                                    <button type="button" class="flex items-center justify-center py-3 bg-gray-100 text-gray-700 rounded-lg hover:bg-gray-200 transition duration-300">
                                        <i class="fab fa-microsoft mr-2"></i> Microsoft
                                    </button>
                                </div>
                            </div>
                            
                            <!-- Enlace al formulario de registro -->
                            <div class="text-center pt-6 border-t border-gray-200">
                                <p class="text-gray-600">¿No tienes una cuenta? 
                                    <a href="#register-form" class="text-blue-600 hover:text-blue-800 font-bold">Regístrate aquí</a>
                                </p>
                            </div>
                        </form>
                    </div>
                    
                    <!-- Información adicional para login -->
                    <div class="mt-8 p-6 bg-blue-50 rounded-xl border border-blue-200">
                        <h4 class="font-bold text-blue-800 mb-2 flex items-center">
                            <i class="fas fa-info-circle mr-2"></i>Información importante
                        </h4>
                        <ul class="text-blue-700 text-sm space-y-1">
                            <li><i class="fas fa-check-circle mr-2"></i>Tu cuenta te permite reservar libros y gestionar préstamos</li>
                            <li><i class="fas fa-check-circle mr-2"></i>Acceso a recursos digitales exclusivos para miembros</li>
                            <li><i class="fas fa-check-circle mr-2"></i>Recibir notificaciones de eventos y novedades</li>
                        </ul>
                    </div>
                </div>
                
                <!-- Formulario de Registro -->
                <div id="register-form" class="lg:w-1/2">
                    <div class="bg-white rounded-2xl shadow-xl p-8 form-card">
                        <div class="text-center mb-8">
                            <div class="inline-flex items-center justify-center w-16 h-16 rounded-full bg-green-100 mb-4">
                                <i class="fas fa-user-plus text-2xl text-green-600"></i>
                            </div>
                            <h3 class="text-2xl font-bold text-gray-800">Crear Cuenta</h3>
                            <p class="text-gray-600 mt-2">Regístrate para acceder a todos los servicios</p>
                        </div>
                        
                        <form action="{{ route('register') }}" method="POST">
                        @csrf    
                        <!-- Campos de nombre y apellido en una fila -->
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                                <!-- Nombre -->
                                <div>
                                    <label for="name" class="block text-gray-700 font-medium mb-2">
                                        <i class="fas fa-user text-blue-500 mr-2"></i>Nombre
                                    </label>
                                    <div class="relative">
                                        <input 
                                            type="text" 
                                            id="name" 
                                            name="name"
                                            class="form-input w-full pl-12 pr-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500" 
                                            placeholder="Juan"
                                            required
                                        >
                                        <i class="fas fa-user input-icon absolute left-4 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
                                    </div>
                                </div>
                                
                            </div>
                            
                            <!-- Campo de email -->
                            <div class="mb-6">
                                <label for="register-email" class="block text-gray-700 font-medium mb-2">
                                    <i class="fas fa-envelope text-blue-500 mr-2"></i>Correo Electrónico
                                </label>
                                <div class="relative">
                                    <input 
                                        type="email" 
                                        id="register-email" 
                                        name="email"
                                        class="form-input w-full pl-12 pr-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500" 
                                        placeholder="ejemplo@correo.com"
                                        required
                                    >
                                    <i class="fas fa-envelope input-icon absolute left-4 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
                                </div>
                                <p class="text-gray-500 text-sm mt-1">Utiliza un email que verifiques regularmente</p>
                            </div>
                            
                            <!-- Campos de contraseña -->
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
                                <!-- Contraseña -->
                                <div>
                                    <label for="password" class="block text-gray-700 font-medium mb-2">
                                        <i class="fas fa-lock text-blue-500 mr-2"></i>Contraseña
                                    </label>
                                    <div class="relative">
                                        <input 
                                            type="password" 
                                            id="password" 
                                            name="password"
                                            class="form-input w-full pl-12 pr-12 py-3 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500" 
                                            placeholder="••••••••"
                                            required
                                            minlength="6"
                                        >
                                        <i class="fas fa-lock input-icon absolute left-4 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
                                        <button type="button" class="absolute right-4 top-1/2 transform -translate-y-1/2 text-gray-400 hover:text-blue-500" onclick="togglePasswordVisibility('register-password', this)">
                                            <i class="fas fa-eye"></i>
                                        </button>
                                    </div>
                                    <p class="text-gray-500 text-sm mt-1">Mínimo 6 caracteres</p>
                                </div>
                                
                                <!-- Repetir contraseña -->
                                <div>
                                    <label for="password_confirmation" class="block text-gray-700 font-medium mb-2">
                                        <i class="fas fa-lock text-blue-500 mr-2"></i>Confirmar Contraseña
                                    </label>
                                    <div class="relative">
                                        <input 
                                            type="password" 
                                            id="password_confirmation" 
                                            name="password_confirmation"
                                            class="form-input w-full pl-12 pr-12 py-3 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500" 
                                            placeholder="••••••••"
                                            required
                                            minlength="6"
                                        >
                                        <i class="fas fa-lock input-icon absolute left-4 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
                                        <button type="button" class="absolute right-4 top-1/2 transform -translate-y-1/2 text-gray-400 hover:text-blue-500" onclick="togglePasswordVisibility('register-password-confirm', this)">
                                            <i class="fas fa-eye"></i>
                                        </button>
                                    </div>
                                    <p class="text-gray-500 text-sm mt-1">Debe coincidir con la contraseña</p>
                                </div>
                            </div>
                            
                            <!-- Términos y condiciones -->
                            <div class="mb-8 p-4 bg-gray-50 rounded-lg border border-gray-200">
                                <div class="flex items-start">
                                    <input 
                                        type="checkbox" 
                                        id="terms" 
                                        name="terms"
                                        class="h-4 w-4 text-blue-600 rounded focus:ring-blue-500 mt-1"
                                        required
                                    >
                                    <label for="terms" class="ml-3 text-gray-700">
                                        Acepto los 
                                        <a href="#" class="text-blue-600 hover:text-blue-800 font-medium">Términos de Servicio</a> 
                                        y la 
                                        <a href="#" class="text-blue-600 hover:text-blue-800 font-medium">Política de Privacidad</a> 
                                        de la Biblioteca Central. Confirmo que soy mayor de 14 años.
                                    </label>
                                </div>
                                
                                <div class="flex items-start mt-4">
                                    <input 
                                        type="checkbox" 
                                        id="newsletter" 
                                        name="newsletter"
                                        class="h-4 w-4 text-blue-600 rounded focus:ring-blue-500 mt-1"
                                    >
                                    <label for="newsletter" class="ml-3 text-gray-700">
                                        Deseo recibir información sobre novedades, eventos y promociones de la biblioteca.
                                    </label>
                                </div>
                            </div>
                            
                            <!-- Botón de envío -->
                            <button 
                                type="submit" 
                                class="btn-primary w-full bg-green-600 text-white font-bold py-3 px-4 rounded-lg hover:bg-green-700 shadow-md"
                            >
                                <i class="fas fa-user-plus mr-2"></i>Crear Cuenta
                            </button>
                            
                            <!-- Enlace al formulario de login -->
                            <div class="text-center pt-6 border-t border-gray-200">
                                <p class="text-gray-600">¿Ya tienes una cuenta? 
                                    <a href="#login-form" class="text-blue-600 hover:text-blue-800 font-bold">Inicia sesión aquí</a>
                                </p>
                            </div>
                        </form>
                    </div>
                    
                    <!-- Beneficios de registrarse -->
                    <div class="mt-8 p-6 bg-green-50 rounded-xl border border-green-200">
                        <h4 class="font-bold text-green-800 mb-3 flex items-center">
                            <i class="fas fa-gift mr-2"></i>Beneficios de ser miembro
                        </h4>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div class="flex items-start">
                                <i class="fas fa-book text-green-600 mt-1 mr-3"></i>
                                <div>
                                    <h5 class="font-medium text-green-700">Préstamo de libros</h5>
                                    <p class="text-green-600 text-sm">Hasta 5 libros simultáneos por 21 días</p>
                                </div>
                            </div>
                            <div class="flex items-start">
                                <i class="fas fa-desktop text-green-600 mt-1 mr-3"></i>
                                <div>
                                    <h5 class="font-medium text-green-700">Recursos digitales</h5>
                                    <p class="text-green-600 text-sm">Acceso a bases de datos y e-books</p>
                                </div>
                            </div>
                            <div class="flex items-start">
                                <i class="fas fa-calendar-alt text-green-600 mt-1 mr-3"></i>
                                <div>
                                    <h5 class="font-medium text-green-700">Eventos exclusivos</h5>
                                    <p class="text-green-600 text-sm">Talleres, clubes de lectura y más</p>
                                </div>
                            </div>
                            <div class="flex items-start">
                                <i class="fas fa-bell text-green-600 mt-1 mr-3"></i>
                                <div>
                                    <h5 class="font-medium text-green-700">Reservas anticipadas</h5>
                                    <p class="text-green-600 text-sm">Reserva libros antes de su publicación</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    @endsection