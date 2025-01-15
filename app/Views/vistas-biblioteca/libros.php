<?= $header ?>
<br/>
<h2>Todos los libros</h2>
<br/>
<table class="table table-light">
    <thead class="thead-light">
        <th>Portada</th>
        <th>Título</th>
        <th>Archivo</th>
        <th>Autor</th>
    </thead>
    <tbody>
        <?php foreach($resultados as $resultado):?>
            <tr>
                <td>
                    <a href="<?= base_url('libros/'. $resultado['id_libro'])?>"><img class="img-thumbnail" src="<?= base_url('uploads/portadas/' . $resultado['portada']) ?>" width="100"></a>
                </td>
                <td><?php echo $resultado['titulo'];?></td>
                <td><a title="Ver Archivo" href="<?= base_url('uploads/archivos/' . $resultado['archivo']) ?>"><?php echo $resultado['archivo'];?></a></td>
                <td><?php echo $resultado['autor'];?></td>
            </tr>
        <?php endforeach;?>
    </tbody>
</table>
<?= $footer ?>