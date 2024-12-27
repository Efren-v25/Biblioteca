<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Iniciar sesión</title>
</head>

<body>
<br><br><br>
<div class="container">
        <div class="row">
        <div class="col-sm-4"></div>
        <div class="col-sm-4">
            <div class="card">
            <div class="card-body">
                <h3 class="text-center">Biblioteca</h3>
                <p class="card-text">
                <form method="post" action="<?php echo site_url("/login")?>">
                <div class="form-group">
                    <label for="correo"></label>
                    <input id="correo" class="form-control" type="email" name="correo" placeholder="direccion de correo electronico" value="<?= old("correo") ?>">
                </div>

                <div class="form-group">
                    <label for="contraseña"></label>
                    <input id="contraseña" class="form-control" type="password" name="contraseña" placeholder="contraseña">
                    <div class="container">
                    <?php if(session("mensaje")){ ?>
                        <div class="text-danger">
                            <?php echo session("mensaje"); ?>
                        </div>
                    <?php } ?>
                </div><br>
                
                <button class="btn btn-primary" type="submit">Iniciar sesión</button>

                <br><br><p>¿No tienes cuenta? <a href="<?php echo base_url("registro") ?>">Crear una cuenta nueva</a></p>
                </form>
                </p>
            </div>
            </div>                    
        </div>
        <div class="col-sm-4"></div>
        </div>
    </div>
</body>
