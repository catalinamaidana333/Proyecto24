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
<div class="container-registro">
    <div class="visual-section">
        <div class="visual-content">
            <h1>Únete ahora</h1>
            <p>Crea tu cuenta y descubre un mundo de posibilidades. Acceso rápido, seguro y sin complicaciones.</p>
            
            <div class="features">
                <div class="feature">
                    <div class="feature-icon">✓</div>
                    <div class="feature-text">
                        <h3>Acceso instantáneo</h3>
                        <p>Comienza a usar tu cuenta en segundos</p>
                    </div>
                </div>
                
                <div class="feature">
                    <div class="feature-icon">🔒</div>
                    <div class="feature-text">
                        <h3>100% seguro</h3>
                        <p>Encriptación de nivel bancario para tus datos</p>
                    </div>
                </div>
                
                <div class="feature">
                    <div class="feature-icon">⚡</div>
                    <div class="feature-text">
                        <h3>Súper rápido</h3>
                        <p>Experiencia fluida y sin interrupciones</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="form-section">
        <div class="form-header">
            <h2>Crear cuenta</h2>
            <p>Completa los campos para comenzar</p>
        </div>
        
        <form id="registerForm" method="POST" action="{{ route('register') }}">
            @csrf
            
            <div class="form-row">
                <div class="form-group">
                    <label for="firstName">Nombre</label>
                    <input 
                        type="text" 
                        id="firstName" 
                        name="firstName" 
                        placeholder="Tu nombre" 
                        value="{{ old('firstName') }}"
                        @error('firstName') is-invalid @enderror
                        required
                    >
                    @error('firstName')
                        <span class="error-message">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="lastName">Apellido</label>
                    <input 
                        type="text" 
                        id="lastName" 
                        name="lastName" 
                        placeholder="Tu apellido" 
                        value="{{ old('lastName') }}"
                        @error('lastName') is-invalid @enderror
                        required
                    >
                    @error('lastName')
                        <span class="error-message">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            
            <div class="form-group">
                <label for="email">Correo electrónico</label>
                <input 
                    type="email" 
                    id="email" 
                    name="email" 
                    placeholder="tu@email.com" 
                    value="{{ old('email') }}"
                    @error('email') is-invalid @enderror
                    required
                >
                @error('email')
                    <span class="error-message">{{ $message }}</span>
                @enderror
            </div>
            
            <div class="form-group">
                <label for="phone">Teléfono</label>
                <input 
                    type="tel" 
                    id="phone" 
                    name="phone" 
                    placeholder="+54 (000) 0000-0000" 
                    value="{{ old('phone') }}"
                    @error('phone') is-invalid @enderror
                    required
                >
                @error('phone')
                    <span class="error-message">{{ $message }}</span>
                @enderror
            </div>
            
            <div class="form-group">
                <label for="password">Contraseña</label>
                <div class="password-toggle">
                    <input 
                        type="password" 
                        id="password" 
                        name="password" 
                        placeholder="Mínimo 8 caracteres" 
                        @error('password') is-invalid @enderror
                        required
                    >
                    <button type="button" class="toggle-btn" onclick="togglePassword()">👁️</button>
                </div>
                @error('password')
                    <span class="error-message">{{ $message }}</span>
                @enderror
            </div>
            
            <div class="form-group">
                <label for="confirmPassword">Confirmar contraseña</label>
                <input 
                    type="password" 
                    id="confirmPassword" 
                    name="password_confirmation" 
                    placeholder="Repite tu contraseña" 
                    required
                >
            </div>
            
            <div class="checkbox-group">
                <input 
                    type="checkbox" 
                    id="terms" 
                    name="terms" 
                    @if(old('terms')) checked @endif
                    required
                >
                <label for="terms">
                    Acepto los 
                    <a href="#" class="terms-link">términos y condiciones</a> 
                    y la 
                    <a href="#" class="terms-link">política de privacidad</a>
                </label>
            </div>
            
            @if ($errors->any())
                <div class="alert alert-danger" style="margin: 1rem 0; padding: 1rem; background: rgba(181, 19, 64, 0.1); border: 1px solid rgba(181, 19, 64, 0.3); border-radius: var(--radius-card); color: var(--error);">
                    <ul style="margin: 0; padding-left: 1.5rem;">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            
            <button type="submit" class="submit-btn">Crear cuenta</button>
            
            <div class="login-link">
                ¿Ya tienes cuenta? <a href="{{ route('login') }}">Inicia sesión</a>
            </div>
        </form>
    </div>
</div>

<style>
    .container-registro {
        display: grid;
        grid-template-columns: 1fr 1fr;
        min-height: 100vh;
        gap: 0;
        align-items: stretch;
    }
    
    .visual-section {
        background: linear-gradient(135deg, var(--primary) 0%, var(--primary-dim) 100%);
        padding: 3rem;
        display: flex;
        flex-direction: column;
        justify-content: center;
        position: relative;
        overflow: hidden;
    }
    
    .visual-section::before {
        content: '';
        position: absolute;
        top: -50%;
        right: -10%;
        width: 500px;
        height: 500px;
        background: rgba(255, 112, 158, 0.1);
        border-radius: 50%;
    }
    
    .visual-section::after {
        content: '';
        position: absolute;
        bottom: -30%;
        left: -5%;
        width: 400px;
        height: 400px;
        background: rgba(255, 112, 158, 0.08);
        border-radius: 50%;
    }
    
    .visual-content {
        position: relative;
        z-index: 1;
    }
    
    .visual-content h1 {
        font-family: var(--font-headline);
        font-size: 3.5rem;
        font-weight: 700;
        color: white;
        margin: 0 0 1rem 0;
        letter-spacing: -0.02em;
        line-height: 1.1;
    }
    
    .visual-content p {
        font-size: 1.1rem;
        color: rgba(255, 255, 255, 0.85);
        margin: 0;
        max-width: 90%;
        line-height: 1.6;
    }
    
    .features {
        margin-top: 3rem;
        display: flex;
        flex-direction: column;
        gap: 1.5rem;
    }
    
    .feature {
        display: flex;
        gap: 1rem;
        align-items: flex-start;
    }
    
    .feature-icon {
        width: 48px;
        height: 48px;
        background: rgba(255, 112, 158, 0.25);
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-size: 1.5rem;
        flex-shrink: 0;
    }
    
    .feature-text h3 {
        font-family: var(--font-headline);
        font-size: 1rem;
        font-weight: 600;
        color: white;
        margin: 0 0 0.25rem 0;
    }
    
    .feature-text p {
        font-size: 0.9rem;
        color: rgba(255, 255, 255, 0.75);
        margin: 0;
    }
    
    .form-section {
        padding: 3rem;
        display: flex;
        flex-direction: column;
        justify-content: center;
        background: var(--surface);
    }
    
    .form-header h2 {
        font-family: var(--font-headline);
        font-size: 2.2rem;
        font-weight: 700;
        color: var(--on-surface);
        margin: 0 0 0.5rem 0;
        letter-spacing: -0.01em;
    }
    
    .form-header p {
        color: var(--on-surface-var);
        font-size: 0.95rem;
        margin: 0 0 2rem 0;
    }
    
    .form-group {
        margin-bottom: 1.5rem;
    }
    
    .form-group label {
        display: block;
        font-size: 0.85rem;
        font-weight: 600;
        color: var(--on-surface);
        margin-bottom: 0.5rem;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }
    
    .form-row {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 1rem;
    }
    
    .form-row .form-group {
        margin-bottom: 0;
    }
    
    input[type="text"],
    input[type="email"],
    input[type="tel"],
    input[type="password"],
    select {
        width: 100%;
        padding: 0.85rem 1rem;
        border: 1px solid var(--outline);
        border-radius: var(--radius-card);
        font-family: var(--font-body);
        font-size: 0.95rem;
        background: white;
        color: var(--on-surface);
        transition: all 0.2s ease;
    }
    
    input[type="text"]:focus,
    input[type="email"]:focus,
    input[type="tel"]:focus,
    input[type="password"]:focus,
    select:focus {
        outline: none;
        border-color: var(--primary);
        box-shadow: 0 0 0 3px rgba(117, 6, 60, 0.08);
    }
    
    input::placeholder {
        color: var(--on-surface-var);
    }
    
    input.is-invalid {
        border-color: var(--error);
    }
    
    input.is-invalid:focus {
        box-shadow: 0 0 0 3px rgba(181, 19, 64, 0.1);
    }
    
    .error-message {
        display: block;
        font-size: 0.8rem;
        color: var(--error);
        margin-top: 0.3rem;
    }
    
    .password-toggle {
        position: relative;
    }
    
    .toggle-btn {
        position: absolute;
        right: 1rem;
        top: 50%;
        transform: translateY(-50%);
        background: none;
        border: none;
        cursor: pointer;
        color: var(--on-surface-var);
        font-size: 1.1rem;
        padding: 0;
        width: auto;
        height: auto;
    }
    
    .toggle-btn:hover {
        color: var(--primary);
    }
    
    .checkbox-group {
        display: flex;
        align-items: center;
        gap: 0.75rem;
        margin: 1.5rem 0;
    }
    
    .checkbox-group input[type="checkbox"] {
        width: 18px;
        height: 18px;
        cursor: pointer;
        accent-color: var(--primary);
    }
    
    .checkbox-group label {
        margin: 0;
        font-size: 0.9rem;
        cursor: pointer;
        text-transform: none;
        letter-spacing: normal;
        font-weight: 400;
    }
    
    .terms-link {
        color: var(--primary);
        text-decoration: none;
        font-weight: 600;
    }
    
    .terms-link:hover {
        text-decoration: underline;
    }
    
    .submit-btn {
        width: 100%;
        padding: 1rem;
        background: linear-gradient(135deg, var(--primary) 0%, var(--primary-dim) 100%);
        color: white;
        border: none;
        border-radius: var(--radius-pill);
        font-family: var(--font-label);
        font-size: 0.95rem;
        font-weight: 700;
        letter-spacing: 0.5px;
        cursor: pointer;
        transition: all 0.3s ease;
        margin-top: 1.5rem;
        text-transform: uppercase;
    }
    
    .submit-btn:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 24px rgba(181, 0, 88, 0.25);
    }
    
    .submit-btn:active {
        transform: translateY(0);
    }
    
    .login-link {
        text-align: center;
        margin-top: 1.5rem;
        font-size: 0.9rem;
        color: var(--on-surface-var);
    }
    
    .login-link a {
        color: var(--primary);
        text-decoration: none;
        font-weight: 700;
    }
    
    .login-link a:hover {
        text-decoration: underline;
    }
    
    @media (max-width: 768px) {
        .container-registro {
            grid-template-columns: 1fr;
        }
        
        .visual-section {
            padding: 2rem;
            min-height: 40vh;
        }
        
        .visual-content h1 {
            font-size: 2.2rem;
        }
        
        .form-section {
            padding: 2rem;
        }
        
        .form-row {
            grid-template-columns: 1fr;
        }
    }
</style>

<script>
    function togglePassword() {
        const passwordInput = document.getElementById('password');
        const isPassword = passwordInput.type === 'password';
        passwordInput.type = isPassword ? 'text' : 'password';
    }
    
    document.getElementById('registerForm').addEventListener('submit', function(e) {
        const password = document.getElementById('password').value;
        const confirmPassword = document.getElementById('confirmPassword').value;
        
        if (password !== confirmPassword) {
            e.preventDefault();
            alert('Las contraseñas no coinciden');
            return;
        }
        
        if (password.length < 8) {
            e.preventDefault();
            alert('La contraseña debe tener mínimo 8 caracteres');
            return;
        }
    });
</script>

</body>
</html>
 