<?= $header ?>
<br/>
<h2><?= $libro['titulo']?></h2>
<br/>
<img class="img-thumbnail" src="<?= base_url('uploads/portadas/' . $libro['portada'] )?>" alt="">
<br/>

<br/>
<h3>Enlace:</h3>
<a href="<?= base_url('uploads/archivos/' . $libro['archivo'] )?>"><?= $libro['archivo'] ?></a>
<br/>

<br/>
<h3>Descripción:</h3>
<p><?= $libro['descripcion'] ?></p>
<br/>

<h3>Autor:</h3>
<a href="<?= base_url('usuario/' . $libro['id_usuario'])?>"><?= $libro['autor'] ?></a>
<?= $footer ?>