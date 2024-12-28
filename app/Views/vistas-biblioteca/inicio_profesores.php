<?php echo $header; ?>

<br><h2>Bienvenid@ Sr. <?php echo session("nombre") ." ". session("apellido"); ?></h2>

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

<br><div class="container mt-5">
    <div class="row">
<?php foreach($libros as $libro): ?>
            <div class="col-md-3">
                <div class="card">
                    <img src="<?php echo base_url()?>/uploads/portadas/<?php echo $libro["portada"]?>" class="card-img-top img-fluid" alt="Card Image" ">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $libro["titulo"] ?></h5>
                    </div>
                    <div class="card-footer text-muted">
                        by <?php echo $libro["autor"] ?><br>
                    </div>
                </div>
            </div>
<?php endforeach; ?>
    </div>
</div>

<?php echo $footer; ?>
