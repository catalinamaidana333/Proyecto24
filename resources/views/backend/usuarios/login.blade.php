<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8"/>
  <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
  <title>NEOGAUCHO | VintagePRODUCTS contacto</title>

  <link rel="stylesheet" href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Epilogue:ital,wght@0,400;0,700;0,900;1,900&family=Manrope:wght@400;500;700&family=Space+Grotesk:wght@500;700&display=swap" rel="stylesheet"/>
  <!-- Material Icons -->
  <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet"/>

  
</head>
<body>
    <div class="login-container">
        <!-- LEFT SIDE: FORM -->
        <section class="login-form-section">
            <!-- Main Content -->
            <div class="login-content">
                <!-- Header -->
                <div class="login-header">
                    <h1>BIENVENIDO<br>DE VUELTA</h1>
                    <p>Accede a tu cuenta y gestiona tus compras</p>
                </div>
 
                <!-- Error Messages -->
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <strong>Error:</strong>
                        @foreach ($errors->all() as $error)
                            <div>{{ $error }}</div>
                        @endforeach
                    </div>
                @endif
 
                <!-- Login Form -->
                <form method="POST" action="{{ route('autenticar') }}" class="login-form">
                    @csrf
 
                    <!-- Email Field -->
                    <div class="form-group">
                        <label class="form-label" for="email">Correo Electrónico</label>
                        <input
                            type="email"
                            id="email"
                            name="email"
                            class="form-control"
                            placeholder="tu@email.com"
                            value="{{ old('email') }}"
                            required
                        />
                        @error('email')
                            <small class="text-danger d-block mt-2">{{ $message }}</small>
                        @enderror
                    </div>
 
                    <!-- Password Field -->
                    <div class="form-group">
                        <div class="form-label-row">
                            <label class="form-label" for="password" style="margin: 0;">Contraseña</label>
                            <a href="#" class="forgot-link">¿Olvidaste?</a>
                        </div>
                        <div class="password-wrapper">
                            <input
                                type="password"
                                id="password"
                                name="password"
                                class="form-control"
                                placeholder="••••••••"
                                required
                            />
                            <button type="button" class="password-toggle" onclick="togglePassword()">
                                👁️
                            </button>
                        </div>
                        @error('password')
                            <small class="text-danger d-block mt-2">{{ $message }}</small>
                        @enderror
                    </div>
 
                    <!-- Submit Button -->
                    <button type="submit" class="btn-submit">
                        Iniciar Sesión
                    </button>
                </form>
 
                <!-- Divider -->
                <div class="divider-section">
                    <div class="divider">
                        <div class="divider-line"></div>
                        <span class="divider-text">Autenticación Digital</span>
                        <div class="divider-line"></div>
                    </div>
                </div>
 
                <!-- Sign Up Link -->
                <p class="signup-link-text">
                    ¿No tienes cuenta?
                    <a href="{{ route('register') }}">Únete Ahora</a>
                </p>
            </div>
 
            <!-- Footer -->
            <footer class="login-footer">
                <span>© 2024 NEOGAUCHO</span>
                <div class="footer-links">
                    <a href="#">Privacidad</a>
                    <a href="#">Términos</a>
                </div>
            </footer>
        </section>
 
        <!-- RIGHT SIDE: IMAGE SECTION -->
        <section class="login-image-section">
            <div class="image-container">
                <div class="image-placeholder">
                    <img src="{{ asset('images/card-port-contact.jpg') }}" >
                </div>
 
                <!-- SACA ESTOFeatured Card -->
                
            </div>
        </section>
    </div>
 
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        function togglePassword() {
            const passwordInput = document.getElementById('password');
            const toggleBtn = document.querySelector('.password-toggle');
 
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                toggleBtn.textContent = '🙈';
            } else {
                passwordInput.type = 'password';
                toggleBtn.textContent = '👁️';
            }
        }
    </script>
</body>
</html>
 