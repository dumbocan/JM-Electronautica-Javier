<form action="<?= base_url; ?>project/delete_project" method="POST">
  <h1>Estas seguro que quieres eleminar el proyecto de embarcacion <?=$name?>

  <input type="submit"  value="Borrar">
  <input type="hidden" value="<?=$name?>" name="boat_name">
  <input type="hidden" value="<?=$project_id?>" name="project_id">

</form>
  <button formaction="<?=base_url;?>">Inicio</button>
