<?= $header ?>
<style>
        body {
            font-family: 'Merriweather', serif;
            background-color:rgb(184, 227, 255);
            color: #000000;
            margin: 0;
            padding: 20px;
        }
        .perfil-container {
            max-width: 860px;
            margin: 20px auto;
        }
        .perfil-card {
            background: linear-gradient(150deg, #fffdf3 0%, #ffffff 55%, #eef6ff 100%);
            border-radius: 16px;
            border: 1px solid rgba(31, 42, 68, 0.08);
            box-shadow: 0 14px 26px rgba(0, 0, 0, 0.12);
            padding: 24px;
        }
        .perfil-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 12px;
            margin-bottom: 18px;
            border-bottom: 1px solid rgba(31, 42, 68, 0.12);
            padding-bottom: 12px;
        }
        .perfil-title {
            margin: 0;
            font-size: 1.6rem;
            color: #0f3d66;
        }
        .perfil-role {
            font-size: 0.9rem;
            background: #eaf3ff;
            color: #1f2a44;
            padding: 4px 10px;
            border-radius: 999px;
            border: 1px solid rgba(31, 42, 68, 0.12);
            font-weight: 600;
        }
        .perfil-grid {
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 14px 18px;
        }
        .perfil-item {
            background: #ffffff;
            border-radius: 12px;
            border: 1px solid rgba(31, 42, 68, 0.08);
            padding: 12px 14px;
        }
        .perfil-label {
            display: block;
            font-size: 0.85rem;
            color: #3a4a6a;
            margin-bottom: 4px;
        }
        .perfil-value {
            font-size: 1.05rem;
            font-weight: 600;
            color: #1f2a44;
        }
        .perfil-actions {
            margin-top: 18px;
            display: flex;
            justify-content: flex-end;
        }
        .btn {
            display: inline-block;
            padding: 8px 18px;
            background: linear-gradient(135deg, #1f6fb2, #0f3d66);
            color: #ffffff;
            text-decoration: none;
            border-radius: 999px;
            transition: transform 0.2s ease, box-shadow 0.2s ease;
            font-weight: 600;
        }
        .btn:hover {
            transform: translateY(-1px);
            box-shadow: 0 10px 18px rgba(31, 42, 68, 0.18);
        }
        @media screen and (max-width: 600px) {
            .perfil-grid {
                grid-template-columns: 1fr;
            }
            .perfil-header {
                flex-direction: column;
                align-items: flex-start;
            }
            .perfil-actions {
                justify-content: flex-start;
            }
        }
    </style>
<div class="perfil-container">
    <div class="perfil-card">
        <div class="perfil-header">
            <h2 class="perfil-title">Perfil de Usuario</h2>
            <span class="perfil-role">
                <?= ucfirst($usuario['rango']) ?>
            </span>
        </div>
        <div class="perfil-grid">
            <div class="perfil-item">
                <span class="perfil-label">Nombre</span>
                <span class="perfil-value"><?= $usuario['nombre'] ?></span>
            </div>
            <div class="perfil-item">
                <span class="perfil-label">Apellido</span>
                <span class="perfil-value"><?= $usuario['apellido'] ?></span>
            </div>
            <div class="perfil-item">
                <span class="perfil-label">Correo</span>
                <span class="perfil-value"><?= $usuario['correo'] ?></span>
            </div>
            <div class="perfil-item">
                <span class="perfil-label">Rango</span>
                <span class="perfil-value">
                    <?= ucfirst($usuario['rango']) ?>
                </span>
            </div>
        </div>
        <?php if(session()->get('id_usuario') == $id): ?>
        <div class="perfil-actions">
            <a href="<?php echo base_url("usuario/" . $id . "/editar")?>" class="btn btn-primary" type="button">Editar</a>
        </div>
        <?php endif ?>
    </div>
</div>
<?= $footer ?>
