<form action="<?= base_url; ?>project/delete_project" method="POST">
<h1>Estas seguro que quieres eleminar a <?=$name?>

<input type="submit" name="Borrar" value="Borrar">
<input type="hidden" value="<?=$name?>" name="borrar">

  <button formaction="<?=base_url;?>">Inicio</button>
</form>