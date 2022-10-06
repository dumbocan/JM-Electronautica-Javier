<form action="<?= base_url; ?>material/material_delete" method="POST">
<h3>Estas seguro que quieres eliminar <?=$material_name; ?></h3>
<button type="submit" name="material_id" value="<?=$material_id; ?>">Enviar</button>
<input type="hidden" name="material_id" value="<?=$material_id; ?>" >
<input type="hidden" name="material_name" value="<?=$material_name; ?>" >
<button formaction="<?=base_url; ?>material/show_material">Regresar</button>
</form>