<?= $header ?>
<br/>
<table class="table table-light">
    <thead class="thead-light">
        <tr>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>Correo</th>
            <th>Rango</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td><?= $usuario['nombre'] ?></td>
            <td><?= $usuario['apellido'] ?></td>
            <td><?= $usuario['correo'] ?></td>
            <td>
                <?php if($usuario['code'] == 138062){
                    echo "Profesor";
                }else{
                    echo "Estudiante";
                }?>
            </td>
            <td><a href="<?php echo base_url("usuario/" . $id . "/editar")?>" class="btn btn-primary" type="button">Editar</a></td>
        </tr>
    </tbody>

</table>
<?= $footer ?>