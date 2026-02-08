<?php echo $header; ?>
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
    border-bottom: 2px solid rgba(31, 42, 68, 0.25);
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
    background: linear-gradient(150deg, #fffdf3 0%, #ffffff 55%, #eef6ff 100%);
    margin: 0 0 20px 0;
    padding: 20px;
    display: flex;
    gap: 20px;
    border-radius: 14px;
    border: 1px solid rgba(31, 42, 68, 0.08);
    box-shadow: 0 8px 18px rgba(0,0,0,0.08);
    transition: transform 0.25s ease, box-shadow 0.25s ease;
}

.libro-card:hover {
    transform: translateY(-6px);
    box-shadow: 0 16px 28px rgba(0,0,0,0.14);
}

.libro-image {
    width: 180px;
    height: 240px;
    object-fit: cover;
    border-radius: 10px;
    box-shadow: 0 10px 18px rgba(0,0,0,0.12);
    transition: transform 0.35s ease;
}

.libro-card:hover .libro-image {
    transform: scale(1.04);
}

.libro-info {
    flex: 1;
}

.libro-title {
    font-size: 24px;
    margin: 0 0 15px 0;
    color: #0f3d66;
}

.libro-data {
    background-color: transparent;
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
    color: #1f2a44;
}

.materias {
    display: flex;
    gap: 8px;
    flex-wrap: wrap;
}

.materia {
    background: linear-gradient(135deg, #e2f0ff, #ffffff);
    color: #1f2a44;
    padding: 4px 12px;
    border-radius: 999px;
    font-size: 14px;
    border: 1px solid rgba(31, 42, 68, 0.12);
}

.archivo-info {
    margin-top: 20px;
    display: flex;
    align-items: center;
    justify-content: space-between;
    border-top: 1px solid rgba(31, 42, 68, 0.18);
    padding-top: 15px;
}

.archivo-details {
    display: flex;
    align-items: center;
    gap: 15px;
}

.archivo {
    background: linear-gradient(135deg, #1f6fb2, #0f3d66);
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
    color: #3a4a6a;
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
    .archivo-msg {
        position: center;
        text-align: center;
        margin-top: 20px;
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
<br>
<div class="titulo-container">
    <h2 class="titulo">Mis Archivos</h2>
</div>
<br>
<?php if (!empty($libros)): ?>
    <?php foreach ($libros as $libro): ?>
        <div class="container">
        <div class="libro-card">
            <a href="<?= base_url('libros/'. $libro['id_libro'])?>">
                <img class="libro-image" src="<?= base_url('uploads/portadas/' . $libro['portada']) ?>" width="100">
            </a>
            <div class="libro-info">
                <h2 class="libro-title"><?php echo $libro['titulo'];?></h2>
                <div class="libro-data">
                    <div class="info-row">
                        <span class="label">Carreras:</span>
                        <div class="materias">
                            <?php if($libro['carrera_inf'] != 'no') :?>
                                <span class="materia">Informática</span>
                            <?php endif ?>
                            <?php if($libro['carrera_mar'] != 'no') :?>
                                <span class="materia">Marítima</span>
                            <?php endif ?>
                        </div>
                    </div>
                    <div class="info-row">
                        <span class="label">Materia:</span>
                        <div class="materias">
                            <span class="materia"><?= $libro['materia']?></span>
                        </div>
                    </div>
                    <div class="info-row">
                        <span class="label">Subido por:</span>
                        <span class="label" style="margin-left: 20px;"><?php echo $libro['autor'];?></span>
                    </div>
                    <div class="archivo-info">
                        <div class="archivo-details">
                            <a class="archivo" href="<?= base_url('uploads/archivos/' . $libro['archivo']) ?>">Leer</a>
                            <a href="<?php echo base_url("editar/".$libro["id_libro"])?>" class="btn btn-primary" type="button">Editar</a>
                            <a href="<?php echo base_url("borrar/".$libro["id_libro"])?>" class="btn btn-danger" onclick="return confirm('¿Estás seguro de que quieres borrar este empleado?')" type="button">Borrar</a>
                            <?php if ($libro["visible"] == '1') { ?> 
                                <a href="<?php echo base_url("ocultar/".$libro["id_libro"])?>" class="btn btn-warning" type="button">Ocultar</a> 
                            <?php } else { ?> 
                                <a href="<?php echo base_url("mostrar/".$libro["id_libro"])?>" class="btn btn-warning" type="button">Mostrar</a> 
                            <?php } ?> 
                            <span class="label">Fecha de Subida:</span>
                            <span class="date"><?= $libro['fecha_subida']?></span>
                        </div>
                        <div class="rating">
                            <?php if (in_array($libro["id_libro"], $favoritosIds)) { ?> 
                                <a href="<?php echo base_url("favsdelete/".$libro["id_libro"])?>" class="star-button fill" type="button"></a> 
                            <?php } else { ?>
                                <a href="<?php echo base_url("favs/".$libro["id_libro"])?>" class="star-button empty" type="button"></a>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php endforeach; ?>
<?php else: ?>
   <h4 class="archivo-msg">No has subido ningún libro todavía.</h4>
<?php endif; ?>

<?php echo $footer; 
