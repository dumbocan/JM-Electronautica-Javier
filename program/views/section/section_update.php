<h2>Editar seccion</h2>
<form action="<?=base_url; ?>section/update_section" method="POST">
<input type="text" name="section_name" value="<?=$name; ?>">
<input type="submit" id="section_update" >
<input type="hidden" name="section_id" value="<?=$id; ?>" >
</form>