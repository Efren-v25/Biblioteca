<?php echo $header; ?>

<br><h2>Bienvenid@, <?php echo session("nombre") ." ". session("apellido") ?></h2>

<style>
    .card-img-top {
        object-fit: cover;
        height: 150px; 
    }
    .card-img-top {
            object-fit: cover;
            height: 200px; /* Ajusta el alto según sea necesario */
        }
</style>
<?php if (!empty($libros)): ?>
<br><div class="container mt-5">
    <div class="row">
<?php foreach($libros as $libro): ?>
            <div class="col-md-3">
                <div class="card">
                    <a href="<?= base_url('libros/' . $libro['id_libro'])?>"><img src="<?php echo base_url()?>/uploads/portadas/<?php echo $libro["portada"]?>" class="card-img-top img-fluid" alt="Card Image" "></a>
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $libro["titulo"] ?></h5>
                    </div>
                    <div class="card-footer text-muted">
                        by <?php echo $libro["autor"] ?><br> 

                        <?php if (in_array($libro["id_libro"], $favoritosIds)) { ?> 
                            <a href="<?php echo base_url("favsdelete/".$libro["id_libro"])?>" class="btn btn-warning" type="button">Quitar de favoritos</a> 
                        <?php } else { ?>
                            <a href="<?php echo base_url("favs/".$libro["id_libro"])?>" class="btn btn-warning" type="button">Añadir a Favoritos</a>
                        <?php } ?>
                    </div>
                   
                </div>
            </div>
<?php endforeach; ?>
    </div>
</div><br>
<?php else: ?>
    <br><h3>No hay libros para mostrar aun.</h3>
<?php endif; ?>

<?php echo $footer; ?>


    
    
