<h2>sectiones</h2>
<?php ?>
<?php  foreach ($section as $key):  //recorremos el array de objetos y obtenemos el valor de las propiedades?>
    <?php echo $section_name = $key->section_name; ?>
    <?php $section_id = $key->section_id; ?>
    
          
    <form action="<?=base_url; ?>section/edit_section" method="POST">
        <input type="hidden" id="section_id"  name="section_id" value="<?=$section_id; ?>">
        <input type="hidden" id="section_name"  name="section_name" value="<?=$section_name; ?>">
        <input type="submit"   value="Editar seccion">
    </form>
    <form action="<?=base_url; ?>section/ask_delete" method="POST">
        <input type="hidden" id="section_id"  name="section_id" value="<?=$section_id; ?>">
        <input type="hidden" id="section_name"  name="section_name" value="<?=$section_name; ?>">
        <input type="submit"   value="Borrar seccion">
    </form>
    <form action="<?=base_url; ?>category/index" method="POST">
        <input type="hidden" id="section_id"  name="section_id" value="<?=$section_id; ?>">
        <input type="hidden" id="section_name"  name="section_name" value="<?=$section_name; ?>">
        <input type="submit"   value="Categorias en <?=$section_name; ?>">
    </form>
</br> 
    
<?php endforeach; ?>
    <form action="<?=base_url; ?>section/new_section" method="POST">
        <input type="submit" id="new_section" name="new_section" value="Nueva seccion">
    </form>

