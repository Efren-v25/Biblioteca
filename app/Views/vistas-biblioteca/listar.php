<?php echo $header; ?>

<br><table class="table table-light">
        <thead class="thead-light">
            <tr>                   
                <th>Titulo</th>
                <th>Portada</th>
                <th>Carrera</th>
                <th>Carrera</th>
                <th>Semestre</th>
                <th>Acciones</th> 
            </tr>
        </thead>
        <tbody>
<?php if (!empty($libros)): ?>
    <?php foreach ($libros as $libro): ?>
    <?php foreach ($etiquetas as $etiqueta): ?>
        <?php if ($etiqueta["id_libro"] == $libro["id_libro"]): ?>
        <tr>
            <td><?php echo $libro["titulo"] ?></td>
            <td>
                <img class="img-thumbnail" src="<?php echo base_url() ?>/uploads/portadas/<?php echo $libro["portada"] ?>" width="100">
            </td>
            <td><?php echo $etiqueta["carrera_inf"] ?></td>
            <td><?php echo $etiqueta["carrera_mar"] ?></td>
            <td><?php echo $etiqueta["materia"] ?></td>
            <td><?php echo $etiqueta["semestre"] ?></td>
            <td>
                <a href="<?php echo base_url("editar/".$libro["id_libro"])?>" class="btn btn-info" type="button">Editar</a>

                <a href="<?php echo base_url("borrar/".$libro["id_libro"])?>" class="btn btn-danger" onclick="return confirm('¿Estás seguro de que quieres borrar este empleado?')" type="button">Borrar</a>
            </td>
        </tr>
        <?php endif; ?>
    <?php endforeach; ?>
<?php endforeach; ?>
    </tbody>
</table>

<?php else: ?>
    <p>No has subido ningún libro todavía.</p>
<?php endif; ?>

<?php echo $footer; ?>