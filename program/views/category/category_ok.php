<?php
    if (isset($_SESSION['register']) && $_SESSION['register'] == 'complete'):?>
    <strong id="ok">Tu peticion se ha llevado a cavo satisfactoriamente en  <?=$section_name; ?></strong>
    <?php elseif (isset($_SESSION['register']) && $_SESSION['register'] == 'failed'):?>
    <strong id="fallo">Registro fallido, introduce bien los datos</strong>
<?php endif; ?>
<form method="POST">
    <button formaction="<?=base_url; ?>">Inicio</button>
    
    <input type="hidden" name="section_name" value="<?=$section_name; ?>">
    <input type="hidden" name="section_id" value="<?=$cat->getsection_id(); ?>">
    
    <button  type="submit" formaction="<?=base_url; ?>category/index" >Categoria</button>

    <?php if(isset($control) == 1):  ?>
        <form action="<?=base_url; ?>detail/add_detail" method="POST">
        <input type="hidden" name="project_number" value="<?=$project_number?>">
        <input type="hidden" name="boat_name" value="<?=$boat_name?>">
        <input type="hidden" name="worksheet_date" value="<?=$worksheet_date?>">

        
        <button  type="submit" >regresar</button>
        </form>
       
    <?php endif?>
</form>
