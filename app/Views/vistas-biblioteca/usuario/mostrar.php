<?= $header ?>
<style>
        body {
            font-family: 'Merriweather', serif;
            background-color:rgb(184, 227, 255);
            color: #000000;
            margin: 0;
            padding: 20px;
        }
        .table-container {
            max-width: 100%;
            overflow-x: auto;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            background-color: #fcffcf;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        th, td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #fcffcf;
        }
        th {
            background-color: #00a2ff;
            font-weight: bold;
        }
        .btn {
            display: inline-block;
            padding: 8px 16px;
            background-color: #00a2ff;
            color: #ffffff;
            text-decoration: none;
            border-radius: 4px;
            transition: background-color 0.3s;
        }
        .btn:hover {
            background-color: #00a2ff;
        }
        @media screen and (max-width: 600px) {
            table, tr, td {
                display: block;
            }
            thead {
                display: none;
            }
            tr {
                margin-bottom: 15px;
            }
            td {
                text-align: right;
                padding-left: 50%;
                position: relative;
            }
            td::before {
                content: attr(data-label);
                position: absolute;
                left: 6px;
                width: 45%;
                padding-right: 10px;
                white-space: nowrap;
                font-weight: bold;
                text-align: left;
            }
        }
    </style>
<br/>
<table class="table table-light">
    <thead class="thead-light">
        <tr>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>Correo</th>
            <th>Rango</th>
            <?php if(session()->get('id_usuario') == $id): ?>
            <th>Acciones</th>
            <?php endif ?>
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
            <?php if(session()->get('id_usuario') == $id): ?>
            <td>
                <a href="<?php echo base_url("usuario/" . $id . "/editar")?>" class="btn btn-primary" type="button">Editar</a>
            </td>
            <?php endif ?>
        </tr>
    </tbody>

</table>
<?= $footer ?>