<?php echo $header;?> 

<br><br>
<div class="container">
    <div class="row">
        <div class="col-sm-7">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Subir un archivo</h5>
                    <p class="card-text">

                    <!-- Formulario de los checkboxes dinamicos -->
                    <form method="post" action="<?= site_url('editar'); ?>">
                    <input type="hidden" name="id_libro" value="<?php echo $libro["id_libro"]?>">
                        <label for="">Seleccione una carrera</label><br>
                        <input type="checkbox" name="checkbox_inf" value="informatica" 
                            onchange="this.form.submit()" 
                            
                            <?= (session('informatica') === 'informatica' || (session('informatica') === null && $etiqueta["carrera_inf"] === "informatica" )) ? 'checked' : ''; ?>>
                        Ingenieria Informatica

                        <input type="checkbox" name="checkbox_mar" value="maritima" 
                            onchange="this.form.submit()" 
                            <?= (session('maritima') === 'maritima' || (session('maritima') === null && $etiqueta["carrera_mar"] === "maritima" )) ? 'checked' : ''; ?>>
                        Ingenieria Maritima

                    <!-- Mostrar los errores -->
                        <br><?php if (session("errores.checkbox")) : ?>
                                <div class="text-danger"><?= session("errores.checkbox") ?></div>
                            <?php endif; ?>
                                
                    </form>
                    
                    <!-- Formulario principal -->
                    <form method="post" action="<?= site_url('actualizar'); ?>" enctype="multipart/form-data">
                    <input type="hidden" name="id_libro" value="<?php echo $libro["id_libro"]?>">
                    <?php include("selectoresEditar.php"); ?>
                        <div class="form-group">

                            <label for="titulo">Título</label>
                            <input id="titulo" class="form-control" type="text" name="titulo" placeholder="Título" value="<?php echo $libro["titulo"]?>">
                            <?php if (session("errores.titulo")) : ?>
                                <div class="text-danger"><?= session("errores.titulo") ?></div>
                            <?php endif; ?>
                        </div>

                        <div class="form-group">
                            <label for="descripcion">Descripción (50 caracteres)</label>
                            <input id="descripcion" class="form-control" type="text" name="descripcion" placeholder="Descripción" value="<?= $libro['descripcion'] ?>">
                            <?php if (session("errores.descripcion")) : ?>
                                <div class="text-danger"><?= session("errores.descripcion") ?></div>
                            <?php endif; ?>
                        </div>

                        <div class="form-group">
                            <label for="portada">Portada (opcional)</label>
                            <br><img class="img-thumbnail" src= "<?php echo base_url()?>/uploads/portadas/<?php echo $libro["portada"]?>" width="100">
                            <input id="portada" class="form-control" type="file" name="portada">
                            <?php if (session("errores.portada")) : ?>
                                <div class="text-danger"><?= session("errores.portada") ?></div>
                            <?php endif; ?>
                        </div>
                        
                        <div class="form-group">
                            <label for="archivo">Archivo</label>
                            <?php echo $libro["archivo"]?>
                            <input id="archivo" class="form-control" type="file" name="archivo">
                            <?php if (session("errores.archivo")) : ?>
                                <div class="text-danger"><?= session("errores.archivo") ?></div>
                            <?php endif; ?>
                        </div>

                        <br><button class="btn btn-success" type="submit">Actualizar</button>
                        <a href="<?php echo base_url("listar?clic=true") ?>" class="btn btn-danger">Volver</a>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-sm-5">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Tarjeta</h5>
                    <p class="card-text">Agrega algo aquí.</p>
                </div>
            </div>
        </div>
    </div>
</div>


<?php echo $footer; ?>