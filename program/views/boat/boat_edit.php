<H1>EDITAR BARCO</H1>
<?php $pro = $search->fetch_object() ?>
<form method="POST" action="<?=base_url; ?>/boat/update";>
    <label for="boat_name">Nombre embarcación</label>
    <input type="text" name="boat_name"  placeholder="<?=$pro->boat_name?>">

    <label for="marina">Marina</label>
    <input type="text" name="marina"  placeholder="<?=$pro->marina?>">

    <label for="type">Tipo de barco</label>
    <input type="text" name="type" placeholder="<?=$pro->type?>">

  
    
    <input type="hidden" name="costumer_id" placeholder="<?=$pro->costumer_id?>">
    <input type="hidden" name="boat_id" placeholder="<?=$pro->boat_id?>">

    <input class="button-small-green" type="submit" value="Editar" >
</form>
