<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Biblioteca Virtual UMC - Registro</title>
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

        .login-section {
            text-align: center;
            margin-top: 20px;
            padding-top: 20px;
            border-top: 1px solid #eee;
        }

        .login-section p {
            color: #666;
            font-size: 14px;
            margin: 0;
        }

        .login-link {
            color: #666;
            text-decoration: none;
            font-size: 14px;
        }

        .login-link:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>
    <img src="<?= base_url('img/logo_pergamo.jpeg')?>" alt="Logo" class="logo">

    <div class="container">
        <h1>Biblioteca Virtual UMC</h1>
        <p class="subtitle">Accede a tu cuenta para explorar nuestros recursos</p>

        <form action="<?= base_url('registrar') ?>" method="POST">
            <div class="form-group">
                <label for="username">Nombre</label>
                <input type="text" id="nombre" name="nombre" value="<?= old("nombre") ?>"  >
                <?php if (session("errores.nombre")) : ?>
                    <div class="text-danger">
                        <?= session("errores.nombre") ?>
                    </div>
                <?php endif; ?>
            </div>

            <div class="form-group">
                <label for="apellido">Apellido</label>
                <input type="text" id="apellido" name="apellido" value="<?= old("apellido") ?>"  >
                <?php if (session("errores.apellido")) : ?>
                    <div class="text-danger">
                        <?= session("errores.apellido") ?>
                    </div>
                <?php endif; ?>
            </div>

            <div class="form-group">
                <label for="correo">Correo electrónico</label>
                <input type="email" id="correo" name="correo" value="<?= old("correo") ?>"  >
                <?php if (session("errores.correo")) : ?>
                    <div class="text-danger">
                        <?= session("errores.correo") ?>
                    </div>
                <?php endif; ?>
            </div>

            <div class="form-group">
                <label for="contraseña">Contraseña</label>
                <div class="password-container">
                    <input type="password" id="contraseña" name="contraseña" value=""  >
                    <?php if (session("errores.contraseña")) : ?>
                        <div class="text-danger">
                            <?= session("errores.contraseña") ?>
                        </div>
                    <?php endif; ?>
                </div>
            </div>

            <div class="form-group">
                <label for="contraseña2">Confirmar contraseña</label>
                <div class="password-container">
                    <input type="password" id="contraseña2" name="contraseña2" value=""  >
                    <?php if (session("errores.contraseña2")) : ?>
                        <div class="text-danger">
                            <?= session("errores.contraseña2") ?>
                        </div>
                    <?php endif; ?>
                </div>
            </div>

            <div class="form-group">
                <label for="code">Código de profesor (si aplica)</label>
                <input type="text" name="code" id="code">

            </div>

            <button type="submit" name="registrar">Registrarse</button>
        </form>

        <div class="login-section">
            <p>¿Ya tienes una cuenta?</p>
            <a href="<?= base_url("login") ?>" class="login-link">Iniciar sesión</a>
        </div>
    </div>

</body>

</html>