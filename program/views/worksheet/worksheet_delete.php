<form action="<?= base_url; ?>worksheet/delete_worksheet" method="POST">
<h1>Estas seguro que quieres eleminar: <?=$date?>
<br>
<input type="submit"  value="Borrar">
<input type="hidden" name="id" value="<?=$id?>">

  <button formaction="<?=base_url;?>">Inicio</button>
</form>