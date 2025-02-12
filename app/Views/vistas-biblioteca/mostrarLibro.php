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
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }

        .tarjeta-content {
            padding: 15px;
            display: flex;
            flex-direction: column;
            justify-content: start;
        }

        .tarjeta-content h1 {
            font-size: 32px;
            color: #333;
            margin-bottom: 10px;
        }

        .tarjeta-content p {
            font-size: 18px;
            color: #555;
            margin-bottom: 5px;
        }

        .tarjeta-content .info {
            font-size: 16px;
            color: #777;
        }

        .info span {
            display: block;
        }

        .leer {
            background-color: #10006d;
            text-decoration: none;
            padding: 4px 18px;
            border-radius: 4px;
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
            display: flex;
            align-items: center;
            background-color: #fff;
            border: 2px solid #ddd;
            border-radius: 50px;
            padding: 5px 10px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            width: 90%;
            max-width: 1100px;
            height: 50px;
        }

        .comentarios-container input[type="text"] {
            border: none;
            outline: none;
            padding: 5px 10px;
            font-size: 14px;
            height: 20px;
            width: 100%;
            border-radius: 50px;
        }

        .comentarios-container button {
            background: none;
            border: none;
            outline: none;
            cursor: pointer;
            height: 20px;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 0;
            margin-left: 5px;
        }

        .comentarios-lista {
            width: 90%;
            max-width: 1100px;
            margin: 20px auto;
        }

        .comentario {
            border-radius: 8px;
            padding: 10px;
            margin-bottom: 10px;
            background: #fff;
            box-shadow:  0 4px 6px rgba(0, 0, 0, 0.1);
            
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
            font-size: 14px;
        }

        .comentario-fecha {
            font-size: 12px;
            color: #777;
            margin: 0;
        }

        .comentario-contenido {
            margin: 5px 0 0;
            font-size: 14px;
            line-height: 1.4;
        }

        @media (min-width: 768px) {
            .tarjeta {
                flex-direction: row;
            }

            .tarjeta img {
                width: 200px;
                height: auto;
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
                    <p class="comentario-fecha"><?=$comentario["fecha"]?></p>
                </div>
            </div>
            <p class="comentario-contenido"><?= $comentario["comentario"] ?></p>
        </div>
        <?php endforeach ?>
    </div>
<br><br>

<?= $footer ?>