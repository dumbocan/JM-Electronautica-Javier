<h2>Editar categoria en <?=$section_name; ?></h2>
<form action="<?=base_url; ?>category/update_category" method="POST">
<input type="text" name="category_name" value="<?=$name; ?>">
<input type="submit" id="category_update" >
<input type="hidden" name="category_id" value="<?=$id; ?>" >
<input type="hidden" name="section_name" value="<?=$section_name; ?>" >
<input type="hidden" name="section_id" value="<?=$section_id; ?>" >
</form>