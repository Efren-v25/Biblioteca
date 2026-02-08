<?= $header ?>
<style>
    body {
        font-family: "Work Sans", Arial, sans-serif;
        background-color: rgb(184, 227, 255);
        color: #1f2a44;
        margin: 0;
        padding: 20px;
    }
    .form-card {
        max-width: 520px;
        margin: 24px auto;
        background: linear-gradient(150deg, #fffdf3 0%, #ffffff 55%, #eef6ff 100%);
        border-radius: 16px;
        border: 1px solid rgba(31, 42, 68, 0.08);
        box-shadow: 0 14px 26px rgba(0, 0, 0, 0.12);
        padding: 22px;
    }
    .form-title {
        margin: 0 0 14px 0;
        font-size: 1.5rem;
        color: #0f3d66;
        text-align: center;
    }
    .form-group {
        margin-bottom: 14px;
    }
    .form-group label {
        font-weight: 600;
        margin-bottom: 6px;
        display: inline-block;
        color: #1f2a44;
    }
    .form-control {
        border-radius: 10px;
        border: 1px solid rgba(31, 42, 68, 0.16);
        padding: 10px 12px;
        box-shadow: none;
    }
    .form-control:focus {
        border-color: rgba(31, 111, 178, 0.6);
        box-shadow: 0 0 0 4px rgba(31, 111, 178, 0.12);
    }
    .btn-primary {
        background: linear-gradient(135deg, #1f6fb2, #0f3d66);
        border: none;
        padding: 8px 18px;
        border-radius: 999px;
        font-weight: 600;
        transition: transform 0.2s ease, box-shadow 0.2s ease;
    }
    .btn-primary:hover {
        transform: translateY(-1px);
        box-shadow: 0 10px 18px rgba(31, 42, 68, 0.18);
    }
    .text-danger {
        font-size: 0.85rem;
        margin-top: 4px;
    }
</style>
<div class="form-card">
    <h3 class="form-title">Editar Usuario</h3>
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
            <input id="correo" class="form-control" type="email" name="correo" value="<?= $usuario['correo']?>">
            
            <?php if (session("errores.correo")) : ?>
                <div class="text-danger">
                    <?= session("errores.correo") ?>
                </div>
            <?php endif; ?>
        </div>

        <button class="btn btn-primary" type="submit">Aceptar</button>
    </form>
</div>
<?= $footer ?>
