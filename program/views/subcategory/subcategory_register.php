<h2>Categorias de <?=$section_name; ?></h2>
<?php ?>
<?php  foreach ($subcategory as $key):  //recorremos el array de objetos y obtenemos el valor de las propiedades?>
    <?php echo $subcategory_name = $key->subcategory_name; ?>
    <?php $subcategory_id = $key->subcategory_id; ?>
    <?php $section_id = $key->section_id; ?>
          
    <form action="<?=base_url; ?>subcategory/edit_subcategory" method="POST">
        <input type="hidden" id="subcategory_id"  name="subcategory_id" value="<?=$subcategory_id; ?>">
        <input type="hidden" id="subcategory_name"  name="subcategory_name" value="<?=$subcategory_name; ?>">
        <input type="hidden" id="section_name"  name="section_name" value="<?=$section_name; ?>">
        <input type="hidden" id="section_id" name="section_id" value="<?=$cat->getsection_id(); ?>">
        <input type="submit"   value="Editar subcategoria">
    </form>
    <form action="<?=base_url; ?>subcategory/ask_delete" method="POST">
        <input type="hidden" id="subcategory_id"  name="subcategory_id" value="<?=$subcategory_id; ?>">
        <input type="hidden" id="subcategory_name"  name="subcategory_name" value="<?=$subcategory_name; ?>">
        <input type="hidden" id="section_name"  name="section_name" value="<?=$section_name; ?>">
        <input type="hidden" id="section_id" name="section_id" value="<?=$cat->getsection_id(); ?>">
        <input type="submit"   value="Borrar subcategoria">
    </form>
</br> 
    
<?php endforeach; ?>
    <form action="<?=base_url; ?>subcategory/new_subcategory" method="POST">
        <input type="hidden" id="section_name" name="section_name" value="<?=$section_name; ?>">
        <input type="hidden" id="section_id" name="section_id" value="<?=$cat->getsection_id(); ?>">
        <input type="submit" id="new_subcategory" name="new_subcategory" value="Nueva subcategoria">
    </form>

