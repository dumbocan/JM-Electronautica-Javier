<?php
    if (isset($_SESSION['register']) && $_SESSION['register'] == 'complete'):?>
    <strong id="ok">Tu peticion se ha llevado a cavo satisfactoriamente en  <?=$category_name; ?></strong>
    <?php elseif (isset($_SESSION['register']) && $_SESSION['register'] == 'failed'):?>
    <strong id="fallo">Registro fallido, introduce bien los datos</strong>
<?php endif; ?>
<form method="POST">
    <button formaction="<?=base_url; ?>">Inicio</button>
</form> 
           <form action="<?=base_url?>detail/add_detail" method="POST">

    <?php if($add == "1"):?>

            <input type="hidden" name="worksheet_id" value="<?=$worksheet_id?>">
            <input type="hidden" name="subcategory" value="<?=$subcategory_id?>">

           <button  type="submit" name="back">Regresar</button>
       
    <?php else:?>

    <input type="hidden" name="category_name" value="<?=$category_name; ?>">
   
    <input type="hidden" name="category_id" value="<?=$cat->getcategory_id(); ?>">
    <button  type="submit" formaction="<?=base_url; ?>subcategory/index" >Subcategoria</button>

    <?php endif?>
 </form>