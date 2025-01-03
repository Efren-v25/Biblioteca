<!DOCTYPE html>
<html>
<head>
    <title>Inicio</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>

    <ul class="nav nav-tabs" id="navId">
        <li class="nav-item">
            <a href="#tab1Id" class="nav-link active">NombreProyecto</a>
        </li>

        <li class="nav-item">
            <a href="#tab5Id" class="nav-link">Libros</a>
        </li>

        <li class="nav-item">
            <a href="<?php echo base_url("guardar") ?>" class="nav-link">Subir archivo</a>
        </li>

        <li class="nav-item">
            <a href="<?php echo base_url("listar") ?>" class="nav-link">Mis archivos</a>
        </li>

        <li class="nav-item">
            <a href="<?php echo base_url("salir") ?>" class="nav-link text-danger">Salir</a>
        </li>

        <li class="nav-item">
            <form action=<?php echo base_url('resultados')?> method="post">
                <input type="search" name="busqueda" placeholder="Busqueda..." >
                <button type="submit">Buscar</button>
            </form>
        </li>
    </ul>