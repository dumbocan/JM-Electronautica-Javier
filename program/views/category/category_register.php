<h2>Categorias de <?=$section_name; ?></h2>
<?php ?>
<?php  foreach ($category as $key):  //recorremos el array de objetos y obtenemos el valor de las propiedades?>
    <?php echo $category_name = $key->category_name; ?>
    <?php $category_id = $key->category_id; ?>
    <?php $section_id = $key->section_id; ?>
          
    <form action="<?=base_url; ?>category/edit_category" method="POST">
        <input type="hidden" id="category_id"  name="category_id" value="<?=$category_id; ?>">
        <input type="hidden" id="category_name"  name="category_name" value="<?=$category_name; ?>">
        <input type="hidden" id="section_name"  name="section_name" value="<?=$section_name; ?>">
        <input type="hidden" id="section_id" name="section_id" value="<?=$cat->getsection_id(); ?>">
        <input type="submit"   value="Editar categoria">
    </form>
    <form action="<?=base_url; ?>category/ask_delete" method="POST">
        <input type="hidden" id="category_id"  name="category_id" value="<?=$category_id; ?>">
        <input type="hidden" id="category_name"  name="category_name" value="<?=$category_name; ?>">
        <input type="hidden" id="section_name"  name="section_name" value="<?=$section_name; ?>">
        <input type="hidden" id="section_id" name="section_id" value="<?=$cat->getsection_id(); ?>">
        <input type="submit"   value="Borrar categoria">
    </form>

    <form action="<?=base_url; ?>subcategory/index" method="POST">
        <input type="hidden" id="category_id"  name="category_id" value="<?=$category_id; ?>">
        <input type="hidden" id="category_name"  name="category_name" value="<?=$category_name; ?>">

        <input type="submit"   value="Subcategorías en <?=$category_name ?>">
    </form>
</br> 

    
<?php endforeach; ?>
    <form action="<?=base_url; ?>category/new_category" method="POST">
        <input type="hidden" id="section_name" name="section_name" value="<?=$section_name; ?>">
        <input type="hidden" id="section_id" name="section_id" value="<?=$cat->getsection_id(); ?>">
        <input type="submit" id="new_category" name="new_category" value="Nueva categoria">
    </form>

