<?php echo $header;?> 

<br><div class="container mt-5">
    <div class="row">
<?php foreach($favoritos as $favorito): ?>
<?php foreach($libros as $libro): ?>
    <?php if ($libro["id_libro"] == $favorito["id_libro"]) { ?> 
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
                        <?php } ?> 
                    </div>
                </div>
            </div>
    <?php } ?>
<?php endforeach; ?>
<?php endforeach; ?>
    </div>
</div><br>

<?php echo $footer; ?>
