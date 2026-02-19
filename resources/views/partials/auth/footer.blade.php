    <!-- Footer -->
    <footer class="bg-gray-800 text-white py-10">
        <div class="container mx-auto px-4">
            <div class="flex flex-col md:flex-row justify-between items-center">
                <div class="mb-8 md:mb-0">
                    <div class="flex items-center mb-4">
                        <i class="fas fa-book text-3xl text-blue-400 mr-3"></i>
                        <div>
                            <h2 class="text-2xl font-bold">Biblioteca Central</h2>
                            <p class="text-gray-400">Conocimiento sin fronteras</p>
                        </div>
                    </div>
                    <p class="text-gray-400 max-w-md">Una institución dedicada a promover la lectura y facilitar el acceso a la información para el desarrollo cultural de nuestra comunidad.</p>
                </div>
                
                <div class="text-center md:text-right">
                    <h3 class="text-lg font-bold mb-4">Contacto</h3>
                    <div class="space-y-2 text-gray-400">
                        <p><i class="fas fa-map-marker-alt mr-2"></i> Av. Conocimiento 123, Centro</p>
                        <p><i class="fas fa-phone mr-2"></i> (123) 456-7890</p>
                        <p><i class="fas fa-envelope mr-2"></i> info@bibliotecacentral.org</p>
                    </div>
                    <div class="flex justify-center md:justify-end space-x-4 mt-6">
                        <a href="#" class="text-gray-400 hover:text-white text-xl"><i class="fab fa-facebook"></i></a>
                        <a href="#" class="text-gray-400 hover:text-white text-xl"><i class="fab fa-twitter"></i></a>
                        <a href="#" class="text-gray-400 hover:text-white text-xl"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
            
            <div class="border-t border-gray-700 mt-10 pt-6 text-center text-gray-400">
                <p>&copy; 2023 Biblioteca Central. Todos los derechos reservadossss.</p>
                <p class="mt-2 text-sm">Diseño responsivo con Tailwind CSS</p>
            </div>
        </div>
    </footer>


    <!-- Solo el JavaScript necesario para funcionalidades básicas -->
    <script>
        // Funcionalidad para mostrar/ocultar menú móvil
        document.getElementById('mobile-menu-btn').addEventListener('click', function() {
            const mobileMenu = document.getElementById('mobile-menu');
            const icon = this.querySelector('i');
            
            mobileMenu.classList.toggle('hidden');
            icon.className = mobileMenu.classList.contains('hidden') ? 'fas fa-bars' : 'fas fa-times';
        });
        
        // Cerrar menú móvil al hacer clic en un enlace
        document.querySelectorAll('#mobile-menu a').forEach(link => {
            link.addEventListener('click', function() {
                document.getElementById('mobile-menu').classList.add('hidden');
                document.querySelector('#mobile-menu-btn i').className = 'fas fa-bars';
            });
        });
        
        // Función para mostrar/ocultar contraseña (compartida)
        function togglePasswordVisibility(passwordFieldId, button) {
            const passwordField = document.getElementById(passwordFieldId);
            const icon = button.querySelector('i');
            
            if (passwordField.type === 'password') {
                passwordField.type = 'text';
                icon.className = 'fas fa-eye-slash';
            } else {
                passwordField.type = 'password';
                icon.className = 'fas fa-eye';
            }
        }
        
        // Navegación suave entre formularios
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function(e) {
                e.preventDefault();
                
                const targetId = this.getAttribute('href');
                if (targetId === '#') return;
                
                const targetElement = document.querySelector(targetId);
                if (targetElement) {
                    window.scrollTo({
                        top: targetElement.offsetTop - 100,
                        behavior: 'smooth'
                    });
                    
                    // Actualizar navegación activa en escritorio
                    if (window.innerWidth >= 768) {
                        document.querySelectorAll('nav a').forEach(link => {
                            link.classList.remove('text-blue-600', 'border-b-2', 'border-blue-600');
                            link.classList.add('text-gray-600');
                        });
                        this.classList.remove('text-gray-600');
                        this.classList.add('text-blue-600', 'border-b-2', 'border-blue-600');
                    }
                }
            });
        });
        
        // Validación básica de formularios al enviar
        document.querySelectorAll('form').forEach(form => {
            form.addEventListener('submit', function(e) {
                // Validación básica para formulario de registro
                if (this.contains(document.getElementById('register-password-confirm'))) {
                    const password = document.getElementById('register-password').value;
                    const confirmPassword = document.getElementById('register-password-confirm').value;
                    
                    if (password !== confirmPassword) {
                        e.preventDefault();
                        alert('Las contraseñas no coinciden. Por favor, verifica que sean iguales.');
                        document.getElementById('register-password-confirm').focus();
                        return;
                    }
                }
                
                
            });
        });
    </script>
</body>
</html>