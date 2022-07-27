<h2>Editar categoria en <?=$category_name; ?></h2>
<form action="<?=base_url; ?>subcategory/update_subcategory" method="POST">
<input type="text" name="subcategory_name" value="<?=$name; ?>">
<input type="submit" id="subcategory_update" >
<input type="hidden" name="subcategory_id" value="<?=$id; ?>" >
<input type="hidden" name="category_name" value="<?=$category_name; ?>" >
<input type="hidden" name="category_id" value="<?=$category_id; ?>" >
</form>