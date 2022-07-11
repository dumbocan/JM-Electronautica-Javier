<form action="<?= base_url; ?>material/delete_material" method="POST">
<h1>Estas seguro que quieres eleminar <?=$name?>
<button type="submit" name="material_id" value="<?=$id?>">enviar</button>


<button formaction="<?=base_url;?>material/index">Materiales</button>
</form>