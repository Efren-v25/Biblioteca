<?= $header ?>
<br/>
<div class="container">
<div class="row">
    <div class="col-sm-4"></div>
    <div class="col-sm-4">
        <div class="card">
            <div class="card-body">
                <h3>Editar Usuario</h3>
                <p class="card-text">
                <form method="post" action="<?php echo base_url("usuario/" . $usuario['id_usuario'])?>" autocomplete="off">
                    <div class="form-group">
                        <input type="hidden" name="_method" value="PUT">
                        
                        <label for="nombre">Nombre</label>
                        <input id="nombre" class="form-control" type="text" name="nombre" value="<?= $usuario['nombre'] ?>">
                            <?php if (session("errores.nombre")) : ?>
                                <div class="text-danger">
                                    <?= session("errores.nombre") ?>
                                </div>
                            <?php endif; ?>
                    </div>

                    <div class="form-group">
                        <label for="apellido">Apellido</label>
                        <input id="apellido" class="form-control" type="text" name="apellido" value="<?= $usuario['apellido'] ?>">
                        
                        <?php if (session("errores.apellido")) : ?>
                            <div class="text-danger">
                                <?= session("errores.apellido") ?>
                            </div>
                        <?php endif; ?>
                    </div>

                    <div class="form-group">
                        <label for="correo">Correo</label>
                        <input id="correo" class="form-control" type="email" name="correo" p value="<?= $usuario['correo']?>">
                        
                        <?php if (session("errores.correo")) : ?>
                            <div class="text-danger">
                                <?= session("errores.correo") ?>
                            </div>
                        <?php endif; ?>
                    </div>

                    <button class="btn btn-primary" type="submit">Aceptar</button>
                                    
                </form>
                </p>
            </div>
        </div>
    </div>
    <div class="col-sm-4"></div>
</div>
</div>
<?= $footer ?>