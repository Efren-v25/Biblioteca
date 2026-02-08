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
            background:
                radial-gradient(900px 260px at 10% 0%, #f7f0d8 0%, transparent 60%),
                radial-gradient(900px 260px at 90% 0%, #e4f0ff 0%, transparent 60%),
                #eef1f6;
            font-family: "Work Sans", Arial, sans-serif;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .logo {
            width: 4.2rem;
            height: 4.2rem;
            position: fixed;
            top: 1rem;
            left: 1rem;
            object-fit: contain;
            z-index: 1000;
            border-radius: 12px;
            background: #ffffff;
            border: 1px solid rgba(31, 42, 68, 0.12);
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.12);
        }

        .container {
            background: linear-gradient(150deg, #fffdf3 0%, #ffffff 55%, #eef6ff 100%);
            padding: 32px;
            border-radius: 16px;
            border: 1px solid rgba(31, 42, 68, 0.08);
            box-shadow: 0 16px 28px rgba(0, 0, 0, 0.12);
            width: 100%;
            max-width: 400px;
            margin-top: 60px;
        }

        h1 {
            text-align: center;
            color: #0f3d66;
            font-size: 26px;
            margin: 0 0 8px 0;
        }

        .subtitle {
            text-align: center;
            color: #3a4a6a;
            font-size: 14px;
            margin-bottom: 30px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 8px;
            color: #1f2a44;
            font-size: 14px;
            font-weight: 600;
        }

        input[type="email"],
        input[type="password"],
        input[type="text"] {
            width: 100%;
            padding: 10px 12px;
            border: 1px solid rgba(31, 42, 68, 0.16);
            border-radius: 10px;
            box-sizing: border-box;
            font-size: 14px;
            background: #f8fbff;
            transition: border-color 0.2s ease, box-shadow 0.2s ease;
        }

        input[type="email"]:focus,
        input[type="password"]:focus,
        input[type="text"]:focus {
            outline: none;
            border-color: rgba(31, 111, 178, 0.6);
            box-shadow: 0 0 0 4px rgba(31, 111, 178, 0.12);
        }

        .password-container {
            position: relative;
        }

        button {
            width: 100%;
            padding: 12px;
            background: linear-gradient(135deg, #1f6fb2, #0f3d66);
            border: none;
            border-radius: 999px;
            color: #ffffff;
            font-size: 14px;
            cursor: pointer;
            transition: transform 0.2s ease, box-shadow 0.2s ease;
            font-weight: 600;
        }

        button:hover {
            transform: translateY(-1px);
            box-shadow: 0 10px 18px rgba(31, 42, 68, 0.18);
        }

        .login-section {
            text-align: center;
            margin-top: 20px;
            padding-top: 20px;
            border-top: 1px solid rgba(31, 42, 68, 0.12);
        }

        .login-section p {
            color: #3a4a6a;
            font-size: 14px;
            margin: 0;
        }

        .login-link {
            color: #1f6fb2;
            text-decoration: none;
            font-size: 14px;
            font-weight: 600;
        }

        .login-link:hover {
            text-decoration: underline;
        }

        .unlock-row {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 10px;
            margin-top: 6px;
            flex-wrap: wrap;
        }

        .unlock-note {
            font-size: 12px;
            color: #3a4a6a;
            flex: 1 1 100%;
        }

        .unlock-input {
            flex: 1 1 140px;
            max-width: 160px;
        }

        .unlock-btn {
            background: #ffffff;
            border: 1px solid rgba(31, 42, 68, 0.16);
            color: #1f2a44;
            padding: 6px 10px;
            border-radius: 999px;
            cursor: pointer;
            font-size: 12px;
            font-weight: 600;
        }

        .unlock-btn:hover {
            background: #eaf3ff;
        }

        .unlock-message {
            font-size: 12px;
            color: #b3261e;
            margin-top: 6px;
            display: none;
        }

        .input-locked {
            background: #f1f4f8;
            color: #8b95a7;
            cursor: not-allowed;
        }
    </style>
</head>

<body>
    <img src="<?= base_url('img/logo_umc.png')?>" alt="Logo" class="logo">

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
                <input type="text" name="code" id="code" class="input-locked" disabled>
                <div class="unlock-row">
                    <span class="unlock-note">Desbloquea el campo con una clave de 4 caracteres.</span>
                    <input type="password" id="unlockKey" class="unlock-input form-control" maxlength="4" placeholder="Clave">
                    <button class="unlock-btn" type="button" id="unlockCode">Desbloquear</button>
                </div>
                <div class="unlock-message" id="unlockMessage">Incorrecto</div>
                <?php if (session("errores.code")) : ?>
                    <div class="text-danger">
                        <?= session("errores.code") ?>
                    </div>
                <?php endif; ?>
            </div>

            <button type="submit" name="registrar">Registrarse</button>
        </form>

        <div class="login-section">
            <p>¿Ya tienes una cuenta?</p>
            <a href="<?= base_url("login") ?>" class="login-link">Iniciar sesión</a>
        </div>
    </div>

    <script>
        const unlockButton = document.querySelector("#unlockCode");
        const codeInput = document.querySelector("#code");
        const unlockInput = document.querySelector("#unlockKey");
        const unlockMessage = document.querySelector("#unlockMessage");

        if (unlockButton && codeInput && unlockInput && unlockMessage) {
            const tryUnlock = () => {
                if (unlockInput.value === "1234") {
                    codeInput.disabled = false;
                    codeInput.classList.remove("input-locked");
                    codeInput.focus();
                    unlockButton.textContent = "Desbloqueado";
                    unlockButton.disabled = true;
                    unlockInput.disabled = true;
                    unlockMessage.style.display = "none";
                } else {
                    unlockMessage.style.display = "block";
                }
            };

            unlockButton.addEventListener("click", tryUnlock);
            unlockInput.addEventListener("keydown", (event) => {
                if (event.key === "Enter") {
                    event.preventDefault();
                    tryUnlock();
                }
            });
        }
    </script>
</body>

</html>
