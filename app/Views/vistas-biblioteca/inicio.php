<?php echo $header; ?>

<style>
body {
            font-family: Georgia, 'Times New Roman', Times, serif;
            background-color: #E6F3FF;
            color: #000000;
            margin: 0;
            padding: 20px;
        }

        h2 {
            color: #000000;
        }

        .biblioteca {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-around;
            max-width: 1200px;
            margin: 0 auto;
        }

        .libro-card {
            background-color: #ffffe0;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            width: 250px;
            margin: 10px;
            display: flex;
            flex-direction: column;
        }

        .libro-portada {
            height: 260px;
            overflow: hidden;
        }

        .libro-portada img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .libro-info {
            padding: 16px;
            flex-grow: 1;
            display: flex;
            flex-direction: column;
        }

        .libro-titulo {
            margin: 0 0 8px 0;
            font-size: 1.2em;
            color: #000000;
        }

        .libro-autor {
            margin: 0 0 12px 0;
            color: #000000;
            font-style: italic;
        }

        .libro-generos {
            margin-bottom: 12px;
            flex-grow: 1;
        }

        .carrera {
            display: inline-block;
            background-color: #00a2ff;
            color: #000000;
            padding: 4px 8px;
            border-radius: 4px;
            font-size: 0.8em;
            margin-right: 4px;
            margin-bottom: 4px;
        }

        .libro-footer {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .libro-fecha {
            margin: 0;
            font-size: 0.8em;
            color: #000000;
            display: inline-block;
        }

        .star-button {
            width: 25px;
            height: 25px;
            border: none;
            outline: none;
            cursor: pointer;
            display: inline-block;
            clip-path: polygon(
                50% 0%,
                61% 35%,
                98% 35%,
                68% 57%,
                79% 91%,
                50% 70%,
                21% 91%,
                32% 57%,
                2% 35%,
                39% 35%
            );
            transition: transform 0.3s ease;
        }

        .star-button.fill{
            background-color: gold;
        }

        .star-button.empty{
            background-color: grey;
        }

        .star-button:hover {
            transform: scale(1.1);
        }

        .star-button:active {
            transform: scale(0.9);
        }

        @media (max-width: 1100px) {
            .biblioteca {
                justify-content: center;
            }
            .libro-card {
                width: calc(33.33% - 20px);
            }
        }

        @media (max-width: 768px) {
            .libro-card {
                width: calc(50% - 20px);
            }
        }

        @media (max-width: 480px) {
            .libro-card {
                width: 100%;
            }
        }
</style>

<?php if (session()->get("profesor")): ?> 
    <br><h2>Bienvenid@ Prof. <?php echo session("nombre") ." ". session("apellido"); ?></h2><br>
<?php else: ?>
    <br><h2>Bienvenid@ Estudiante <?php echo session("nombre") ." ". session("apellido"); ?></h2><br>
<?php endif ?>

    <h3>Te recomendamos los siguientes libros:</h3>
<div class="biblioteca">
<?php foreach ($libros as $libro): ?>
    <?php foreach ($etiquetas as $etiqueta): ?>
        <?php if ($etiqueta["id_libro"] == $libro["id_libro"]): ?>
        <div class="libro-card">
            <div class="libro-portada">
                <a href="<?= base_url('libros/' . $libro['id_libro'])?>"><img src="<?php echo base_url()?>/uploads/portadas/<?php echo $libro["portada"]?>" class="card-img-top img-fluid" alt="Card Image" "></a>
            </div>
            <div class="libro-info">
                <h2 class="libro-titulo"><?php echo $libro["titulo"] ?></h2>
                <p class="libro-autor"><?php echo $libro["autor"] ?><br></p>
                <div class="libro-generos">
                    <span class="carrera"><?php echo $etiqueta["carrera_mar"] ?></span>
                    <span class="carrera"><?php echo $etiqueta["carrera_inf"] ?></span>
                </div>
                <div class="libro-footer">
                <p class="libro-fecha"><?php echo $libro["fecha_subida"] ?></p>
                <?php if (in_array($libro["id_libro"], $favoritosIds)) { ?> 
                    <a href="<?php echo base_url("favsdelete/".$libro["id_libro"])?>" class="star-button fill" type="button"></a> 
                <?php } else { ?>
                    <a href="<?php echo base_url("favs/".$libro["id_libro"])?>" class="star-button empty" type="button"></a>
                <?php } ?>
                </div>
            </div>
        </div>
        <?php endif; ?>
    <?php endforeach; ?>
<?php endforeach; ?>
    </div>
</div><br>

<?php echo $footer; ?>

    
