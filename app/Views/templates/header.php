<!DOCTYPE html>
<html>
<head>
    <title>Inicio</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Merriweather:wght@400;700&family=Work+Sans:wght@400;600&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        :root {
            --ink: #1f2a44;
            --ink-soft: #3a4a6a;
            --accent: #1f6fb2;
            --accent-2: #0f3d66;
            --paper: #f7f2e8;
            --highlight: #f7e8b5;
            --danger: #b3261e;
            --shadow: 0 10px 24px rgba(0, 0, 0, 0.12);
        }

        body {
            font-family: "Work Sans", Arial, sans-serif;
            margin: 0;
            padding: 0;
            background:
                radial-gradient(1200px 300px at 10% -10%, #f7f0d8 0%, transparent 60%),
                radial-gradient(900px 300px at 90% -20%, #e4f0ff 0%, transparent 55%),
                #eef1f6;
            color: var(--ink);
        }

        .navbar {
            background: linear-gradient(120deg, var(--paper), #d8dfff 60%, #fdfcbc 100%);
            border-bottom: 1px solid rgba(31, 42, 68, 0.08);
            padding: 1rem 1.25rem;
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            align-items: center;
            gap: 0.75rem 1.5rem;
            box-shadow: var(--shadow);
        }

        .brand {
            display: inline-flex;
            align-items: center;
            gap: 0.6rem;
            font-family: "Merriweather", Georgia, serif;
            font-size: 1.25rem;
            color: var(--ink);
            text-decoration: none;
            letter-spacing: 0.3px;
        }

        .brand-badge {
            width: 40px;
            height: 36px;
            border-radius: 10px;
            background: linear-gradient(145deg, var(--highlight), #ffffff);
            border: 1px solid rgba(31, 42, 68, 0.12);
            display: inline-flex;
            align-items: center;
            justify-content: center;
            font-weight: 700;
            font-size: 0.9rem;
            line-height: 1;
            color: var(--accent-2);
            letter-spacing: 0.5px;
        }

        .brand-logo {
            width: 42px;
            height: 42px;
            border-radius: 10px;
            object-fit: contain;
            background: #ffffff;
            border: 1px solid rgba(31, 42, 68, 0.12);
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.12);
        }

        .menu {
            display: flex;
            flex-wrap: wrap;
            gap: 0.75rem 1rem;
            margin-top: 0;
            position: relative;
            align-items: center;
        }

        .menu a, .contacto {
            color: var(--ink);
            text-decoration: none;
            font-size: 1.02rem;
            font-weight: 600;
            position: relative;
            padding: 0.3rem 0.6rem;
            border-radius: 999px;
            transition: color 0.2s ease, background-color 0.2s ease;
            display: inline-flex;
            align-items: center;
        }

        .menu a:hover, .contacto:hover {
            color: var(--accent);
            background-color: rgba(31, 111, 178, 0.08);
        }

        .salir:hover {
            color: var(--danger);
        }

        .menu-item {
            position: relative;
            display: inline-flex;
            align-items: center;
        }

        .submenu {
            display: none;
            position: absolute;
            background-color: #ffffff;
            min-width: 170px;
            border-radius: 12px;
            box-shadow: var(--shadow);
            z-index: 1;
            top: 115%;
            left: 0;
            padding: 0.4rem;
            border: 1px solid rgba(31, 42, 68, 0.08);
        }

        .menu-item:hover .submenu {
            display: block;
        }

        .submenu a {
            color: var(--ink);
            padding: 0.5rem 0.75rem;
            display: block;
            text-align: left;
            border-radius: 8px;
        }

        .submenu a:hover {
            background-color: rgba(31, 42, 68, 0.06);
        }

        .end {
            display: flex;
            gap: 0.75rem;
            margin-top: 0;
            align-items: center;
            position: relative;
            z-index: 2;
        }

        .salir {
            color: var(--danger);
            text-decoration: none;
            font-size: 1.02rem;
            font-weight: 600;
            padding: 0.3rem 0.6rem;
            border-radius: 999px;
            transition: color 0.2s ease, background-color 0.2s ease;
        }

        .salir:hover {
            background-color: rgba(179, 38, 30, 0.08);
        }

        .buscador {
            width: 100%;
            max-width: 320px;
            margin: 0.25rem 0;
            flex: 0 1 320px;
            position: relative;
            z-index: 1;
        }

        .search-container {
            display: flex;
            align-items: center;
            background-color: #fff;
            border: 1px solid rgba(31, 42, 68, 0.15);
            border-radius: 999px;
            padding: 6px 12px;
            box-shadow: 0 6px 14px rgba(31, 42, 68, 0.08);
            width: 100%;
            height: 42px;
        }

        .search-container input[type="search"] {
            border: none;
            outline: none;
            padding: 4px 6px;
            font-size: 15px;
            height: 20px;
            width: 100%;
            border-radius: 999px;
            font-family: "Work Sans", Arial, sans-serif;
        }

        .search-container button {
            background: linear-gradient(135deg, var(--accent), var(--accent-2));
            border: none;
            outline: none;
            cursor: pointer;
            height: 30px;
            width: 30px;
            border-radius: 50%;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 0;
            margin-left: 6px;
            transition: transform 0.2s ease;
        }

        .search-container button:hover {
            transform: scale(1.06);
        }

        .search-container button svg {
            width: 16px;
            height: 16px;
            stroke: #fff;
            stroke-width: 2.5;
            fill: none;
        }

        @media (max-width: 768px) {
            .navbar {
                flex-direction: column;
                align-items: stretch;
            }
            .menu, .end {
                width: 100%;
                justify-content: space-between;
            }
            .buscador {
                order: -1;
                margin-bottom: 0.75rem;
            }
            .submenu {
                position: static;
                display: none;
                background-color: transparent;
                box-shadow: none;
                border: none;
                padding: 0;
            }
            .menu-item:hover .submenu {
                display: block;
            }
        }
    </style>
</head>
<body>
    <nav class="navbar">
        <a class="brand" href="<?= base_url('inicio')?>">
            <img class="brand-logo" src="<?= base_url('img/logo_umc.png') ?>" alt="Logo UMC">
            Biblioteca Virtual
        </a>
        <div class="menu">
            <a href="<?= base_url('inicio')?>">Inicio</a>
            <div class="menu-item">
                <a href="<?= base_url('libros') ?>">Libros</a>
            </div>
            <a href="<?= base_url("favoritos")?>">Favoritos</a>
            <?php if(session()->get('profesor')):?>
            <div class="menu-item">
                <a href="<?php echo base_url("guardar") ?>">Subir Archivo</a>
                <div class="submenu">
                    <a href="<?php echo base_url("listar") ?>">Mis Archivos</a>
                </div>
            </div>
            <?php endif ?>
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
        <?php if (session()->get('id_usuario')): ?>
            <a href="<?= base_url('usuario/' . session()->get('id_usuario')) ?>" class="contacto">Mi Perfil</a>
        <?php else: ?>
            <a href="<?= base_url('login') ?>" class="contacto">Iniciar sesión</a>
        <?php endif ?>
        </div>
    </nav>
