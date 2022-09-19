<form action="<?= base_url; ?>subcategory/delete_subcategory" method="POST">
<h1>Estas seguro que quieres eliminar <?=$name; ?>
<button type="submit" name="subcategory_id" value="<?=$id; ?>">Enviar</button>
<input type="hidden" name="subcategory_id" value="<?=$id; ?>" >
<input type="hidden" name="category_name" value="<?=$category_name; ?>" >
<input type="hidden" name="add" value="<?=$add ?>" >

<input type="hidden" name="subcategory_name" value="<?=$cat->getsubcategory_name(); ?>" >
<input type="hidden" name="category_id" value="<?=$cat->getcategory_id(); ?>" >

<button formaction="<?=base_url; ?>subcategory/index">Subcategoria</button>
</form>