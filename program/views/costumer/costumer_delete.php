<form action="<?= base_url; ?>costumer/delete" method="POST">
<h2>Estas seguro que quieres eleminar a <?=$name; ?></h2>
<input type="hidden" name="costumer_name" value="<?=$name; ?>">
<input type="submit" value="Aceptar">


  <button formaction="<?=base_url; ?>">Inicio</button>
</form>