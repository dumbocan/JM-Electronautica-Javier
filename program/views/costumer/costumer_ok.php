<?php
// var_dump($boat->costumer_id);
    if (isset($_SESSION['register']) && $_SESSION['register'] == 'complete'):?>
    <strong id="ok">Registro completado correctamente</strong>
    <?php elseif (isset($_SESSION['register']) && $_SESSION['register'] == 'failed'):?>
    <strong id="fallo">Registro fallido, introduce bien los datos</strong>
<?php endif;
unset($_SESSION['register']); ?>
<button formaction="<?=base_url; ?>">Inicio</button>

    <form action="<?=base_url; ?>project/description" method="POST">
        <input type="hidden" name="costumer_id" value="<?=$boat->costumer_id; ?>">
        <button  name="add_project" >Añadir proyecto</button>
    </form>
    
