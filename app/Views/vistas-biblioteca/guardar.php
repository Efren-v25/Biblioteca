<?php echo $header;?> 
<style>
        body {
            font-family: Georgia, 'Times New Roman', Times, serif;
            background-color: #e6f3ff;
            color: #000;
            line-height: 1.6;
        }
        .container {
            width: 90%;
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }
        .row {
            display: flex;
            flex-wrap: wrap;
            margin: -10px;
        }
        .col-sm-7, .col-sm-5 {
            width: 100%;
            padding: 10px;
            box-sizing: border-box;
        }
        @media (min-width: 768px) {
            .col-sm-7 { width: 58.33%; }
            .col-sm-5 { width: 41.67%; }
        }
        .card {
            background-color:rgb(255, 255, 255);
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
            margin-bottom: 20px;
        }
        .card-body {
            padding: 20px;
        }
        .card-title {
            font-size: 1.25rem;
            margin-bottom: 15px;
        }
        .form-group {
            margin-bottom: 15px;
        }
        label {
            display: block;
            margin-bottom: 5px;
        }
        input[type="text"],
        input[type="file"] {
            width: 100%;
            padding: 8px;
            border: 1px solid #ddd;
            border-radius: 4px;
            box-sizing: border-box;
        }
        .btn {
            display: inline-block;
            padding: 10px 20px;
            background-color: #10006d;
            color: #fff;
            text-decoration: none;
            border-radius: 4px;
            border: none;
            cursor: pointer;
        }
        .btn:hover {
            color: rgb(0, 162, 255);
        }

        .text-danger {
            color: #dc3545;
        }
    </style>
<br><br>
<div class="container">
    <div class="row">
        <div class="col-sm-7">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Subir un archivo</h5>
                    <p class="card-text">

                    <!-- Formulario de los checkboxes dinamicos -->
                    <form method="post" action="<?= site_url('guardar'); ?>">
                        <label for="">Seleccione una carrera</label><br>
                        <input type="checkbox" name="checkbox_inf" value="informatica" 
                            onchange="this.form.submit()" 
                            <?php echo session("informatica") == 'informatica' ? 'checked' : ''; ?>>
                        Ingenieria Informatica
                        <input type="checkbox" name="checkbox_mar" value="maritima" 
                            onchange="this.form.submit()" 
                            <?php echo session("maritima") == 'maritima' ? 'checked' : ''; ?>>
                        Ingenieria Maritima
                    <!-- Mostrar los errores -->
                        <br><?php if (session("errores.checkbox")) : ?>
                                <div class="text-danger"><?= session("errores.checkbox") ?></div>
                            <?php endif; ?>
                                
                    </form>
                    
                    <!-- Formulario principal -->
                    <form method="post" action="<?= site_url('/guardado'); ?>" enctype="multipart/form-data">
                    <?php include("selectores.php"); ?>
                        <div class="form-group">
                            <label for="titulo">Título</label>
                            <input id="titulo" class="form-control" type="text" name="titulo" placeholder="Título" value="<?= old("titulo") ?>">
                            <?php if (session("errores.titulo")) : ?>
                                <div class="text-danger"><?= session("errores.titulo") ?></div>
                            <?php endif; ?>
                        </div>

                        <div class="form-group">
                            <label for="descripcion">Descripción</label>
                            <input id="descripcion" class="form-control" type="text" name="descripcion" placeholder="Descripción" value="<?= old("descripcion") ?>">
                            <?php if (session("errores.descripcion")) : ?>
                                <div class="text-danger"><?= session("errores.descripcion") ?></div>
                            <?php endif; ?>
                        </div>

                        <div class="form-group">
                            <label for="portada">Portada (opcional)</label>
                            <input id="portada" class="form-control" type="file" name="portada">
                            <?php if (session("errores.portada")) : ?>
                                <div class="text-danger"><?= session("errores.portada") ?></div>
                            <?php endif; ?>
                        </div>
                        
                        <div class="form-group">
                            <label for="archivo">Archivo</label>
                            <input id="archivo" class="form-control" type="file" name="archivo">
                            <?php if (session("errores.archivo")) : ?>
                                <div class="text-danger"><?= session("errores.archivo") ?></div>
                            <?php endif; ?>
                        </div>

                        <br><button class="btn" type="submit">Subir</button>
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
