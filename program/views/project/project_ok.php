<?php
    if (isset($_SESSION['register']) && $_SESSION['register'] == 'complete'):?>
    <strong id="ok">Registro completado correctamente</strong>
    <?php elseif (isset($_SESSION['register']) && $_SESSION['register'] == 'failed'):?>
    <strong id="fallo">Registro fallido, introduce bien los datos</strong>
<?php endif; ?>
<form>
    <button formaction="<?=base_url;?>">Inicio</button>
    <button formaction="<?=base_url;?>worksheet/description">Añadir hoja de trabajo</button>
</form>
