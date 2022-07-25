<form action="<?= base_url; ?>subcategory/delete_subcategory" method="POST">
<h1>Estas seguro que quieres eliminar <?=$name; ?>
<button type="submit" name="subcategory_id" value="<?=$id; ?>">Enviar</button>
<input type="hidden" name="subcategory_id" value="<?=$id; ?>" >
<input type="hidden" name="section_name" value="<?=$section_name; ?>" >
<input type="hidden" name="subcategory_name" value="<?=$cat->getsubcategory_name(); ?>" >
<input type="hidden" name="section_id" value="<?=$cat->getsection_id(); ?>" >

<button formaction="<?=base_url; ?>subcategory/index">Subcategoria</button>
</form>