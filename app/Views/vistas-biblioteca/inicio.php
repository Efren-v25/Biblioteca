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

        .welcome {
            max-width: 900px;
            margin: 10px auto 24px auto;
            text-align: center;
            background: linear-gradient(120deg, #fff7da 0%, #fff7da 60%, #fff7da 100%);
            border: 1px solid rgba(31, 42, 68, 0.12);
            box-shadow: 0 12px 24px rgba(0, 0, 0, 0.08);
            border-radius: 16px;
            padding: 18px 20px;
        }

        .welcome-title {
            margin: 0;
            font-size: 1.9rem;
            font-weight: 700;
            color: #0f3d66;
        }

        .welcome-subtitle {
            margin: 6px 0 0 0;
            font-size: 1.1rem;
            color: #3a4a6a;
        }

        .biblioteca {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-around;
            max-width: 1200px;
            margin: 0 auto;
        }

        .libro-card {
            background: linear-gradient(160deg, #fffdf3 0%, #ffffff 55%, #eef6ff 100%);
            border-radius: 14px;
            border: 1px solid rgba(31, 42, 68, 0.08);
            box-shadow: 0 8px 18px rgba(0, 0, 0, 0.08);
            overflow: hidden;
            width: 250px;
            margin: 10px;
            display: flex;
            flex-direction: column;
            transition: transform 0.25s ease, box-shadow 0.25s ease;
        }

        .libro-card:hover {
            transform: translateY(-6px);
            box-shadow: 0 16px 28px rgba(0, 0, 0, 0.14);
        }

        .libro-portada {
            height: 260px;
            overflow: hidden;
        }

        .libro-portada img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.35s ease;
        }

        .libro-card:hover .libro-portada img {
            transform: scale(1.05);
        }

        .libro-info {
            padding: 16px;
            flex-grow: 1;
            display: flex;
            flex-direction: column;
        }

        .libro-titulo {
            margin: 0 0 8px 0;
            font-size: 1.15em;
            color: #0f3d66;
        }

        .libro-autor {
            margin: 0 0 12px 0;
            color: #3a4a6a;
            font-style: italic;
        }

        .libro-generos {
            margin-bottom: 12px;
            flex-grow: 1;
        }

        .carrera {
            display: inline-block;
            background: linear-gradient(135deg, #e2f0ff, #ffffff);
            color: #1f2a44;
            padding: 4px 10px;
            border-radius: 999px;
            font-size: 0.78em;
            margin-right: 6px;
            margin-bottom: 6px;
            border: 1px solid rgba(31, 42, 68, 0.12);
        }

        .libro-footer {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .libro-fecha {
            margin: 0;
            font-size: 0.8em;
            color: #3a4a6a;
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
            transform: scale(1.12);
        }

        .star-button:active {
            transform: scale(0.95);
        }

        .reveal {
            opacity: 0;
            transform: translateY(16px);
            transition: opacity 0.5s ease, transform 0.5s ease;
        }

        .reveal.is-visible {
            opacity: 1;
            transform: translateY(0);
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

<div class="welcome">
<?php if (session()->get("profesor")): ?> 
    <h2 class="welcome-title">Bienvenid@ Prof. <?php echo session("nombre") ." ". session("apellido"); ?></h2>
<?php else: ?>
    <h2 class="welcome-title">Bienvenid@ Estudiante <?php echo session("nombre") ." ". session("apellido"); ?></h2>
<?php endif ?>
    <h3 class="welcome-subtitle">Te recomendamos los siguientes libros:</h3>
</div>
<div class="biblioteca">
<?php foreach ($libros as $libro): ?>
    <?php foreach ($etiquetas as $etiqueta): ?>
        <?php if ($etiqueta["id_libro"] == $libro["id_libro"]): ?>
        <div class="libro-card reveal">
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

<script>
    const cards = document.querySelectorAll(".reveal");
    const observer = new IntersectionObserver(
        (entries) => {
            entries.forEach((entry) => {
                if (entry.isIntersecting) {
                    entry.target.classList.add("is-visible");
                    observer.unobserve(entry.target);
                }
            });
        },
        { threshold: 0.2 }
    );

    cards.forEach((card) => observer.observe(card));
</script>

<?php echo $footer; ?>

    
