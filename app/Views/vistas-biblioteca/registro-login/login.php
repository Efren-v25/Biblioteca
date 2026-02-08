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

        .register-section {
            text-align: center;
            margin-top: 20px;
            padding-top: 20px;
            border-top: 1px solid rgba(31, 42, 68, 0.12);
        }

        .register-section p {
            color: #3a4a6a;
            font-size: 14px;
            margin: 0;
        }

        .register-link {
            color: #1f6fb2;
            text-decoration: none;
            font-size: 14px;
            font-weight: 600;
        }

        .register-link:hover {
            text-decoration: underline;
        }
    </style>
    
</head>
<body>
    <img src="<?= base_url('img/logo_umc.png')?>" alt="Logo" class="logo">
    
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
                    <span class="toggle-password" role="button" aria-label="Mostrar contraseña" tabindex="0">👁</span>
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

    <script>
        const toggle = document.querySelector(".toggle-password");
        const input = document.querySelector("#contraseña");

        if (toggle && input) {
            const toggleVisibility = () => {
                const isPassword = input.type === "password";
                input.type = isPassword ? "text" : "password";
                toggle.setAttribute(
                    "aria-label",
                    isPassword ? "Ocultar contraseña" : "Mostrar contraseña"
                );
            };

            toggle.addEventListener("click", toggleVisibility);
            toggle.addEventListener("keydown", (event) => {
                if (event.key === "Enter" || event.key === " ") {
                    event.preventDefault();
                    toggleVisibility();
                }
            });
        }
    </script>
</body>
</html>
