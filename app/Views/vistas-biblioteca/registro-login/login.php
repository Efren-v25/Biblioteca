<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Biblioteca Virtual UMC</title>
    <style>
        body {
            margin: 0;
            padding: 20px;
            min-height: 100vh;
            background-color: #B3E0FF;
            font-family: Arial, sans-serif;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .logo {
            width: 4rem;  /* 4x4 size */
            height: 4rem;
            position: fixed;
            top: 1rem;
            left: 1rem;
            object-fit: contain; /* Maintains aspect ratio */
            z-index: 1000; /* Ensures logo stays on top */
            border-radius: 50%; /* Optional: keeps the circular shape */
        }
        
        .container {
            background: white;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 400px;
            margin-top: 60px;
        }

        h1 {
            text-align: center;
            color: #000;
            font-size: 24px;
            margin: 0 0 10px 0;
        }

        .subtitle {
            text-align: center;
            color: #666;
            font-size: 14px;
            margin-bottom: 30px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 8px;
            color: #000;
            font-size: 14px;
        }

        input[type="email"],
        input[type="password"],
        input[type="text"] {
            width: 100%;
            padding: 8px;
            border: 1px solid #ddd;
            border-radius: 4px;
            box-sizing: border-box;
            font-size: 14px;
        }

        .password-container {
            position: relative;
        }

        .password-container .toggle-password {
            position: absolute;
            right: 10px;
            top: 50%;
            transform: translateY(-50%);
            cursor: pointer;
            color: #666;
        }

        .remember-forgot {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
            font-size: 14px;
        }

        .remember-me {
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .forgot-password {
            color: #666;
            text-decoration: none;
        }

        .forgot-password:hover {
            text-decoration: underline;
        }

        button {
            width: 100%;
            padding: 12px;
            background-color: #FFE97F;
            border: none;
            border-radius: 4px;
            color: #000;
            font-size: 14px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        button:hover {
            background-color: #FFD700;
        }

        .register-section {
            text-align: center;
            margin-top: 20px;
            padding-top: 20px;
            border-top: 1px solid #eee;
        }

        .register-section p {
            color: #666;
            font-size: 14px;
            margin: 0;
        }

        .register-link {
            color: #666;
            text-decoration: none;
            font-size: 14px;
        }

        .register-link:hover {
            text-decoration: underline;
        }
    </style>
    
</head>
<body>
    <img src="<?= base_url('img/logo_pergamo.jpeg')?>" alt="Logo" class="logo">
    
    <div class="container">
        <h1>Biblioteca Virtual UMC</h1>
        <p class="subtitle">Accede a tu cuenta para explorar nuestros recursos</p>

        <form action="<?= base_url('login') ?>" method="POST">
            <div class="form-group">
                <label for="email">Correo electrónico</label>
                <input type="email" id="correo" name="correo" value="<?= old("correo") ?>" >
            </div>

            <div class="form-group">
                <label for="password">Contraseña</label>
                <div class="password-container">
                    <input type="password" id="contraseña" name="contraseña" >
                    <span class="toggle-password">👁</span>
                </div>
                <?php if(session("mensaje")){ ?>
                        <div class="text-danger">
                            <?php echo session("mensaje"); ?>
                        </div>
                <?php } ?>
            </div>

            <!--<div class="remember-forgot">
                <div class="remember-me">
                    <input type="checkbox" id="remember" name="remember">
                    <label for="remember">Recordarme</label>
                </div>
                <a href="#" class="forgot-password">¿Olvidaste tu contraseña?</a>
            </div>-->

            <button type="submit">Iniciar sesión</button>
        </form>

        <div class="register-section">
            <p>¿No tienes una cuenta?</p>
            <a href="<?= base_url("registro") ?>" class="register-link">Regístrate</a>
        </div>
    </div>

</body>
</html>