<?php if (isset($_SESSION['register']) && $_SESSION['register'] == 'complete'):?>
    <strong id="ok">Registro completado correctamente</strong>
    <form action="<?=base_url; ?>worksheet/prepare_worksheet" method="POST">
        <button formaction="<?=base_url; ?>">Inicio</button>
        
        <button type="submit" name="project_id" value="<?=$project_id?>">Regresar a proyecto</button>
    </form>
<?php elseif (isset($_SESSION['register']) && $_SESSION['register'] == 'failed'):?>
    <strong id="fallo">Registro fallido, introduce bien los datos</strong>
<?php endif;?>
<?php Utils::deleteSession('register'); ?>

<?php if (isset( $_SESSION['delete']) &&  $_SESSION['delete'] == 'complete'):?>
    <strong id="ok">Registro borrado correctamente</strong>
    <form action="<?=base_url; ?>worksheet/prepare_worksheet" method="POST">
        <button type="submit" name="project_id" value="<?=$worksheet -> getProject_id()?>">regresar</button>
    </form>
    <button formaction="<?=base_url; ?>">Inicio</button>
<?php elseif (isset($_SESSION['delete']) && $_SESSION['delete'] == 'failed'):?>
    <strong id="fallo">Registro fallido, introduce bien los datos</strong>
<?php endif; ?>    
<?php Utils::deleteSession('delete'); ?>



    
   
 



