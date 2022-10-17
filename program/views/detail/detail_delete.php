<form action="<?= base_url; ?>detail/delete_detail" method="POST">
  <h3>Estas seguro que quieres eleminar el material  <?=$material_name?></h3>

  <input type="submit"  value="Borrar">
  <input type="hidden" value="<?=$material_name?>" name="material_name">
  <input type="hidden" value="<?=$material_id?>" name="material_id">
  <input type="hidden" name="project_id" value="<?=$project_id?>">

  <input type="hidden" value="<?=$detail_id?>" name="detail_id">

</form>
 <form action="<?=base_url;?>worksheet/prepare_worksheet" method="POST">
    <input type="hidden" name="project_id" value="<?=$project_id?>">

    <button type="submit" name="regresar">Regresar</button>
 </form>