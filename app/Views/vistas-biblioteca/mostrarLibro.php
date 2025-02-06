<?= $header ?>

<style>
        .centro {
            display: flex;
            justify-content: center;
            align-items: start;
        }

        .tarjeta {
            display: flex;
            max-width: 800px;
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
</style>

<br><br>
<div class="centro">
    <div class="tarjeta">
    <img class="img-thumbnail" src="<?= base_url('uploads/portadas/' . $libro['portada'] )?>" width="200">
        <div class="tarjeta-content">
            <h1><a href="<?= base_url('uploads/archivos/' . $libro['archivo'] )?>"><?= $libro['titulo']?></a></h1>
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
                <span>Subido por: <?= $libro['autor'] ?></span>
            </div>
        </div>
    </div>
</div>
<h3>Comentarios:</h3>
<table>
    <thead>
        <th>Subido por</th>
        <th>Comentario</th>
    </thead>
    <tbody>
    <?php foreach ($comentarios as $comentario): ?>
        <tr>
            <td>
                <?= $comentario['nombre'] . " " . $comentario['apellido']?>
            </td>
            <td>
                <?= $comentario['comentario']?>
            </td>
        </tr>
    <?php endforeach?>  
    </tbody>
</table>

<form action= <?= base_url("comentarios")?> method="POST">
    <input type="hidden" name="id_libro" value=<?= $libro['id_libro'] ?>>
    <input type="text" name="comentario" id="comentario">
    <button type="submit">aceptar</button>
</form>
<br><br>

<?= $footer ?>