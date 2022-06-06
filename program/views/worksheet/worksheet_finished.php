<h2>Proyectos finalizados</h2>
<
<?php foreach ($searchF as $key => $value): ?>
<form action="<?=base_url; ?>worksheet/prepare_worksheet" method="POST">
<input type="submit" name="<?=$value; ?>" value="<?=$value; ?>" >
</form>
<?php endforeach; ?>