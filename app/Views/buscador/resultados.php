<?php echo $header;?>

<table>
    <thead>Título </thead>
    <thead>Portada </thead>
    <thead>Archivo </thead>
    <thead>Autor </thead>
    <tbody>
        <?php foreach($resultados as $resultado):?>
            <tr>
                <td><?php echo $resultado['titulo'];?></td>
                <td><?php echo $resultado['portada'];?></td>
                <td><?php echo $resultado['archivo'];?></td>
                <td><?php echo $resultado['autor'];?></td>
            </tr>
        <?php endforeach;?>
    </tbody>
</table>

<?php echo $footer;?>