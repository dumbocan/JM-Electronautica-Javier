<form action="<?= base_url; ?>category/delete_category" method="POST">
<h1>Estas seguro que quieres eliminar <?=$name; ?>
<button type="submit" name="category_id" value="<?=$id; ?>">Enviar</button>
<input type="hidden" name="category_id" value="<?=$id?>" >
<input type="hidden" name="material_name" value="<?=$material_name?>" >
<input type="hidden" name="category_name" value="<?=$cat->getCategory_name()?>" >
<input type="hidden" name="material_id" value="<?=$cat->getMaterial_id()?>" >

<button formaction="<?=base_url; ?>category/index">Categoria</button>
</form>