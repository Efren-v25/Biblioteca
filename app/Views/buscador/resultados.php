<?php echo $header;?>
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
                    <img class="img-thumbnail" src="<?php echo base_url() ?>/uploads/portadas/<?php echo $resultado["portada"] ?>" width="100">
                </td>
                <td><?php echo $resultado['titulo'];?></td>
                
                <td><?php echo $resultado['archivo'];?></td>
                <td><?php echo $resultado['autor'];?></td>
            </tr>
        <?php endforeach;?>
    </tbody>
</table>

<?php echo $footer;?>