<?php if (isset($_SESSION['admin'])):?>
<a href="<?=base_url; ?>">Inicio</a>
<a href="<?=base_url; ?>costumer/register">Insertar cliente</a>
<a href="<?=base_url; ?>costumer/search">Buscar cliente</a>
<a href="<?=base_url; ?>boat/search">Buscar barco</a>
<a href="<?=base_url; ?>worksheet/search_project">Proyectos</a>
<?php endif; ?>
<a href="<?=base_url; ?>user/login">login</a>
