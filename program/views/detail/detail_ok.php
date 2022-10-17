<?php
    if (isset($_SESSION['register']) && $_SESSION['register'] == 'complete'):?>
    <strong id="ok"> Tu peticion se ha llevado con exito.</strong>
    <?php elseif (isset($_SESSION['register']) && $_SESSION['register'] == 'failed'):?>
    <strong id="fallo">Peticion fallida, introduce bien los datos</strong>
<?php endif; ?>


<form action="<?=base_url;?>worksheet/prepare_worksheet" method="POST">
    <input type="hidden" name="project_id" value="<?=$project_id?>">

    <button type="submit" name="regresar">Regresar</button>
 </form>