<?php echo $header;?>
<br/>
<h1>Resultados</h1>
<br/>
<table class="table table-light">
    <thead class="thead-light">
        <th>Portada</th>
        <th>Título</th>
        <th>Archivo</th>
        <th>Autor</th>
        <th>Acciones</th>
    </thead>
    <tbody>
        <?php foreach($resultados as $resultado):?>
            <tr>
                <td>
                    <a href="<?= base_url('libros/'. $resultado['id_libro'])?>"><img class="img-thumbnail" src="<?= base_url('uploads/portadas/' . $resultado["portada"]) ?>" width="100"></a>
                </td>
                <td><?php echo $resultado['titulo'];?></td>
                <td><a title="Descargar Archivo" href="<?= base_url('uploads/archivos/' . $resultado['archivo']) ?>"><?php echo $resultado['archivo'];?></a></td>
                <td><?php echo $resultado['autor'];?></td>
                <td>
                <?php if (in_array($resultado["id_libro"], $favoritosIds)) { ?>
                    <form action="<?= base_url("favsdelete/".$resultado["id_libro"])?>" method="get">
                        <input type="hidden" name="buscador" value="true">
                        <button class="btn btn-warning" type="submit">Quitar de favoritos</button>
                    </form>
                <?php } else { ?>
                    <form action="<?= base_url("favs/".$resultado["id_libro"])?>" method="get">
                        <input type="hidden" name="buscador" value="true">
                        <button class="btn btn-warning" type="submit">Añadir a Favoritos</button>
                    </form>
                <?php } ?>
                </td>
            </tr>
        <?php endforeach;?>
    </tbody>
</table>

<?php echo $footer;?> 