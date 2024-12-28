<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Registrarse</title>
</head>
<body>
<br>
<div class="container">
        <div class="row">
        <div class="col-sm-4"></div>
        <div class="col-sm-4">
            <div class="card">
            <div class="card-body">
                <h3 class="text-center">Biblioteca</h3>
                <p class="card-text">
                <form method="post" action="<?php echo site_url("/registrar")?>">
                <div class="form-group">
                    <label for="nombre"></label>
                    <input id="nombre" class="form-control" type="text" name="nombre" placeholder="Nombre" value="<?= old("nombre") ?>">
                    
                    <?php if (session("errores.nombre")) : ?>
                        <div class="text-danger">
                            <?= session("errores.nombre") ?>
                        </div>
                    <?php endif; ?>
                </div>

                <div class="form-group">
                    <label for="apellido"></label>
                    <input id="apellido" class="form-control" type="text" name="apellido" placeholder="Apellido" value="<?= old("apellido") ?>">
                    
                    <?php if (session("errores.apellido")) : ?>
                        <div class="text-danger">
                            <?= session("errores.apellido") ?>
                        </div>
                    <?php endif; ?>
                </div>

                <div class="form-group">
                    <label for="correo"></label>
                    <input id="correo" class="form-control" type="email" name="correo" placeholder="direccion de correo electronico" value="<?= old("correo") ?>">
                    
                    <?php if (session("errores.correo")) : ?>
                        <div class="text-danger">
                            <?= session("errores.correo") ?>
                        </div>
                    <?php endif; ?>
                </div>

                <div class="form-group">
                    <label for="contraseña"></label>
                    <input id="contraseña" class="form-control" type="password" name="contraseña" placeholder="contraseña">
                    
                    <?php if (session("errores.contraseña")) : ?>
                        <div class="text-danger">
                            <?= session("errores.contraseña") ?>
                        </div>
                    <?php endif; ?>
                </div>

                <div class="form-group">
                    <label for="contraseña2"></label>
                    <input id="contraseña2" class="form-control" type="password" name="contraseña2" placeholder="confirmar contraseña">
                    
                    <?php if (session("errores.contraseña2")) : ?>
                        <div class="text-danger">
                            <?= session("errores.contraseña2") ?>
                        </div>
                    <?php endif; ?>
                </div>
                
                <div class="form-group">
                    <label for="code"></label>
                    <input id="code" class="form-control" type="text" name="code" placeholder="codigo de profesor (si aplica)">
                </div><br>

                <button class="btn btn-primary" type="submit">Registrarse</button>
                
                <br><br><p>¿Ya posees una cuenta? <a href="<?php echo base_url("login") ?>">Iniciar sesion</a></p>
                </form>
                </p>
            </div>
            </div>                    
        </div>
        <div class="col-sm-4"></div>
        </div>
    </div>

</body>
