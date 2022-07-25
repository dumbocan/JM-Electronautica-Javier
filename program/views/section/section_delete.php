<form action="<?= base_url; ?>section/delete_section" method="POST">
<h1>Estas seguro que quieres eleminar <?=$name; ?>
<button type="submit" name="section_id" value="<?=$id; ?>">enviar</button>


<button formaction="<?=base_url; ?>section/index">sectiones</button>
</form>