<?php
    if (isset($_SESSION['register']) && $_SESSION['register'] == 'complete'):?>
    <strong id="ok">Tu peticion se ha llevado a cavo satisfactoriamente en  <?=$material_name?></strong>
    <?php elseif (isset($_SESSION['register']) && $_SESSION['register'] == 'failed'):?>
    <strong id="fallo">Registro fallido, introduce bien los datos</strong>
<?php endif; ?>
<form method="POST">
    <button formaction="<?=base_url; ?>">Inicio</button>
    <input type="hidden" name="material_name" value="<?=$material_name?>">
    <?php var_dump($cat)?>
    <input type="hidden" name="material_id" value="<?=$cat->getMaterial_id()?>">
    <button  type="submit" formaction="<?=base_url; ?>category/index" >Categoria</button>
</form>
