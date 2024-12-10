<?php echo $header; ?>

<div class="card">
    <div class="card-body">
        <h4 class="card-title">Subir archivo</h4>
        <p class="card-text">
            <form method="post" action="" enctype="multipart/form-data">

                <div class="form-group">
                    <label for="my-input">Nombre del archivo</label>
                    <input id="my-input" class="form-control" type="text" name="">
                </div>

                <div class="form-group">
                    <label for="my-input">Categoria</label> <br>
                    <select name="" id="">
                        <option value=""></option>
                        <option value="">Calculo</option>
                        <option value="">Fisica</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="my-input">Text</label>
                    <input id="my-input" class="form-control" type="text" name="">
                </div>
            </form>
        </p>
    </div>
</div>


<?php echo $footer; ?>


    
    
