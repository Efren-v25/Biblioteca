<?php if (session("informatica") == 'informatica' && session("maritima") == 'desactivado' || (session('informatica') === null && $etiqueta["carrera_inf"] === "informatica" && $etiqueta["carrera_mar"] === "no" )){ ?>
    <label for="materias">Materias de Informática:</label><br>
<select id="materia" name="materia" required>
    <option value="" disabled selected>-- Seleccionar --</option>
    <option value="administracion-bases-datos-1" <?php echo $etiqueta["materia"] == 'administracion-bases-datos-1' ? 'selected' : ''; ?>>Administración de Bases de Datos I</option>
    <option value="administracion-bases-datos-2" <?php echo $etiqueta["materia"] == 'administracion-bases-datos-2' ? 'selected' : ''; ?>>Administración de Bases de Datos II</option>
    <option value="algebra-lineal" <?php echo $etiqueta["materia"] == 'algebra-lineal' ? 'selected' : ''; ?>>Álgebra Lineal</option>
    <option value="analisis-forense" <?php echo $etiqueta["materia"] == 'analisis-forense' ? 'selected' : ''; ?>>Análisis Forense</option>
    <option value="analisis-reconocimiento-delitos" <?php echo $etiqueta["materia"] == 'analisis-reconocimiento-delitos' ? 'selected' : ''; ?>>Análisis y Reconocimiento de Delitos Informáticos</option>
    <option value="arquitectura-computador" <?php echo $etiqueta["materia"] == 'arquitectura-computador' ? 'selected' : ''; ?>>Arquitectura del Computador</option>
    <option value="auditoria-sistemas" <?php echo $etiqueta["materia"] == 'auditoria-sistemas' ? 'selected' : ''; ?>>Auditoría de Sistemas</option>
    <option value="bases-datos" <?php echo $etiqueta["materia"] == 'bases-datos' ? 'selected' : ''; ?>>Bases de Datos</option>
    <option value="calculo-1" <?php echo $etiqueta["materia"] == 'calculo-1' ? 'selected' : ''; ?>>Cálculo I</option>
    <option value="calculo-2" <?php echo $etiqueta["materia"] == 'calculo-2' ? 'selected' : ''; ?>>Cálculo II</option>
    <option value="calculo-3" <?php echo $etiqueta["materia"] == 'calculo-3' ? 'selected' : ''; ?>>Cálculo III</option>
    <option value="calculo-4" <?php echo $etiqueta["materia"] == 'calculo-4' ? 'selected' : ''; ?>>Cálculo IV</option>
    <option value="calculo-numerico" <?php echo $etiqueta["materia"] == 'calculo-numerico' ? 'selected' : ''; ?>>Cálculo Numérico</option>
    <option value="ciencia-e-ingenieria" <?php echo $etiqueta["materia"] == 'ciencia-e-ingenieria' ? 'selected' : ''; ?>>Ciencia e Ingeniería</option>
    <option value="control-estadistico-procesos" <?php echo $etiqueta["materia"] == 'control-estadistico-procesos' ? 'selected' : ''; ?>>Control Estadístico de Procesos</option>
    <option value="control-procesos-industriales" <?php echo $etiqueta["materia"] == 'control-procesos-industriales' ? 'selected' : ''; ?>>Control de Procesos Industriales</option>
    <option value="contabilidad-general" <?php echo $etiqueta["materia"] == 'contabilidad-general' ? 'selected' : ''; ?>>Contabilidad General</option>
    <option value="criptografia" <?php echo $etiqueta["materia"] == 'criptografia' ? 'selected' : ''; ?>>Criptografía</option>
    <option value="deporte" <?php echo $etiqueta["materia"] == 'deporte' ? 'selected' : ''; ?>>Deporte</option>
    <option value="diseño-asistido-computador" <?php echo $etiqueta["materia"] == 'diseño-asistido-computador' ? 'selected' : ''; ?>>Diseño Asistido por Computador</option>
    <option value="diseño-control-modelos" <?php echo $etiqueta["materia"] == 'diseño-control-modelos' ? 'selected' : ''; ?>>Diseño y Control de Modelos</option>
    <option value="electronica" <?php echo $etiqueta["materia"] == 'electronica' ? 'selected' : ''; ?>>Electrónica</option>
    <option value="estructura-datos" <?php echo $etiqueta["materia"] == 'estructura-datos' ? 'selected' : ''; ?>>Estructura de Datos</option>
    <option value="estadistica-probabilidad" <?php echo $etiqueta["materia"] == 'estadistica-probabilidad' ? 'selected' : ''; ?>>Estadística y Probabilidad</option>
    <option value="etica-profesional" <?php echo $etiqueta["materia"] == 'etica-profesional' ? 'selected' : ''; ?>>Ética Profesional</option>
    <option value="fisica-1" <?php echo $etiqueta["materia"] == 'fisica-1' ? 'selected' : ''; ?>>Física I</option>
    <option value="fisica-2" <?php echo $etiqueta["materia"] == 'fisica-2' ? 'selected' : ''; ?>>Física II</option>
    <option value="formulacion-evaluacion-proyectos" <?php echo $etiqueta["materia"] == 'formulacion-evaluacion-proyectos' ? 'selected' : ''; ?>>Formulación y Evaluación de Proyectos de Ingeniería</option>
    <option value="fundamentos-derecho" <?php echo $etiqueta["materia"] == 'fundamentos-derecho' ? 'selected' : ''; ?>>Fundamentos del Derecho</option>
    <option value="fundamentos-redes" <?php echo $etiqueta["materia"] == 'fundamentos-redes' ? 'selected' : ''; ?>>Fundamentos de Redes</option>
    <option value="gestion-relaciones-humanas" <?php echo $etiqueta["materia"] == 'gestion-relaciones-humanas' ? 'selected' : ''; ?>>Gestión de Relaciones Humanas</option>
    <option value="informatica-basica" <?php echo $etiqueta["materia"] == 'informatica-basica' ? 'selected' : ''; ?>>Informática Básica</option>
    <option value="ingenieria-economica" <?php echo $etiqueta["materia"] == 'ingenieria-economica' ? 'selected' : ''; ?>>Ingeniería Económica</option>
    <option value="ingenieria-software-1" <?php echo $etiqueta["materia"] == 'ingenieria-software-1' ? 'selected' : ''; ?>>Ingeniería del Software I</option>
    <option value="ingenieria-software-2" <?php echo $etiqueta["materia"] == 'ingenieria-software-2' ? 'selected' : ''; ?>>Ingeniería del Software II</option>
    <option value="ingles-1" <?php echo $etiqueta["materia"] == 'ingles-1' ? 'selected' : ''; ?>>Inglés I</option>
    <option value="ingles-2" <?php echo $etiqueta["materia"] == 'ingles-2' ? 'selected' : ''; ?>>Inglés II</option>
    <option value="ingles-3" <?php echo $etiqueta["materia"] == 'ingles-3' ? 'selected' : ''; ?>>Inglés III</option>
    <option value="ingles-4" <?php echo $etiqueta["materia"] == 'ingles-4' ? 'selected' : ''; ?>>Inglés IV</option>
    <option value="ingles-5" <?php echo $etiqueta["materia"] == 'ingles-5' ? 'selected' : ''; ?>>Inglés V</option>
    <option value="ingles-6" <?php echo $etiqueta["materia"] == 'ingles-6' ? 'selected' : ''; ?>>Inglés VI</option>
    <option value="ingles-7" <?php echo $etiqueta["materia"] == 'ingles-7' ? 'selected' : ''; ?>>Inglés VII</option>
    <option value="investigacion-operaciones" <?php echo $etiqueta["materia"] == 'investigacion-operaciones' ? 'selected' : ''; ?>>Investigación de Operaciones</option>
    <option value="laboratorio-datos" <?php echo $etiqueta["materia"] == 'laboratorio-datos' ? 'selected' : ''; ?>>Laboratorio de Datos</option>
    <option value="laboratorio-fisica-1" <?php echo $etiqueta["materia"] == 'laboratorio-fisica-1' ? 'selected' : ''; ?>>Laboratorio de Física I</option>
    <option value="laboratorio-fisica-2" <?php echo $etiqueta["materia"] == 'laboratorio-fisica-2' ? 'selected' : ''; ?>>Laboratorio de Física II</option>
    <option value="lenguaje-comunicacion-1" <?php echo $etiqueta["materia"] == 'lenguaje-comunicacion-1' ? 'selected' : ''; ?>>Lenguaje y Comunicación I</option>
    <option value="lenguaje-comunicacion-2" <?php echo $etiqueta["materia"] == 'lenguaje-comunicacion-2' ? 'selected' : ''; ?>>Lenguaje y Comunicación II</option>
    <option value="logica" <?php echo $etiqueta["materia"] == 'logica' ? 'selected' : ''; ?>>Lógica</option>
    <option value="matematica-discreta" <?php echo $etiqueta["materia"] == 'matematica-discreta' ? 'selected' : ''; ?>>Matemática Discreta</option>
    <option value="mecatronica" <?php echo $etiqueta["materia"] == 'mecatronica' ? 'selected' : ''; ?>>Mecatrónica</option>
    <option value="metodologia-investigacion-1" <?php echo $etiqueta["materia"] == 'metodologia-investigacion-1' ? 'selected' : ''; ?>>Metodología de la Investigación I</option>
    <option value="metodologia-investigacion-2" <?php echo $etiqueta["materia"] == 'metodologia-investigacion-2' ? 'selected' : ''; ?>>Metodología de la Investigación II</option>
    <option value="organizacion-administracion-empresas" <?php echo $etiqueta["materia"] == 'organizacion-administracion-empresas' ? 'selected' : ''; ?>>Organización y Administración de Empresas</option>
    <option value="programacion-1" <?php echo $etiqueta["materia"] == 'programacion-1' ? 'selected' : ''; ?>>Programación I</option>
    <option value="programacion-2" <?php echo $etiqueta["materia"] == 'programacion-2' ? 'selected' : ''; ?>>Programación II</option>
    <option value="programacion-3" <?php echo $etiqueta["materia"] == 'programacion-3' ? 'selected' : ''; ?>>Programación III</option>
    <option value="programacion-circuitos" <?php echo $etiqueta["materia"] == 'programacion-circuitos' ? 'selected' : ''; ?>>Programación de Circuitos</option>
    <option value="programacion-emergente" <?php echo $etiqueta["materia"] == 'programacion-emergente' ? 'selected' : ''; ?>>Programación Emergente</option>
    <option value="programacion-multimedia" <?php echo $etiqueta["materia"] == 'programacion-multimedia' ? 'selected' : ''; ?>>Programación Multimedia</option>
    <option value="programacion-web" <?php echo $etiqueta["materia"] == 'programacion-web' ? 'selected' : ''; ?>>Programación Web</option>
    <option value="reparacion-mantenimiento-micros" <?php echo $etiqueta["materia"] == 'reparacion-mantenimiento-micros' ? 'selected' : ''; ?>>Reparación y Mantenimiento de Micros</option>
    <option value="redes-cableadas-1" <?php echo $etiqueta["materia"] == 'redes-cableadas-1' ? 'selected' : ''; ?>>Redes Cableadas I</option>
    <option value="redes-cableadas-2" <?php echo $etiqueta["materia"] == 'redes-cableadas-2' ? 'selected' : ''; ?>>Redes Cableadas II</option>
    <option value="redes-inalambricas-1" <?php echo $etiqueta["materia"] == 'redes-inalambricas-1' ? 'selected' : ''; ?>>Redes Inalámbricas I</option>
    <option value="seguridad-datos" <?php echo $etiqueta["materia"] == 'seguridad-datos' ? 'selected' : ''; ?>>Seguridad de Datos</option>
    <option value="seguridad-ambiental" <?php echo $etiqueta["materia"] == 'seguridad-ambiental' ? 'selected' : ''; ?>>Seguridad Ambiental y Medio Ambiente</option>
    <option value="seminario-trabajo-grado" <?php echo $etiqueta["materia"] == 'seminario-trabajo-grado' ? 'selected' : ''; ?>>Seminario de Trabajo de Grado</option>
    <option value="servicio-social-comunitario" <?php echo $etiqueta["materia"] == 'servicio-social-comunitario' ? 'selected' : ''; ?>>Servicio Social Comunitario</option>
    <option value="sistemas-operativos-1" <?php echo $etiqueta["materia"] == 'sistemas-operativos-1' ? 'selected' : ''; ?>>Sistemas Operativos I</option>
    <option value="sistemas-operativos-2" <?php echo $etiqueta["materia"] == 'sistemas-operativos-2' ? 'selected' : ''; ?>>Sistemas Operativos II</option>
    <option value="sistemas-señales" <?php echo $etiqueta["materia"] == 'sistemas-señales' ? 'selected' : ''; ?>>Sistemas de Señales</option>
    <option value="tecnologia-digital-1" <?php echo $etiqueta["materia"] == 'tecnologia-digital-1' ? 'selected' : ''; ?>>Tecnología Digital I</option>
    <option value="tecnologia-digital-2" <?php echo $etiqueta["materia"] == 'tecnologia-digital-2' ? 'selected' : ''; ?>>Tecnología Digital II</option>
    <option value="tecnicas-investigacion-documental" <?php echo $etiqueta["materia"] == 'tecnicas-investigacion-documental' ? 'selected' : ''; ?>>Técnicas de Investigación Documental</option>
    <option value="teorias-tecnicas-decision" <?php echo $etiqueta["materia"] == 'teorias-tecnicas-decision' ? 'selected' : ''; ?>>Teorías y Técnicas de Decisión</option>
    <option value="transmision-datos-1" <?php echo $etiqueta["materia"] == 'transmision-datos-1' ? 'selected' : ''; ?>>Transmisión de Datos I</option>
    <option value="transmision-datos-2" <?php echo $etiqueta["materia"] == 'transmision-datos-2' ? 'selected' : ''; ?>>Transmisión de Datos II</option>
</select>
<?php } ?>

<?php if (session("maritima") == 'maritima' && session("informatica") == 'desactivado' || (session('maritima') === null && $etiqueta["carrera_mar"] === "maritima" && $etiqueta["carrera_inf"] === "no" ) ){ ?>
<label for="materias">Materias de Marítima:</label><br>
<select id="materia" name="materia" required>
    <option value="" disabled selected>-- Seleccionar --</option>
    <option value="automatismo-instrumentacion-1" <?php echo $etiqueta["materia"] == 'automatismo-instrumentacion-1' ? 'selected' : ''; ?>>Automatismo e Instrumentación I</option>
    <option value="automatismo-instrumentacion-2" <?php echo $etiqueta["materia"] == 'automatismo-instrumentacion-2' ? 'selected' : ''; ?>>Automatismo e Instrumentación II</option>
    <option value="arquitectura-construccion-buques" <?php echo $etiqueta["materia"] == 'arquitectura-construccion-buques' ? 'selected' : ''; ?>>Arquitectura y Construcción de Buques</option>
    <option value="calderas" <?php echo $etiqueta["materia"] == 'calderas' ? 'selected' : ''; ?>>Calderas</option>
    <option value="calculo-1" <?php echo $etiqueta["materia"] == 'calculo-1' ? 'selected' : ''; ?>>Cálculo I</option>
    <option value="calculo-2" <?php echo $etiqueta["materia"] == 'calculo-2' ? 'selected' : ''; ?>>Cálculo II</option>
    <option value="calculo-3" <?php echo $etiqueta["materia"] == 'calculo-3' ? 'selected' : ''; ?>>Cálculo III</option>
    <option value="calculo-4" <?php echo $etiqueta["materia"] == 'calculo-4' ? 'selected' : ''; ?>>Cálculo IV</option>
    <option value="calculo-5" <?php echo $etiqueta["materia"] == 'calculo-5' ? 'selected' : ''; ?>>Cálculo V</option>
    <option value="ciencias-materiales" <?php echo $etiqueta["materia"] == 'ciencias-materiales' ? 'selected' : ''; ?>>Ciencias de los Materiales</option>
    <option value="comunicaciones-maritimas" <?php echo $etiqueta["materia"] == 'comunicaciones-maritimas' ? 'selected' : ''; ?>>Comunicaciones Marítimas</option>
    <option value="combate-contra-incendios" <?php echo $etiqueta["materia"] == 'combate-contra-incendios' ? 'selected' : ''; ?>>Combate Contra Incendios</option>
    <option value="contaminacion-ambiental-acuatica" <?php echo $etiqueta["materia"] == 'contaminacion-ambiental-acuatica' ? 'selected' : ''; ?>>Contaminación Ambiental Acuática</option>
    <option value="deporte" <?php echo $etiqueta["materia"] == 'deporte' ? 'selected' : ''; ?>>Deporte</option>
    <option value="desarrollo-habilidades-pensamiento" <?php echo $etiqueta["materia"] == 'desarrollo-habilidades-pensamiento' ? 'selected' : ''; ?>>Desarrollo de Habilidades de Pensamiento</option>
    <option value="desarrollo-social" <?php echo $etiqueta["materia"] == 'desarrollo-social' ? 'selected' : ''; ?>>Desarrollo Social</option>
    <option value="dibujo-maritimo-aplicado" <?php echo $etiqueta["materia"] == 'dibujo-maritimo-aplicado' ? 'selected' : ''; ?>>Dibujo Marítimo Aplicado</option>
    <option value="electrotecnia-marina-1" <?php echo $etiqueta["materia"] == 'electrotecnia-marina-1' ? 'selected' : ''; ?>>Electrotecnia Marina I</option>
    <option value="electrotecnia-marina-2" <?php echo $etiqueta["materia"] == 'electrotecnia-marina-2' ? 'selected' : ''; ?>>Electrotecnia Marina II</option>
    <option value="estabilidad-buque-1" <?php echo $etiqueta["materia"] == 'estabilidad-buque-1' ? 'selected' : ''; ?>>Estabilidad del Buque I</option>
    <option value="estabilidad-buque-2" <?php echo $etiqueta["materia"] == 'estabilidad-buque-2' ? 'selected' : ''; ?>>Estabilidad del Buque II</option>
    <option value="estadistica-probabilidad" <?php echo $etiqueta["materia"] == 'estadistica-probabilidad' ? 'selected' : ''; ?>>Estadística y Probabilidad</option>
    <option value="fisica-1" <?php echo $etiqueta["materia"] == 'fisica-1' ? 'selected' : ''; ?>>Física I</option>
    <option value="fisica-2" <?php echo $etiqueta["materia"] == 'fisica-2' ? 'selected' : ''; ?>>Física II</option>
    <option value="formulacion-evaluacion-proyectos" <?php echo $etiqueta["materia"] == 'formulacion-evaluacion-proyectos' ? 'selected' : ''; ?>>Formulación y Evaluación de Proyectos de Ingeniería Marina</option>
    <option value="fundamentos-teoricos-buque" <?php echo $etiqueta["materia"] == 'fundamentos-teoricos-buque' ? 'selected' : ''; ?>>Fundamentos Teóricos del Buque</option>
    <option value="geometria" <?php echo $etiqueta["materia"] == 'geometria' ? 'selected' : ''; ?>>Geometría</option>
    <option value="geometria-descriptiva" <?php echo $etiqueta["materia"] == 'geometria-descriptiva' ? 'selected' : ''; ?>>Geometría Descriptiva</option>
    <option value="gestion-ambiental" <?php echo $etiqueta["materia"] == 'gestion-ambiental' ? 'selected' : ''; ?>>Gestión Ambiental</option>
    <option value="ingles-1" <?php echo $etiqueta["materia"] == 'ingles-1' ? 'selected' : ''; ?>>Inglés I</option>
    <option value="ingles-2" <?php echo $etiqueta["materia"] == 'ingles-2' ? 'selected' : ''; ?>>Inglés II</option>
    <option value="ingles-3" <?php echo $etiqueta["materia"] == 'ingles-3' ? 'selected' : ''; ?>>Inglés III</option>
    <option value="ingles-4" <?php echo $etiqueta["materia"] == 'ingles-4' ? 'selected' : ''; ?>>Inglés IV</option>
    <option value="ingles-5" <?php echo $etiqueta["materia"] == 'ingles-5' ? 'selected' : ''; ?>>Inglés V</option>
    <option value="ingles-6" <?php echo $etiqueta["materia"] == 'ingles-6' ? 'selected' : ''; ?>>Inglés VI</option>
    <option value="ingles-7" <?php echo $etiqueta["materia"] == 'ingles-7' ? 'selected' : ''; ?>>Inglés VII</option>
    <option value="informatica-1" <?php echo $etiqueta["materia"] == 'informatica-1' ? 'selected' : ''; ?>>Informática I</option>
    <option value="informatica-2" <?php echo $etiqueta["materia"] == 'informatica-2' ? 'selected' : ''; ?>>Informática II</option>
    <option value="investigacion-operaciones" <?php echo $etiqueta["materia"] == 'investigacion-operaciones' ? 'selected' : ''; ?>>Investigación de Operaciones</option>
    <option value="laboratorio-fisica-1" <?php echo $etiqueta["materia"] == 'laboratorio-fisica-1' ? 'selected' : ''; ?>>Laboratorio de Física I</option>
    <option value="laboratorio-fisica-2" <?php echo $etiqueta["materia"] == 'laboratorio-fisica-2' ? 'selected' : ''; ?>>Laboratorio de Física II</option>
    <option value="laboratorio-ingenieria-maritima-1" <?php echo $etiqueta["materia"] == 'laboratorio-ingenieria-maritima-1' ? 'selected' : ''; ?>>Laboratorio de Ingeniería Marítima I</option>
    <option value="laboratorio-ingenieria-maritima-2" <?php echo $etiqueta["materia"] == 'laboratorio-ingenieria-maritima-2' ? 'selected' : ''; ?>>Laboratorio de Ingeniería Marítima II</option>
    <option value="laboratorio-ingenieria-maritima-3" <?php echo $etiqueta["materia"] == 'laboratorio-ingenieria-maritima-3' ? 'selected' : ''; ?>>Laboratorio de Ingeniería Marítima III</option>
    <option value="laboratorio-ingenieria-maritima-4" <?php echo $etiqueta["materia"] == 'laboratorio-ingenieria-maritima-4' ? 'selected' : ''; ?>>Laboratorio de Ingeniería Marítima IV</option>
    <option value="laboratorio-quimica" <?php echo $etiqueta["materia"] == 'laboratorio-quimica' ? 'selected' : ''; ?>>Laboratorio de Química</option>
    <option value="legislacion-maritima-1" <?php echo $etiqueta["materia"] == 'legislacion-maritima-1' ? 'selected' : ''; ?>>Legislación Marítima I</option>
    <option value="legislacion-maritima-2" <?php echo $etiqueta["materia"] == 'legislacion-maritima-2' ? 'selected' : ''; ?>>Legislación Marítima II</option>
    <option value="lenguaje-comunicacion-1" <?php echo $etiqueta["materia"] == 'lenguaje-comunicacion-1' ? 'selected' : ''; ?>>Lenguaje y Comunicación I</option>
    <option value="lenguaje-comunicacion-2" <?php echo $etiqueta["materia"] == 'lenguaje-comunicacion-2' ? 'selected' : ''; ?>>Lenguaje y Comunicación II</option>
    <option value="mantenimiento-buques" <?php echo $etiqueta["materia"] == 'mantenimiento-buques' ? 'selected' : ''; ?>>Mantenimiento de Buques</option>
    <option value="mantenimiento-instalaciones-marinas" <?php echo $etiqueta["materia"] == 'mantenimiento-instalaciones-marinas' ? 'selected' : ''; ?>>Mantenimiento de Instalaciones Marinas</option>
    <option value="manejo-estiba-carga" <?php echo $etiqueta["materia"] == 'manejo-estiba-carga' ? 'selected' : ''; ?>>Manejo y Estiba de la Carga</option>
    <option value="maquinas-equipos-marinos" <?php echo $etiqueta["materia"] == 'maquinas-equipos-marinos' ? 'selected' : ''; ?>>Máquinas y Equipos Marinos</option>
    <option value="mecanica-fluidos-1" <?php echo $etiqueta["materia"] == 'mecanica-fluidos-1' ? 'selected' : ''; ?>>Mecánica de los Fluidos I</option>
    <option value="mecanica-fluidos-2" <?php echo $etiqueta["materia"] == 'mecanica-fluidos-2' ? 'selected' : ''; ?>>Mecánica de los Fluidos II</option>
    <option value="mecanica-solidos" <?php echo $etiqueta["materia"] == 'mecanica-solidos' ? 'selected' : ''; ?>>Mecánica de los Sólidos</option>
    <option value="meteorologia-oceanografia" <?php echo $etiqueta["materia"] == 'meteorologia-oceanografia' ? 'selected' : ''; ?>>Meteorología y Oceanografía</option>
    <option value="metodologia-investigacion-1" <?php echo $etiqueta["materia"] == 'metodologia-investigacion-1' ? 'selected' : ''; ?>>Metodología de la Investigación I</option>
    <option value="metodologia-investigacion-2" <?php echo $etiqueta["materia"] == 'metodologia-investigacion-2' ? 'selected' : ''; ?>>Metodología de la Investigación II</option>
    <option value="navegacion" <?php echo $etiqueta["materia"] == 'navegacion' ? 'selected' : ''; ?>>Navegación</option>
    <option value="navegacion-astronomica" <?php echo $etiqueta["materia"] == 'navegacion-astronomica' ? 'selected' : ''; ?>>Navegación Astronómica</option>
    <option value="navegacion-costera-estima-1" <?php echo $etiqueta["materia"] == 'navegacion-costera-estima-1' ? 'selected' : ''; ?>>Navegación Costera y Estima I</option>
    <option value="navegacion-costera-estima-2" <?php echo $etiqueta["materia"] == 'navegacion-costera-estima-2' ? 'selected' : ''; ?>>Navegación Costera y Estima II</option>
    <option value="navegacion-electronica" <?php echo $etiqueta["materia"] == 'navegacion-electronica' ? 'selected' : ''; ?>>Navegación Electrónica</option>
    <option value="problematica-social-contemporanea" <?php echo $etiqueta["materia"] == 'problematica-social-contemporanea' ? 'selected' : ''; ?>>Problemática Social Contemporánea</option>
    <option value="quimica-1" <?php echo $etiqueta["materia"] == 'quimica-1' ? 'selected' : ''; ?>>Química I</option>
    <option value="quimica-2" <?php echo $etiqueta["materia"] == 'quimica-2' ? 'selected' : ''; ?>>Química II</option>
    <option value="refrigeracion" <?php echo $etiqueta["materia"] == 'refrigeracion' ? 'selected' : ''; ?>>Refrigeración</option>
    <option value="seguridad-maritima" <?php echo $etiqueta["materia"] == 'seguridad-maritima' ? 'selected' : ''; ?>>Seguridad Marítima</option>
    <option value="seminario-trabajo-grado" <?php echo $etiqueta["materia"] == 'seminario-trabajo-grado' ? 'selected' : ''; ?>>Seminario de Trabajo de Grado</option>
    <option value="servicio-social-comunitario" <?php echo $etiqueta["materia"] == 'servicio-social-comunitario' ? 'selected' : ''; ?>>Servicio Social Comunitario</option>
    <option value="sistemas-maquinas-auxiliares-1" <?php echo $etiqueta["materia"] == 'sistemas-maquinas-auxiliares-1' ? 'selected' : ''; ?>>Sistemas de Máquinas Auxiliares I</option>
    <option value="sistemas-maquinas-auxiliares-2" <?php echo $etiqueta["materia"] == 'sistemas-maquinas-auxiliares-2' ? 'selected' : ''; ?>>Sistemas de Máquinas Auxiliares II</option>
    <option value="sistemas-maquinas-propulsoras" <?php echo $etiqueta["materia"] == 'sistemas-maquinas-propulsoras' ? 'selected' : ''; ?>>Sistemas de Máquinas Propulsoras</option>
    <option value="termodinamica" <?php echo $etiqueta["materia"] == 'termodinamica' ? 'selected' : ''; ?>>Termodinámica</option>
</select>
<?php } ?>

<?php if (session("maritima") == 'maritima' && session("informatica") == 'informatica' || (session('maritima') === null && session('informatica') === null && $etiqueta["carrera_inf"] === "informatica" && $etiqueta["carrera_mar"] === "maritima" ) ){ ?>
    <label for="materias-comunes">Materias comunes:</label><br>
<select id="materia" name="materia" required>
    <option value="" disabled selected>-- Seleccionar --</option>
    <option value="calculo-1" <?php echo $etiqueta["materia"] == 'calculo-1' ? 'selected' : ''; ?>>Cálculo I</option>
    <option value="calculo-2" <?php echo $etiqueta["materia"] == 'calculo-2' ? 'selected' : ''; ?>>Cálculo II</option>
    <option value="calculo-3" <?php echo $etiqueta["materia"] == 'calculo-3' ? 'selected' : ''; ?>>Cálculo III</option>
    <option value="estadistica-probabilidad" <?php echo $etiqueta["materia"] == 'estadistica-probabilidad' ? 'selected' : ''; ?>>Estadística y Probabilidad</option>
    <option value="fisica-1" <?php echo $etiqueta["materia"] == 'fisica-1' ? 'selected' : ''; ?>>Física I</option>
    <option value="fisica-2" <?php echo $etiqueta["materia"] == 'fisica-2' ? 'selected' : ''; ?>>Física II</option>
    <option value="ingles-1" <?php echo $etiqueta["materia"] == 'ingles-1' ? 'selected' : ''; ?>>Inglés I</option>
    <option value="ingles-2" <?php echo $etiqueta["materia"] == 'ingles-2' ? 'selected' : ''; ?>>Inglés II</option>
    <option value="ingles-3" <?php echo $etiqueta["materia"] == 'ingles-3' ? 'selected' : ''; ?>>Inglés III</option>
    <option value="ingles-4" <?php echo $etiqueta["materia"] == 'ingles-4' ? 'selected' : ''; ?>>Inglés IV</option>
    <option value="ingles-5" <?php echo $etiqueta["materia"] == 'ingles-5' ? 'selected' : ''; ?>>Inglés V</option>
    <option value="ingles-6" <?php echo $etiqueta["materia"] == 'ingles-6' ? 'selected' : ''; ?>>Inglés VI</option>
    <option value="ingles-7" <?php echo $etiqueta["materia"] == 'ingles-7' ? 'selected' : ''; ?>>Inglés VII</option>
    <option value="informatica-1" <?php echo $etiqueta["materia"] == 'informatica-1' ? 'selected' : ''; ?>>Informática I</option>
    <option value="laboratorio-fisica-1" <?php echo $etiqueta["materia"] == 'laboratorio-fisica-1' ? 'selected' : ''; ?>>Laboratorio de Física I</option>
    <option value="laboratorio-fisica-2" <?php echo $etiqueta["materia"] == 'laboratorio-fisica-2' ? 'selected' : ''; ?>>Laboratorio de Física II</option>
    <option value="lenguaje-comunicacion-1" <?php echo $etiqueta["materia"] == 'lenguaje-comunicacion-1' ? 'selected' : ''; ?>>Lenguaje y Comunicación I</option>
    <option value="lenguaje-comunicacion-2" <?php echo $etiqueta["materia"] == 'lenguaje-comunicacion-2' ? 'selected' : ''; ?>>Lenguaje y Comunicación II</option>
    <option value="metodologia-investigacion-1" <?php echo $etiqueta["materia"] == 'metodologia-investigacion-1' ? 'selected' : ''; ?>>Metodología de la Investigación I</option>
    <option value="metodologia-investigacion-2" <?php echo $etiqueta["materia"] == 'metodologia-investigacion-2' ? 'selected' : ''; ?>>Metodología de la Investigación II</option>
    <option value="organizacion-administracion-empresas" <?php echo $etiqueta["materia"] == 'organizacion-administracion-empresas' ? 'selected' : ''; ?>>Organización y Administración de Empresas</option>
    <option value="servicio-social-comunitario" <?php echo $etiqueta["materia"] == 'servicio-social-comunitario' ? 'selected' : ''; ?>>Servicio Social Comunitario</option>
</select>
<?php } ?>

<br><label for="semestre">Semestre</label><br>
<select id="semestre" name="semestre">
    <option value="" <?php echo $etiqueta["semestre"] == '' ? 'selected' : ''; ?>>Seleccione un semestre</option>
    <option value="I" <?php echo $etiqueta["semestre"] == 'I' ? 'selected' : ''; ?>>I</option>
    <option value="II" <?php echo $etiqueta["semestre"] == 'II' ? 'selected' : ''; ?>>II</option>
    <option value="III" <?php echo $etiqueta["semestre"] == 'III' ? 'selected' : ''; ?>>III</option>
    <option value="IV" <?php echo $etiqueta["semestre"] == 'IV' ? 'selected' : ''; ?>>IV</option>
    <option value="V" <?php echo $etiqueta["semestre"] == 'V' ? 'selected' : ''; ?>>V</option>
    <option value="VI" <?php echo $etiqueta["semestre"] == 'VI' ? 'selected' : ''; ?>>VI</option>
    <option value="VII" <?php echo $etiqueta["semestre"] == 'VII' ? 'selected' : ''; ?>>VII</option>
    <option value="VIII" <?php echo $etiqueta["semestre"] == 'VIII' ? 'selected' : ''; ?>>VIII</option>
    <option value="IX" <?php echo $etiqueta["semestre"] == 'IX' ? 'selected' : ''; ?>>IX</option>
    <option value="X" <?php echo $etiqueta["semestre"] == 'X' ? 'selected' : ''; ?>>X</option>
</select>
<br><?php if (session("errores.semestre")) : ?>
        <div class="text-danger"><?= session("errores.semestre") ?></div>
    <?php endif; ?>