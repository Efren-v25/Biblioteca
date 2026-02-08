<?= $header ?>

<style>
        body {
            font-family: serif;
            background-color: #e6f3ff;
            color: #000;
            margin: 0;
            padding: 20px;
        }

        .centro {
            display: flex;
            justify-content: center;
            align-items: start;
        }

        .tarjeta {
            display: flex;
            flex-direction: column;
            max-width: 1100px;
            width: 90%;
            background: linear-gradient(160deg, #fffdf3 0%, #ffffff 55%, #eef6ff 100%);
            border-radius: 16px;
            border: 1px solid rgba(31, 42, 68, 0.08);
            box-shadow: 0 10px 22px rgba(0, 0, 0, 0.12);
            overflow: hidden;
        }

        .tarjeta .img-thumbnail {
            width: 100%;
            max-width: 240px;
            height: 320px;
            object-fit: cover;
            border-radius: 12px;
            border: 1px solid rgba(31, 42, 68, 0.12);
            margin: 14px;
            box-shadow: 0 10px 18px rgba(0, 0, 0, 0.12);
        }

        .tarjeta-content {
            padding: 15px;
            display: flex;
            flex-direction: column;
            justify-content: start;
        }

        .tarjeta-content h1 {
            font-size: 32px;
            color: #0f3d66;
            margin-bottom: 8px;
        }

        .tarjeta-content p {
            font-size: 17px;
            color: #3a4a6a;
            margin-bottom: 6px;
        }

        .tarjeta-content .info {
            font-size: 16px;
            color: #3a4a6a;
        }

        .info span {
            display: block;
        }

        .leer {
            background: linear-gradient(135deg, #1f6fb2, #0f3d66);
            text-decoration: none;
            padding: 6px 20px;
            border-radius: 999px;
            color: white;
            transition: color 0.3s ease;
            display: inline-block;
            margin-top: 10px;
        }

        .leer:hover {
            color: rgb(0, 162, 255);
        }

        .comentarios {
            display: flex;
            justify-content: center;
            align-items: start;
            margin-top: 20px;
        }

        .comentarios-container {
            display: block;
            background-color: #fff;
            border: 1px solid rgba(31, 42, 68, 0.16);
            border-radius: 16px;
            padding: 12px 14px;
            box-shadow: 0 8px 18px rgba(0, 0, 0, 0.08);
            width: 90%;
            max-width: 1100px;
        }

        .comentarios-container form {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .comentarios-container input[type="text"] {
            border: 1px solid rgba(31, 42, 68, 0.12);
            outline: none;
            padding: 10px 14px;
            font-size: 14px;
            height: 42px;
            width: 100%;
            border-radius: 999px;
            background: #f8fbff;
            transition: border-color 0.2s ease, box-shadow 0.2s ease;
        }

        .comentarios-container input[type="text"]:focus {
            border-color: rgba(31, 111, 178, 0.6);
            box-shadow: 0 0 0 4px rgba(31, 111, 178, 0.12);
        }

        .comentarios-container button {
            background: linear-gradient(135deg, #1f6fb2, #0f3d66);
            border: none;
            outline: none;
            cursor: pointer;
            height: 42px;
            padding: 0 18px;
            border-radius: 999px;
            color: #fff;
            font-weight: 600;
            transition: transform 0.2s ease, box-shadow 0.2s ease;
        }

        .comentarios-container button:hover {
            transform: translateY(-1px);
            box-shadow: 0 8px 16px rgba(31, 42, 68, 0.18);
        }

        .comentarios-container button:active {
            transform: translateY(0);
        }

        .comentarios-lista {
            width: 90%;
            max-width: 1100px;
            margin: 20px auto;
        }

        .comentario {
            border-radius: 12px;
            padding: 12px 14px;
            margin-bottom: 10px;
            background: #fff;
            border: 1px solid rgba(31, 42, 68, 0.08);
            box-shadow:  0 8px 16px rgba(0, 0, 0, 0.08);
            
        }

        .comentario-header {
            display: flex;
            align-items: center;
            margin-bottom: 5px;
        }

        .comentario-avatar {
            width: 30px;
            height: 30px;
            border-radius: 50%;
            margin-right: 10px;
        }

        .comentario-info {
            flex-grow: 1;
        }

        .comentario-autor {
            font-weight: bold;
            margin: 0;
            font-size: 15px;
        }

        .comentario-fecha {
            font-size: 12px;
            color: #6b7a95;
            margin: 0;
        }

        .comentario-contenido {
            margin: 5px 0 0;
            font-size: 14px;
            line-height: 1.4;
            color: #1f2a44;
        }

        @media (min-width: 768px) {
            .tarjeta {
                flex-direction: row;
            }

            .tarjeta .img-thumbnail {
                width: 220px;
                height: 300px;
                margin: 16px;
            }
        }

        @media (max-width: 768px) {
            .comentarios-container form {
                flex-direction: column;
                align-items: stretch;
            }

            .comentarios-container button {
                width: 100%;
            }

            .tarjeta .img-thumbnail {
                width: calc(100% - 28px);
                max-width: 360px;
                height: 280px;
                margin: 14px auto 0;
            }
        }
</style>

<br><br>
<div class="centro">
    <div class="tarjeta">
    <img class="img-thumbnail" src="<?= base_url('uploads/portadas/' . $libro['portada'] )?>" width="200">
        <div class="tarjeta-content">
            <h1><?= $libro['titulo']?></h1>
            <p><?= $libro['descripcion'] ?></p>
            <div class="info">
                <span>Semestre: <?= $etiquetas['semestre']?></span>
                <span>Carreras:
                    <?php if($etiquetas['carrera_inf'] != 'no' and $etiquetas['carrera_mar'] != 'no'):?>
                        Informática y Marítima
                    <?php else: ?>
                        <?php if($etiquetas['carrera_inf'] != 'no'):?>
                            Informática
                        <?php else: ?>
                            Marítima
                        <?php endif ?>
                    <?php endif ?>
                </span>
                <span>Materia: <?= $etiquetas["materia"]?></span>
                <span>Fecha de subida: <?= $libro['fecha_subida'] ?></span>
                <span>Subido por: <?= $libro['autor'] ?></span><br>
                <a class="leer" href="<?= base_url('uploads/archivos/' . $libro['archivo']) ?>">Leer</a>
            </div>
        </div>
    </div>
</div>
<br><br>
    <div class="comentarios">
        <div class="comentarios-container">
            <form action="<?= base_url('comentarios')?>" method="post">
                <input type="hidden" name="id_libro" id="id_libro" value="<?= $libro["id_libro"]?>">
                <input type="hidden" name="id_usuario" id="id_usuario" value="<?= session()->get("id_usuario")?>">
                <input id="comentario" name="comentario" type="text" placeholder="Escribe un comentario...">
                <button>Enviar</button>
            </form>
            
        </div>
    </div>
    
    <div class="comentarios-lista">
        <?php foreach ($comentarios as $comentario):?>
        <div class="comentario">
            <div class="comentario-header">
                <div class="comentario-info">
                    <h4 class="comentario-autor"><?= $comentario["nombre"] . " " . $comentario["apellido"]?></h4>
                    <p class="comentario-fecha"><?= $comentario["fecha_subida"] ?? "" ?></p>
                </div>
            </div>
            <p class="comentario-contenido"><?= $comentario["comentario"] ?></p>
        </div>
        <?php endforeach ?>
    </div>
<br><br>

<?= $footer ?>
