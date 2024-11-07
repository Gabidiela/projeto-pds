<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Conexão Musical</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}"> <!-- Para os estilos adicionais -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.8.1/font/bootstrap-icons.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">


    <style>
        body {
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 0;
            background-color: #F5F4F6;
            font-family: 'montserrat', sans-serif;
        }
        .login-container {
            display: flex;
            width: 100%;
            height: 100vh;
            overflow: hidden;
        }
        .login-form {
            flex: 1;
            background-color: #F5F4F6;
            display: flex;
            flex-direction: column;
            justify-content: center;
            position: relative;
        }
        .logo-container {
            position: absolute;
            top: 20px;
            left: 20px;
            display: flex;
            align-items: center;
        }
        .logo {
            width: 40px;
            margin-right: 10px;
        }
        .logo-texto {
            font-size: 1.25rem;
            font-weight: 500;
            color: #333;
        }
        .login-image {
            flex: 1;
            background: url("{{ asset('img/piano.png') }}") no-repeat center center;
            background-size: cover;
            height: 100%;
        }
        .login-form-content {
            width: 100%;
            max-width: 450px;
            margin: 0 auto;
        }
        .form-control:focus {
            box-shadow: none;
            border-color: #6c757d;
        }

        .form-control{
            border-radius: 13px;
            border-color: #6c757d;
            border-left: none;
            background-color: #F5F4F6; /* Fundo igual ao campo de entrada */
            font-size: 1.1rem;
            max-width: 450px;
            align-items: center;

        }

        .input-group-text {
            border-right: none; /* Remove a borda direita do ícone */
            border-color: #6c757d;
            background-color: #F5F4F6; /* Fundo igual ao campo de entrada */
            border-radius: 10px;
            height: 50px;
        }

        .form-label {
            font-weight: 300;
        }

        .btn-login {
            background-color: black;
            color: white;
            width: 100%;
            font-weight: bold;
            max-width: 450px;
            border-radius: 10px;
            height: 50px;
            box-shadow: 2px 5px 5px 0px rgba(0,0,0,0.2);
            -webkit-box-shadow: 2px 5px 5px 0px rgba(0,0,0,0.2);
            -moz-box-shadow: 2px 5px 5px 0px rgba(0,0,0,0.2);
        }

        .btn-login:hover {
            background-color: #fff;
            border: 1px solid #333;
            color: black;
        
        }

        .form-check-label{
            font-weight: 300;
            border-color: #333;
        }

        .forgot-password {
            color: #000;
            font-size: 0.9rem;
        }
        .forgot-password:hover {
            color: #495057;
        }
        .register-link {
            position: absolute; 
            bottom: 40px;
            padding-left: 60px;
            width: 100%;
        }

        .text-muted {
            font-size: 1.0rem;
        }
    </style>
</head>
<body>

<div class="login-container">
    <div class="login-form">
         <!-- Logo no canto superior esquerdo -->
        <div class="logo-container">
            <img src="{{ asset('img/cm-logo-p.png') }}" alt="Logo Conexão Musical" class="logo">
            <span class="logo-texto" style="font-weight: 700; padding-right: 5px">Conexão </span><span class="logo-texto" style="font-weight: 300"> Musical </span>
        </div>

        <!-- Conteúdo do Formulário -->
        <div class="login-form-content">
            <div class="text-center mb-4">
                <h2 class="fw" style="font-weight: 700;">Seja bem-vindo!</h2>
                <p class="text-muted" style="font-weight: 400; font-size: 24px">Você está a um passo de aprender!</p>
            </div>
            <form action="{{ route('login') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="bi bi-envelope"></i></span>
                        <input type="email" class="form-control" id="email" name="email" placeholder="Insira seu email" required>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Senha</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="bi bi-lock"></i></span>
                        <input type="password" class="form-control" id="password" name="password" placeholder="Insira sua senha" required>
                    </div>
                </div>
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="remember" name="remember">
                        <label class="form-check-label" for="remember">Lembre de mim</label>
                    </div>
                    <a href="{{ route('password.request') }}" class="forgot-password">Esqueci minha senha</a>
                </div>
                <button type="submit" class="btn btn-login">Fazer Login</button>
            </form>
            <div class="text-left register-link">
                <p class="text-muted">Ainda não tem uma conta? <a href="{{ route('register') }}" class="text-decoration-underline" style="color: #000; font-weight:500">Cadastre-se</a></p>
            </div>
        </div>
    </div>
    <div class="login-image"></div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>