<?php echo $header;?> 
<style>
        body {
            font-family: "Work Sans", Arial, sans-serif;
            background-color: #e6f3ff;
            color: #1f2a44;
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
            .col-sm-7 { width: 100%; }
            .col-sm-5 { width: 41.67%; }
        }
        .card {
            background: linear-gradient(150deg, #fffdf3 0%, #ffffff 55%, #eef6ff 100%);
            border-radius: 16px;
            border: 1px solid rgba(31, 42, 68, 0.08);
            box-shadow: 0 12px 24px rgba(0,0,0,0.12);
            margin-bottom: 20px;
        }
        .card-body {
            padding: 20px;
        }
        .card-title {
            font-size: 1.3rem;
            margin-bottom: 15px;
            color: #0f3d66;
        }
        .form-group {
            margin-bottom: 15px;
        }
        label {
            display: block;
            margin-bottom: 5px;
            font-weight: 600;
        }
        input[type="text"],
        input[type="file"] {
            width: 100%;
            padding: 10px 12px;
            border: 1px solid rgba(31, 42, 68, 0.16);
            border-radius: 10px;
            box-sizing: border-box;
            background: #f8fbff;
        }
        select {
            width: 100%;
            padding: 10px 12px;
            border: 1px solid rgba(31, 42, 68, 0.16);
            border-radius: 10px;
            background: #f8fbff;
            font-size: 14px;
            appearance: none;
            background-image:
                linear-gradient(45deg, transparent 50%, #1f2a44 50%),
                linear-gradient(135deg, #1f2a44 50%, transparent 50%);
            background-position:
                calc(100% - 18px) 55%,
                calc(100% - 12px) 55%;
            background-size: 6px 6px, 6px 6px;
            background-repeat: no-repeat;
        }
        .btn {
            display: inline-block;
            padding: 10px 20px;
            background: linear-gradient(135deg, #1f6fb2, #0f3d66);
            color: #fff;
            text-decoration: none;
            border-radius: 999px;
            border: none;
            cursor: pointer;
            font-weight: 600;
            transition: transform 0.2s ease, box-shadow 0.2s ease;
        }
        .btn:hover {
            transform: translateY(-1px);
            box-shadow: 0 10px 18px rgba(31, 42, 68, 0.18);
            color: #ffffff;
        }
        .btn-success {
            background: linear-gradient(135deg, #28a745, #218838);
        }
        .btn-danger {
             background: linear-gradient(135deg, #dc3545, #c82333);
        }S

        .text-danger {
            color: #dc3545;
        }

        .checkbox-row {
            display: flex;
            flex-wrap: wrap;
            gap: 12px 18px;
            margin-top: 8px;
        }

        .checkbox-row label {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            font-weight: 500;
            background: #ffffff;
            border: 1px solid rgba(31, 42, 68, 0.12);
            border-radius: 999px;
            padding: 6px 10px;
            box-shadow: 0 6px 12px rgba(0,0,0,0.08);
        }

        .preview {
            display: flex;
            align-items: center;
            gap: 12px;
            margin-top: 10px;
        }

        .preview img {
            width: 140px;
            height: 180px;
            object-fit: cover;
            border-radius: 12px;
            border: 1px solid rgba(31, 42, 68, 0.12);
            box-shadow: 0 10px 18px rgba(0,0,0,0.12);
            background: #ffffff;
            /* display: none; */ 
        }

        .helper {
            font-size: 0.85rem;
            color: #3a4a6a;
        }

        .materia-group {
            display: none;
            margin-top: 12px;
        }
    </style>
<br><br>
<div class="container">
    <div class="row">
        <div class="col-sm-7">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Editar libro</h5>
                    <p class="card-text">

                    <!-- Formulario de los checkboxes dinamicos -->
                    <form method="post" action="<?= site_url('editar'); ?>" id="carreraForm">
                    <input type="hidden" name="id_libro" value="<?php echo $libro["id_libro"]?>">
                        <label for="">Seleccione una carrera</label>
                        <div class="checkbox-row">
                            <label>
                                <input type="checkbox" name="checkbox_inf" value="informatica" id="checkbox_inf"
                                    <?php echo (session("informatica") == 'informatica' || (session('informatica') === null && $etiqueta["carrera_inf"] === "informatica")) ? 'checked' : ''; ?>>
                                Ingenieria Informatica
                            </label>
                            <label>
                                <input type="checkbox" name="checkbox_mar" value="maritima" id="checkbox_mar"
                                    <?php echo (session("maritima") == 'maritima' || (session('maritima') === null && $etiqueta["carrera_mar"] === "maritima")) ? 'checked' : ''; ?>>
                                Ingenieria Maritima
                            </label>
                            <label>
                                <input type="checkbox" name="checkbox_otros" value="otros" id="checkbox_otros"
                                    <?php echo (session("otros") == 'otros' || (session('otros') === null && isset($etiqueta["carrera_otros"]) && $etiqueta["carrera_otros"] === "otros")) ? 'checked' : ''; ?>>
                                Otros
                            </label>
                        </div>
                    <!-- Mostrar los errores -->
                        <br><?php if (session("errores.checkbox")) : ?>
                                <div class="text-danger"><?= session("errores.checkbox") ?></div>
                            <?php endif; ?>
                                
                    </form>
                    
                    <!-- Formulario principal -->
                    <form method="post" action="<?= site_url('actualizar'); ?>" enctype="multipart/form-data">
                    <input type="hidden" name="id_libro" value="<?php echo $libro["id_libro"]?>">
                    <?php include("selectores.php"); ?>
                        <div class="form-group">
                            <label for="titulo">Título</label>
                            <input id="titulo" class="form-control" type="text" name="titulo" placeholder="Título" value="<?php echo $libro["titulo"]?>">
                            <?php if (session("errores.titulo")) : ?>
                                <div class="text-danger"><?= session("errores.titulo") ?></div>
                            <?php endif; ?>
                        </div>

                        <div class="form-group">
                            <label for="descripcion">Descripción</label>
                            <input id="descripcion" class="form-control" type="text" name="descripcion" placeholder="Descripción" value="<?= $libro['descripcion'] ?>">
                            <?php if (session("errores.descripcion")) : ?>
                                <div class="text-danger"><?= session("errores.descripcion") ?></div>
                            <?php endif; ?>
                        </div>

                        <div class="form-group">
                            <label for="portada">Portada (opcional)</label>
                            <div class="preview">
                                <img id="portadaPreview" class="img-thumbnail" src= "<?php echo base_url()?>/uploads/portadas/<?php echo $libro["portada"]?>" alt="Portada actual">
                            </div>
                            <input id="portada" class="form-control" type="file" name="portada">
                            <?php if (session("errores.portada")) : ?>
                                <div class="text-danger"><?= session("errores.portada") ?></div>
                            <?php endif; ?>
                        </div>
                        
                        <div class="form-group">
                            <label for="archivo">Archivo</label>
                            <p>Actual: <?php echo $libro["archivo"]?></p>
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
        
    </div>
</div>

<script>
    const portadaInput = document.querySelector("#portada");
    const portadaPreview = document.querySelector("#portadaPreview");
    if (portadaInput && portadaPreview) {
        portadaInput.addEventListener("change", (event) => {
            const file = event.target.files && event.target.files[0];
            if (!file) {
               // Don't clear if user cancels, or revert to original? 
               // For now simple preview logic
               return;
            }
            const reader = new FileReader();
            reader.onload = (e) => {
                portadaPreview.src = e.target.result;
                portadaPreview.style.display = "block";
            };
            reader.readAsDataURL(file);
        });
    }

    const carreraForm = document.querySelector("#carreraForm");
    const checkInf = document.querySelector("#checkbox_inf");
    const checkMar = document.querySelector("#checkbox_mar");
    const checkOtros = document.querySelector("#checkbox_otros");
    const materiaGroups = document.querySelectorAll(".materia-group");
    const materiaSelects = document.querySelectorAll(".materia-select");

    // Pre-fill values from PHP
    const savedMateria = "<?= $etiqueta['materia'] ?>";
    const savedSemestre = "<?= $etiqueta['semestre'] ?>";

    const setVisibleGroup = () => {
        const inf = checkInf && checkInf.checked;
        const mar = checkMar && checkMar.checked;
        const otros = checkOtros && checkOtros.checked;
        let target = null;

        if (otros) {
            target = "otros"; 
        } else if (inf && mar) target = "both";
        else if (inf) target = "inf";
        else if (mar) target = "mar";

        materiaGroups.forEach((group) => {
            const isTarget = group.dataset.carrera === target;
            if (otros) {
                 group.style.display = "none";
                const select = group.querySelector(".materia-select");
                 if (select) {
                    select.disabled = true;
                    select.required = false;
                }
            } else {
                group.style.display = isTarget ? "block" : "none";
                const select = group.querySelector(".materia-select");
                if (select) {
                    select.disabled = !isTarget;
                    select.required = isTarget;
                    if (isTarget && select.value !== savedMateria) {
                        // Attempt to pre-select if value matches, but only if not already selected
                        // Actually, we just want to ensure if it IS the target group, the saved value is selected if possible.
                         if (savedMateria && select.querySelector(`option[value="${savedMateria}"]`)) {
                             select.value = savedMateria;
                         }
                    }
                }
            }
        });
        
        // Also handle semestre pre-fill
        const semestreSelect = document.querySelector("#semestre");
        if (semestreSelect && savedSemestre) {
            semestreSelect.value = savedSemestre;
        }
    };

    const syncSession = () => {
        if (!carreraForm) return;
        const formData = new FormData(carreraForm);
        fetch("<?= site_url('editar'); ?>", {
            method: "POST",
            body: formData
        }).catch(() => {});
    };

    if (checkInf && checkMar) {
        setVisibleGroup(); // Run on load
        
        checkInf.addEventListener("change", () => {
            setVisibleGroup();
            syncSession();
        });
        checkMar.addEventListener("change", () => {
            setVisibleGroup();
            syncSession();
        });
         if (checkOtros) {
            checkOtros.addEventListener("change", () => {
                setVisibleGroup();
                syncSession();
            });
        }
    }
</script>
<?php echo $footer; ?>