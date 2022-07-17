<h3>Nueva categoria de  <?=$material_name?></h3>

<form action="<?=base_url; ?>category/save_category" method="POST">
    <tag>Introduce nueva categoria para <?=$material_name?></tag>
    <input type="text" name="new_category" id="new_category">
    <input type="hidden" name="material_id" id="material_id" value="<?= $cat ->getMaterial_id() ?>">
    <input type="hidden" name="material_name" id="material_name" value="<?= $material_name ?>">
    <input type="submit" >

</form>