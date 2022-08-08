<form action="<?= base_url; ?>worksheet/delete_worksheet" method="POST">
<h1>Estas seguro que quieres eleminar: <?=$worksheet_date?>
<br>
<input type="submit"  value="Borrar">
<input type="hidden" name="worksheet_id" value="<?=$worksheet_id?>">
<input type="hidden" name="project_id" value="<?=$project_id?>">

  <button formaction="<?=base_url;?>">Inicio</button>
</form>