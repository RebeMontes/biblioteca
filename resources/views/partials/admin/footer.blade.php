<!-- Footer -->
    <footer class="bg-white border-t border-gray-200 py-4 px-6 mt-auto">
        <div class="flex flex-col md:flex-row justify-between items-center text-sm text-gray-500">
            <div class="mb-2 md:mb-0">
                &copy; {{ date('Y') }} <strong>Biblioteca Digital</strong>. Todos los derechos reservados.
            </div>
            
            <div class="flex space-x-4">
                <a href="#" class="hover:text-blue-600 transition">Soporte</a>
                <a href="#" class="hover:text-blue-600 transition">Política de Privacidad</a>
                <div class="flex space-x-3 ml-4 border-l pl-4">
                    <a href="#" class="text-gray-400 hover:text-blue-600"><i class="fab fa-facebook"></i></a>
                    <a href="#" class="text-gray-400 hover:text-blue-400"><i class="fab fa-twitter"></i></a>
                </div>
            </div>
        </div>
    </footer>

    <!-- JavaScript Vanilla -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Elementos del DOM
            const hamburgerBtn = document.getElementById('hamburgerBtn');
            const sidebar = document.getElementById('sidebar');
            const overlay = document.getElementById('overlay');
            const navLinks = document.querySelectorAll('.nav-link');
            const sidebarLinks = document.querySelectorAll('.sidebar-link');
            const pageContents = document.querySelectorAll('.page-content');
            const pageTitle = document.getElementById('pageTitle');
            const logoutBtn = document.getElementById('logoutBtn');
            
            // Estado del sidebar
            let sidebarOpen = false;
    }
            
            // Función para alternar el sidebar en móvil
            function toggleSidebar() {
                sidebarOpen = !sidebarOpen;
                
                if (sidebarOpen) {
                    sidebar.classList.remove('hidden');
                    sidebar.classList.add('block');
                    overlay.classList.remove('hidden');
                    hamburgerBtn.classList.add('active');
                    // Desplazar sidebar a la vista
                    setTimeout(() => {
                        sidebar.style.transform = 'translateX(0)';
                    }, 10);
                } else {
                    sidebar.style.transform = 'translateX(-100%)';
                    overlay.classList.add('hidden');
                    hamburgerBtn.classList.remove('active');
                    // Esperar a que termine la transición antes de ocultar
                    setTimeout(() => {
                        if (!sidebarOpen) {
                            sidebar.classList.remove('block');
                            sidebar.classList.add('hidden');
                        }
                    }, 300);
                }
            }
            
            // Función para cambiar de página
            function changePage(pageId) {
                // Ocultar todos los contenidos
                pageContents.forEach(content => {
                    content.classList.add('hidden');
                });
                
                // Mostrar el contenido correspondiente
                const activeContent = document.getElementById(`${pageId}Content`);
                if (activeContent) {
                    activeContent.classList.remove('hidden');
                }
                
                // Actualizar el título de la página
                const pageTitles = {
                    'inicio': 'Inicio',
                    'usuarios': 'Gestión de Usuarios',
                    'libros': 'Gestión de Libros',
                    'prestamos': 'Gestión de Préstamos',
                    'reportes': 'Reportes',
                    'salir': 'Cerrar Sesión'
                };
                
                pageTitle.textContent = pageTitles[pageId] || 'Inicio';
                
                // Cerrar sidebar en móvil al cambiar de página
                if (window.innerWidth < 768 && sidebarOpen) {
                    toggleSidebar();
                }
            }
            
            // Event listeners
            hamburgerBtn.addEventListener('click', toggleSidebar);
            
            overlay.addEventListener('click', function() {
                if (sidebarOpen) {
                    toggleSidebar();
                }
            });
            
            // Navegación por los enlaces del header
            navLinks.forEach(link => {
                link.addEventListener('click', function(e) {
                    e.preventDefault();
                    const pageId = this.getAttribute('data-page');
                    changePage(pageId);
                });
            });
            
            // Navegación por los enlaces del sidebar
            sidebarLinks.forEach(link => {
                link.addEventListener('click', function(e) {
                    e.preventDefault();
                    const pageId = this.getAttribute('data-page');
                    changePage(pageId);
                });
            });
            
            // Botón de salir
            if (logoutBtn) {
                logoutBtn.addEventListener('click', function logout()) {
                    // En una aplicación real, aquí iría la lógica para cerrar sesión
                    changePage(function() {
                        window.location.href = "{{ route('logout') }}";
                });
            }
            
            // Cerrar sidebar al redimensionar la ventana si se hace más grande
            window.addEventListener('resize', function() {
                if (window.innerWidth >= 768 && sidebarOpen) {
                    toggleSidebar();
                }
            });
            
            // Inicialización: establecer página activa
            changePage('inicio');
        });
    </script>
</body>
</html>