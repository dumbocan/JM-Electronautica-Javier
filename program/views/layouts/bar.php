<div class="oculto-impresion">
    <?php if (isset($_SESSION['admin'])):?>
    <a href="<?=base_url; ?>">Inicio</a>
    <a href="<?=base_url; ?>costumer/register">Insertar cliente</a>
    <a href="<?=base_url; ?>costumer/search">Buscar cliente</a>
    <a href="<?=base_url; ?>boat/search">Buscar barco</a>
    <a href="<?=base_url; ?>worksheet/search_project">Proyectos</a>
    <a href="<?=base_url; ?>material/show_material">Gestion de materiales</a>
    <a href="<?=base_url; ?>user/logout">Salir</a>
    <?php else: ?>
       
    <a href="<?=base_url; ?>user/index">login</a>
    <?php endif; ?>
</div>