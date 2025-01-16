
<?php if (session("informatica") == 'informatica' && session("maritima") == 'desactivado'){ ?>
<label for="materias">Materias de Informatica:</label><br>
    <select id="materia" name="materia" required>
        <option value="" disabled selected>-- Seleccionar --</option>
        <option value="administracion-bases-datos-1">Administración de Bases de Datos I</option>
        <option value="administracion-bases-datos-2">Administración de Bases de Datos II</option>
        <option value="algebra-lineal">Álgebra Lineal</option>
        <option value="analisis-forense">Análisis Forense</option>
        <option value="analisis-reconocimiento-delitos">Análisis y Reconocimiento de Delitos Informáticos</option>
        <option value="arquitectura-computador">Arquitectura del Computador</option>
        <option value="auditoria-sistemas">Auditoría de Sistemas</option>
        <option value="bases-datos">Bases de Datos</option>
        <option value="calculo-1">Cálculo I</option>
        <option value="calculo-2">Cálculo II</option>
        <option value="calculo-3">Cálculo III</option>
        <option value="calculo-4">Cálculo IV</option>
        <option value="calculo-numerico">Cálculo Numérico</option>
        <option value="ciencia-e-ingenieria">Ciencia e Ingeniería</option>
        <option value="control-estadistico-procesos">Control Estadístico de Procesos</option>
        <option value="control-procesos-industriales">Control de Procesos Industriales</option>
        <option value="contabilidad-general">Contabilidad General</option>
        <option value="criptografia">Criptografía</option>
        <option value="deporte">Deporte</option>
        <option value="diseño-asistido-computador">Diseño Asistido por Computador</option>
        <option value="diseño-control-modelos">Diseño y Control de Modelos</option>
        <option value="electronica">Electrónica</option>
        <option value="estructura-datos">Estructura de Datos</option>
        <option value="estadistica-probabilidad">Estadística y Probabilidad</option>
        <option value="etica-profesional">Ética Profesional</option>
        <option value="fisica-1">Física I</option>
        <option value="fisica-2">Física II</option>
        <option value="formulacion-evaluacion-proyectos">Formulación y Evaluación de Proyectos de Ingeniería</option>
        <option value="fundamentos-derecho">Fundamentos del Derecho</option>
        <option value="fundamentos-redes">Fundamentos de Redes</option>
        <option value="gestion-relaciones-humanas">Gestión de Relaciones Humanas</option>
        <option value="informatica-basica">Informática Básica</option>
        <option value="ingenieria-economica">Ingeniería Económica</option>
        <option value="ingenieria-software-1">Ingeniería del Software I</option>
        <option value="ingenieria-software-2">Ingeniería del Software II</option>
        <option value="ingles-1">Inglés I</option>
        <option value="ingles-2">Inglés II</option>
        <option value="ingles-3">Inglés III</option>
        <option value="ingles-4">Inglés IV</option>
        <option value="ingles-5">Inglés V</option>
        <option value="ingles-6">Inglés VI</option>
        <option value="ingles-7">Inglés VII</option>
        <option value="investigacion-operaciones">Investigación de Operaciones</option>
        <option value="laboratorio-datos">Laboratorio de Datos</option>
        <option value="laboratorio-fisica-1">Laboratorio de Física I</option>
        <option value="laboratorio-fisica-2">Laboratorio de Física II</option>
        <option value="lenguaje-comunicacion-1">Lenguaje y Comunicación I</option>
        <option value="lenguaje-comunicacion-2">Lenguaje y Comunicación II</option>
        <option value="logica">Lógica</option>
        <option value="matematica-discreta">Matemática Discreta</option>
        <option value="mecatronica">Mecatrónica</option>
        <option value="metodologia-investigacion-1">Metodología de la Investigación I</option>
        <option value="metodologia-investigacion-2">Metodología de la Investigación II</option>
        <option value="organizacion-administracion-empresas">Organización y Administración de Empresas</option>
        <option value="programacion-1">Programación I</option>
        <option value="programacion-2">Programación II</option>
        <option value="programacion-3">Programación III</option>
        <option value="programacion-circuitos">Programación de Circuitos</option>
        <option value="programacion-emergente">Programación Emergente</option>
        <option value="programacion-multimedia">Programación Multimedia</option>
        <option value="programacion-web">Programación Web</option>
        <option value="reparacion-mantenimiento-micros">Reparación y Mantenimiento de Micros</option>
        <option value="redes-cableadas-1">Redes Cableadas I</option>
        <option value="redes-cableadas-2">Redes Cableadas II</option>
        <option value="redes-inalambricas-1">Redes Inalámbricas I</option>
        <option value="seguridad-datos">Seguridad de Datos</option>
        <option value="seguridad-ambiental">Seguridad Ambiental y Medio Ambiente</option>
        <option value="seminario-trabajo-grado">Seminario de Trabajo de Grado</option>
        <option value="servicio-social-comunitario">Servicio Social Comunitario</option>
        <option value="sistemas-operativos-1">Sistemas Operativos I</option>
        <option value="sistemas-operativos-2">Sistemas Operativos II</option>
        <option value="sistemas-señales">Sistemas de Señales</option>
        <option value="tecnologia-digital-1">Tecnología Digital I</option>
        <option value="tecnologia-digital-2">Tecnología Digital II</option>
        <option value="tecnicas-investigacion-documental">Técnicas de Investigación Documental</option>
        <option value="teoria-economica">Teoría Económica</option>
        <option value="teorias-tecnicas-decision">Teorías y Técnicas de Decisión</option>
        <option value="transmision-datos-1">Transmisión de Datos I</option>
        <option value="transmision-datos-2">Transmisión de Datos II</option>
    </select>
<?php } ?>


<?php if (session("maritima") == 'maritima' && session("informatica") == 'desactivado' ){ ?>
<label for="materias">Materias de Maritima:</label><br>
    <select id="materia" name="materia" required>
        <option value="" disabled selected>-- Seleccionar --</option>
        <option value="automatismo-instrumentacion-1">Automatismo e Instrumentación I</option>
        <option value="automatismo-instrumentacion-2">Automatismo e Instrumentación II</option>
        <option value="arquitectura-construccion-buques">Arquitectura y Construcción de Buques</option>
        <option value="calderas">Calderas</option>
        <option value="calculo-1">Cálculo I</option>
        <option value="calculo-2">Cálculo II</option>
        <option value="calculo-3">Cálculo III</option>
        <option value="calculo-4">Cálculo IV</option>
        <option value="calculo-5">Cálculo V</option>
        <option value="ciencias-materiales">Ciencias de los Materiales</option>
        <option value="comunicaciones-maritimas">Comunicaciones Marítimas</option>
        <option value="combate-contra-incendios">Combate Contra Incendios</option>
        <option value="contaminacion-ambiental-acuatica">Contaminación Ambiental Acuática</option>
        <option value="deporte">Deporte</option>
        <option value="desarrollo-habilidades-pensamiento">Desarrollo de Habilidades de Pensamiento</option>
        <option value="desarrollo-social">Desarrollo Social</option>
        <option value="dibujo-maritimo-aplicado">Dibujo Marítimo Aplicado</option>
        <option value="electrotecnia-marina-1">Electrotecnia Marina I</option>
        <option value="electrotecnia-marina-2">Electrotecnia Marina II</option>
        <option value="estabilidad-buque-1">Estabilidad del Buque I</option>
        <option value="estabilidad-buque-2">Estabilidad del Buque II</option>
        <option value="estadistica-probabilidad">Estadística y Probabilidad</option>
        <option value="fisica-1">Física I</option>
        <option value="fisica-2">Física II</option>
        <option value="formulacion-evaluacion-proyectos">Formulación y Evaluación de Proyectos de Ingeniería Marina</option>
        <option value="fundamentos-teoricos-buque">Fundamentos Teóricos del Buque</option>
        <option value="geometria">Geometría</option>
        <option value="geometria-descriptiva">Geometría Descriptiva</option>
        <option value="gestion-ambiental">Gestión Ambiental</option>
        <option value="ingles-1">Inglés I</option>
        <option value="ingles-2">Inglés II</option>
        <option value="ingles-3">Inglés III</option>
        <option value="ingles-4">Inglés IV</option>
        <option value="ingles-5">Inglés V</option>
        <option value="ingles-6">Inglés VI</option>
        <option value="ingles-7">Inglés VII</option>
        <option value="informatica-1">Informática I</option>
        <option value="informatica-2">Informática II</option>
        <option value="investigacion-operaciones">Investigación de Operaciones</option>
        <option value="laboratorio-fisica-1">Laboratorio de Física I</option>
        <option value="laboratorio-fisica-2">Laboratorio de Física II</option>
        <option value="laboratorio-ingenieria-maritima-1">Laboratorio de Ingeniería Marítima I</option>
        <option value="laboratorio-ingenieria-maritima-2">Laboratorio de Ingeniería Marítima II</option>
        <option value="laboratorio-ingenieria-maritima-3">Laboratorio de Ingeniería Marítima III</option>
        <option value="laboratorio-ingenieria-maritima-4">Laboratorio de Ingeniería Marítima IV</option>
        <option value="laboratorio-quimica">Laboratorio de Química</option>
        <option value="legislacion-maritima-1">Legislación Marítima I</option>
        <option value="legislacion-maritima-2">Legislación Marítima II</option>
        <option value="lenguaje-comunicacion-1">Lenguaje y Comunicación I</option>
        <option value="lenguaje-comunicacion-2">Lenguaje y Comunicación II</option>
        <option value="mantenimiento-buques">Mantenimiento de Buques</option>
        <option value="mantenimiento-instalaciones-marinas">Mantenimiento de Instalaciones Marinas</option>
        <option value="manejo-estiba-carga">Manejo y Estiba de la Carga</option>
        <option value="maquinas-equipos-marinos">Máquinas y Equipos Marinos</option>
        <option value="mecanica-fluidos-1">Mecánica de los Fluidos I</option>
        <option value="mecanica-fluidos-2">Mecánica de los Fluidos II</option>
        <option value="mecanica-solidos">Mecánica de los Sólidos</option>
        <option value="meteorologia-oceanografia">Meteorología y Oceanografía</option>
        <option value="metodologia-investigacion-1">Metodología de la Investigación I</option>
        <option value="metodologia-investigacion-2">Metodología de la Investigación II</option>
        <option value="navegacion">Navegación</option>
        <option value="navegacion-astronomica">Navegación Astronómica</option>
        <option value="navegacion-costera-estima-1">Navegación Costera y Estima I</option>
        <option value="navegacion-costera-estima-2">Navegación Costera y Estima II</option>
        <option value="navegacion-electronica">Navegación Electrónica</option>
        <option value="problematica-social-contemporanea">Problemática Social Contemporánea</option>
        <option value="quimica-1">Química I</option>
        <option value="quimica-2">Química II</option>
        <option value="refrigeracion">Refrigeración</option>
        <option value="seguridad-maritima">Seguridad Marítima</option>
        <option value="seminario-trabajo-grado">Seminario de Trabajo de Grado</option>
        <option value="servicio-social-comunitario">Servicio Social Comunitario</option>
        <option value="sistemas-maquinas-auxiliares-1">Sistemas de Máquinas Auxiliares I</option>
        <option value="sistemas-maquinas-auxiliares-2">Sistemas de Máquinas Auxiliares II</option>
        <option value="sistemas-maquinas-propulsoras">Sistemas de Máquinas Propulsoras</option>
        <option value="teoria-economica">Teoría Económica</option>
        <option value="termodinamica">Termodinámica</option>
    </select>
<?php } ?>

<?php if (session("maritima") == 'maritima' && session("informatica") == 'informatica' ){ ?>
<label for="materias-comunes">Materias comunes:</label><br>
    <select id="materia" name="materia" required>
        <option value="" disabled selected>-- Seleccionar --</option>
        <option value="calculo-1">Cálculo I</option>
        <option value="calculo-2">Cálculo II</option>
        <option value="calculo-3">Cálculo III</option>
        <option value="estadistica-probabilidad">Estadística y Probabilidad</option>
        <option value="fisica-1">Física I</option>
        <option value="fisica-2">Física II</option>
        <option value="ingles-1">Inglés I</option>
        <option value="ingles-2">Inglés II</option>
        <option value="ingles-3">Inglés III</option>
        <option value="ingles-4">Inglés IV</option>
        <option value="ingles-5">Inglés V</option>
        <option value="ingles-6">Inglés VI</option>
        <option value="ingles-7">Inglés VII</option>
        <option value="informatica-1">Informática I</option>
        <option value="laboratorio-fisica-1">Laboratorio de Física I</option>
        <option value="laboratorio-fisica-2">Laboratorio de Física II</option>
        <option value="lenguaje-comunicacion-1">Lenguaje y Comunicación I</option>
        <option value="lenguaje-comunicacion-2">Lenguaje y Comunicación II</option>
        <option value="metodologia-investigacion-1">Metodología de la Investigación I</option>
        <option value="metodologia-investigacion-2">Metodología de la Investigación II</option>
        <option value="organizacion-administracion-empresas">Organización y Administración de Empresas</option>
        <option value="servicio-social-comunitario">Servicio Social Comunitario</option>
        <option value="teoria-economica">Teoría Económica</option>
    </select>
<?php } ?>

<br><label for="semestre">Semestre</label><br>
    <select id="semestre" name="semestre">
        <option value="">Seleccione un semestre</option>
        <option value="I">I</option>
        <option value="II">II</option>
        <option value="III">III</option>
        <option value="IV">IV</option>
        <option value="V">V</option>
        <option value="VI">VI</option>
        <option value="VII">VII</option>
        <option value="VIII">VIII</option>
        <option value="IX">IX</option>
        <option value="X">X</option>
    </select>
<br><?php if (session("errores.semestre")) : ?>
        <div class="text-danger"><?= session("errores.semestre") ?></div>
    <?php endif; ?>




