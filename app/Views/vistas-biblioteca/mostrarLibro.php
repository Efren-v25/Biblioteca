<?= $header ?>
<br/
>
<h2><?= $libro['titulo']?></h2>

<br/>

<img class="img-thumbnail" src="<?= base_url('uploads/portadas/' . $libro['portada'] )?>" alt="">

<br/>

<a href="<?= base_url('uploads/archivos/' . $libro['archivo'] )?>"><?= $libro['archivo'] ?></a>


<?= $footer ?>