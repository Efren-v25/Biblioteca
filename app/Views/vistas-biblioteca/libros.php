<?= $header ?>
<br/>
<div class="titulo-container">
    <h2 class="titulo">Todos los libros</h2>
</div>
<br/>
<style>
body {
    font-family: Georgia, 'Times New Roman', Times, serif;
    margin: 0;
    padding: 20px;
    background-color: #e6f3ff; /* Light sky blue background */
    color: black;
}

.titulo-container {
    display: flex;
    justify-content: center;
    align-items: start;
}

.titulo {
    display: flex;
    align-items: center;
    border-bottom: 2px solid #5a5a5a;
    width: 100%;
    max-width: 1100px;
    height: 50px;
    margin-bottom: 20px;
}

.container {
    max-width: 1000px;
    width: 100%;
    margin: 0 auto;
}

.libro-card {
    background-color: white;
    margin: 0 0 20px 0;
    padding: 20px;
    display: flex;
    gap: 20px;
    border-radius: 8px;
    box-shadow: 0 2px 4px rgba(0,0,0,0.1);
}

.libro-image {
    width: 180px;
    height: 240px;
    object-fit: cover;
    border-radius: 4px;
}

.libro-info {
    flex: 1;
}

.libro-title {
    font-size: 24px;
    margin: 0 0 15px 0;
    color: rgb(10, 10, 10);
}

.libro-data {
    background-color: #fff;
    padding: 15px;
}

.info-row {
    display: flex;
    margin-bottom: 10px;
    gap: 10px;
    align-items: flex-start;
}

.label {
    font-weight: bold;
    min-width: 100px;
    color: black; /* Changed from #5a5a5a to black */
}

.materias {
    display: flex;
    gap: 8px;
    flex-wrap: wrap;
}

.materia {
    background-color: #00a2ff;
    color: white;
    padding: 4px 12px;
    border-radius: 4px;
    font-size: 14px;
}

.archivo-info {
    margin-top: 20px;
    display: flex;
    align-items: center;
    justify-content: space-between;
    border-top: 1px solid #5a5a5a;
    padding-top: 15px;
}

.archivo-details {
    display: flex;
    align-items: center;
    gap: 15px;
}

.archivo {
    background-color: #020a7c;
    text-decoration: none;
    padding: 4px 12px;
    border-radius: 4px;
    color: white;
    transition: color 0.3s ease;
}

.archivo:hover {
    color: rgb(0, 162, 255);
}

.date {
    color: #5a5a5a;
    font-size: 14px;
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

.star-button.fill {
    background-color: gold;
}

.star-button.empty {
    background-color: grey;
}

.star-button:hover {
    transform: scale(1.1);
}

.star-button:active {
    transform: scale(0.9);
}

@media (max-width: 768px) {
    .libro-card {
        flex-direction: column;
    }

    .libro-image {
        width: 100%;
        height: auto;
        max-height: 300px;
    }

    .info-row {
        flex-direction: column;
    }

    .archivo-info {
        flex-direction: column;
        align-items: flex-start;
        gap: 10px;
    }
}
</style>

<body>
<?php foreach($resultados as $resultado):?>
    <div class="container">
        <div class="libro-card">
            <a href="<?= base_url('libros/'. $resultado['id_libro'])?>">
                <img class="libro-image" src="<?= base_url('uploads/portadas/' . $resultado['portada']) ?>" width="100">
            </a>
            <div class="libro-info">
                <h2 class="libro-title"><?php echo $resultado['titulo'];?></h2>
                <div class="libro-data">
                    <div class="info-row">
                        <span class="label">Carreras:</span>
                        <div class="materias">
                            <?php if($resultado['carrera_inf'] != 'no') :?>
                                <span class="materia">Informática</span>
                            <?php endif ?>
                            <?php if($resultado['carrera_mar'] != 'no') :?>
                                <span class="materia">Marítima</span>
                            <?php endif ?>
                        </div>
                    </div>
                    <div class="info-row">
                        <span class="label">Materia:</span>
                        <div class="materias">
                            <span class="materia"><?= $resultado['materia']?></span>
                        </div>
                    </div>
                    <div class="info-row">
                        <span class="label">Subido por:</span>
                        <span class="label" style="margin-left: 20px;"><?php echo $resultado['autor'];?></span>
                    </div>
                    <div class="archivo-info">
                        <div class="archivo-details">
                            <a class="archivo" href="<?= base_url('uploads/archivos/' . $resultado['archivo']) ?>">Leer</a>
                            <span class="label">Fecha de Subida:</span>
                            <span class="date"><?= $resultado['fecha_subida']?></span>
                        </div>
                        <div class="rating">
                            <?php if (in_array($resultado["id_libro"], $favoritosIds)) { ?> 
                                <a href="<?php echo base_url("favsdelete/".$resultado["id_libro"])?>" class="star-button fill" type="button"></a> 
                            <?php } else { ?>
                                <a href="<?php echo base_url("favs/".$resultado["id_libro"])?>" class="star-button empty" type="button"></a>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php endforeach;?>
<?= $footer ?>