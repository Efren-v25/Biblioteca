<?= $header ?>

<style>
        .centro {
            display: flex;
            justify-content: center;
            align-items: start;
        }

        .tarjeta {
            display: flex;
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
            font-size: 40px;
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
            background-color: #5a5a5a;
            text-decoration: none;
            padding: 4px 18px;
            border-radius: 4px;
            color: white;
            transition: color 0.3s ease;
        }

        .leer:hover {
            color:rgb(0, 162, 255);
        }

        .comentarios {
        display: flex;
        justify-content: center;
        align-items: start;
        }
        .comentarios-container {
        display: flex;
        align-items: center;
        background-color: #fff;
        border: 2px solid #ddd;
        border-radius: 50px;
        padding: 5px 10px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        width: 1100px;
        height: 50px;
        max-width: 100%;
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
        width: 1100px;
        margin: 20px auto;
        }
        .comentario {
        border-radius: 8px;
        padding: 10px;
        margin-bottom: 10px;
        background: #fff;
        box-shadow: 15px 15px 30px #bebebe,
                    -15px -15px 30px #ffffff;
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
                <span>Carrera:
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
            <input type="text" placeholder="Escribe un comentario...">
            <button>Enviar</button>
        </div>
    </div>
    
    <div class="comentarios-lista">
        <div class="comentario">
            <div class="comentario-header">
                <img src="" alt="Avatar de Usuario" class="comentario-avatar">
                <div class="comentario-info">
                    <h4 class="comentario-autor">Gheison Barrios</h4>
                    <p class="comentario-fecha">5 de febrero de 2025</p>
                </div>
            </div>
            <p class="comentario-contenido">Comentariooooo</p>
        </div>
    </div>
<br><br>

<?= $footer ?>