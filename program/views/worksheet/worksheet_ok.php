<?php if (isset($_SESSION['register']) && $_SESSION['register'] == 'complete'):?>
    <strong id="ok">Registro completado correctamente</strong>
    <form action="<?=base_url; ?>worksheet/prepare_worksheet" method="POST">
        <button formaction="<?=base_url; ?>">Inicio</button>
        <button type="submit" name="return" value="<?=$proid?>">Regresar a proyecto</button>
    </form>
<?php elseif (isset($_SESSION['register']) && $_SESSION['register'] == 'failed'):?>
    <strong id="fallo">Registro fallido, introduce bien los datos</strong>
<?php endif;?>
<?php Utils::deleteSession('register'); ?>

<?php if (isset( $_SESSION['delete']) &&  $_SESSION['delete'] == 'complete'):?>
    <strong id="ok">Registro borrado correctamente</strong>
    <form action="<?=base_url; ?>worksheet/prepare_worksheet" method="POST">
        <button formaction="<?=base_url; ?>">Inicio</button>
        <input type="hidden" name="id" value="<?=$sdata?>">
        <input type="submit" value="Regresar a proyecto">
    </form>
<?php elseif (isset($_SESSION['register']) && $_SESSION['register'] == 'failed'):?>
    <strong id="fallo">Registro fallido, introduce bien los datos</strong>
<?php endif; ?>    
<?php Utils::deleteSession('delete'); ?>



    
   
 



