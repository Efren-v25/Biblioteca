<!DOCTYPE html>
<html>
<head>
    <title>Inicio</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color:rgba(221, 221, 221, 0.88);
        }
        .navbar {
            background-color:rgb(255, 255, 255);
            padding: 1.4rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .menu {
            display: flex;
            gap: 1rem;
        }
        .menu a, .contacto {
            color: black;
            text-decoration: none;
            font-size: 1.2rem;
            position: relative;
            transition: color 0.3s ease;
        }
        .menu a:hover, .contacto:hover {
            color:rgb(0, 162, 255);
        }
        .salir:hover {
            color:rgb(128, 0, 0);
        }
        .menu-item {
            position: relative;
        }
        .submenu {
            display: none;
            position: absolute;
            background-color:rgba(255, 255, 255, 0.9);
            min-width: 150px;
            box-shadow: 0 8px 16px rgba(0,0,0,0.2);
            z-index: 1;
            top: 100%;
        }
        .menu-item:hover .submenu {
            display: block;
        }
        .submenu a {
            color: black;
            padding: 12px 16px;
            display: block;
            text-align: left;
        }
        .submenu a:hover {
            background-color:rgba(0, 0, 0, 0.09);
        }
        .end {
            justify-content: left;
            gap: 1rem;
            display: flex;
            padding: 0px 20px;
        }
        .salir {
            color: red;
            text-decoration: none;
            font-size: 1.2rem;
            position: relative;
            transition: color 0.3s ease;
        }
        
        .buscador{
            padding: 0px 0px 0px 31rem ;
        }
        .search-container {
            display: flex;
            align-items: center;
            background-color: #fff;
            border: 2px solid #ddd;
            border-radius: 50px;
            padding: 5px 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            width: 250px;
            height: 40px;
            max-width: 100%;
        }

        .search-container input[type="search"] {
            border: none;
            outline: none;
            padding: 10px;
            font-size: 16px;
            height: 20px;
            width: 100%;
            border-radius: 50px;
        }

        .search-container button {
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

        .search-container button svg {
            width: 24px;
            height: 24px;
            stroke:rgb(0, 0, 0);
            stroke-width: 2;
            fill: none;
        }

        .search-container button:hover svg {
            stroke:rgb(63, 134, 175);
        }
    </style>
</head>
<body>
<?php if(!session()->get('profesor')):?>
    <nav class="navbar">
        <div class="menu">
            <a href="<?= base_url('inicio')?>">Inicio</a>
            <div class="menu-item">
                <a href="<?= base_url('libros') ?>">Libros</a>
            </div>
            <a href="<?= base_url("favoritos")?>">Favoritos</a>
        </div>
        
        <div class="buscador">
        <form action=<?php echo base_url('resultados')?> method="post">
            <div class="search-container">
                <input type="search" name="busqueda" placeholder="Busqueda..." >
                <button type="submit">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                        <circle cx="11" cy="11" r="8"></circle>
                        <line x1="16" y1="16" x2="21" y2="21"></line>
                    </svg>
                </button> 
            </div>
        </form>
        </div>

        <div class="end">
        <a href="<?php echo base_url("salir") ?>" class="salir">Salir</a>
        <a href="<?= base_url('usuario/' . session()->get('id_usuario')) ?>" class="contacto">Mi Perfil</a>
        </div>
    </nav>

<?php else:?>
    <nav class="navbar">
        <div class="menu">
            <a href="<?= base_url('inicio_profesores')?>">Inicio</a>
            <div class="menu-item">
                <a href="<?= base_url('libros') ?>">Libros</a>
            </div>
            <a href="<?= base_url("favoritos")?>">Favoritos</a>
            <div class="menu-item">
                <a href="<?php echo base_url("guardar") ?>">Subir Archivo</a>
                <div class="submenu">
                    <a href="<?php echo base_url("listar") ?>">Mis Archivos</a>
                </div>
            </div>
        </div>

        <div class="buscador">
        <form action=<?php echo base_url('resultados')?> method="post">
            <div class="search-container">
                <input type="search" name="busqueda" placeholder="Busqueda..." >
                <button type="submit">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                        <circle cx="11" cy="11" r="8"></circle>
                        <line x1="16" y1="16" x2="21" y2="21"></line>
                    </svg>
                </button> 
            </div>
        </form>
        </div>

        <div class="end">
        <a href="<?php echo base_url("salir") ?>" class="salir">Salir</a>
        <a href="<?= base_url('usuario/' . session()->get('id_usuario')) ?>" class="contacto">Mi Perfil</a>
        </div>
    </nav>
<?php endif?>