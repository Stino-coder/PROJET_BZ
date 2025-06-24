<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion - Système de Paie KAMOA</title>
    <style>
        /* Variables CSS */
        :root {
            --kamoa-primary: #ec2f3f;
            --kamoa-secondary: rgb(32,25,31);
            --text-dark: #333;
            --text-light: #f8f9fa;
        }

        /* Reset et Base */
        body, html {
            margin: 0;
            padding: 0;
            height: 100%;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        /* Conteneur Principal */
        .login-container {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
            background: linear-gradient(135deg, #f5f7fa 0%, #e4e8eb 100%);
            padding: 2rem;
        }

        /* En-tête avec Logo */
        .login-branding {
            text-align: center;
            margin-bottom: 2.5rem;
            animation: fadeInDown 0.8s;
        }

        .login-branding .logo {
            height: 80px;
            margin-bottom: 1rem;
            filter: drop-shadow(0 2px 4px rgba(0,0,0,0.1));
            transition: transform 0.3s ease;
        }

        .login-branding .logo:hover {
            transform: scale(1.05);
        }

        .login-branding h1 {
            color: var(--kamoa-primary);
            font-weight: 600;
            font-size: 1.8rem;
            margin: 0;
        }

        /* Formulaire */
        .login-form {
            background: white;
            padding: 2.5rem;
            border-radius: 12px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
            width: 100%;
            max-width: 420px;
            animation: fadeInUp 0.8s;
        }

        .form-group {
            margin-bottom: 1.5rem;
        }

        .form-group label {
            display: block;
            margin-bottom: 0.5rem;
            color: var(--text-dark);
            font-weight: 500;
        }

        .form-group input {
            width: 100%;
            padding: 0.8rem 1rem;
            border: 1px solid #ddd;
            border-radius: 8px;
            font-size: 1rem;
            transition: border-color 0.3s, box-shadow 0.3s;
        }

        .form-group input:focus {
            border-color: var(--kamoa-primary);
            box-shadow: 0 0 0 3px rgba(44, 90, 160, 0.2);
            outline: none;
        }

        /* Options */
        .form-options {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 1.5rem;
            font-size: 0.9rem;
        }

        .form-options a {
            color: var(--kamoa-primary);
            text-decoration: none;
            transition: color 0.3s;
        }

        .form-options a:hover {
            color: var(--kamoa-secondary);
            text-decoration: underline;
        }

        /* Bouton */
        .login-button {
            width: 100%;
            padding: 1rem;
            background-color: var(--kamoa-primary);
            color: white;
            border: none;
            border-radius: 8px;
            font-size: 1rem;
            font-weight: 600;
            cursor: pointer;
            transition: background-color 0.3s, transform 0.2s;
        }

        .login-button:hover {
            background-color: #ec2f3f;
            transform: translateY(-2px);
        }

        /* Animations */
        @keyframes fadeInDown {
            from {
                opacity: 0;
                transform: translateY(-20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Responsive */
        @media (max-width: 576px) {
            .login-form {
                padding: 1.5rem;
            }
            
            .login-branding h1 {
                font-size: 1.5rem;
            }
        }

        /* Dark Mode Optionnel */
        @media (prefers-color-scheme: dark) {
            .login-container {
                background: linear-gradient(135deg, #1a1a2e 0%, #16213e 100%);
            }
            
            .login-form {
                background: #1e293b;
            }
            
            .form-group label, 
            .login-branding h1 {
                color: var(--text-light);
            }
            
            .form-group input {
                background: #334155;
                border-color: #475569;
                color: white;
            }
            
            .form-options a {
                color: var(--kamoa-secondary);
            }
        }
    </style>
</head>
<body>
    <div class="login-container">
        <div class="login-branding">
        
            <img src="{{ asset('image/kamoa_logo1.png') }}" alt="Logo KAMOA" class="logo">
            <h1>PAYROLL KAMOA</h1>
            
        </div>
        
        <form method="POST" action="{{('admin') }}" class="login-form">
            @csrf
            
            <div class="form-group">
                <label for="email">Adresse Email</label>
                <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus>
                @error('email')
                    <span class="error-message">{{ $message }}</span>
                @enderror
            </div>
            
            <div class="form-group">
                <label for="password">Mot de Passe</label>
                <input id="password" type="password" name="password" required>
                @error('password')
                    <span class="error-message">{{ $message }}</span>
                @enderror
            </div>
            
            <div class="form-options">
                <label>
                    <input type="checkbox" name="remember"> Se souvenir de moi
                </label>
                <a href="{{ ('admin') }}">Mot de passe oublié ?</a>
            </div>
            
            <button type="submit" class="login-button">Se Connecter</button>
        </form>
    </div>
</body>
</html>