<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Biblioteca Central - Login y Registro</title>
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
        
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
       
    </style>
</head>
<body class="font-sans bg-gray-50">
   
@yield('content')
@include('partials.auth.footer')