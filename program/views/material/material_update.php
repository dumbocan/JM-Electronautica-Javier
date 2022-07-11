<h2>Editar material</h2>
<form action="<?=base_url?>material/update_material" method="POST">
<input type="text" name="material_name" value="<?=$name?>">
<input type="submit" id="material_update" >
<input type="hidden" name="material_id" value="<?=$id?>" >
</form>