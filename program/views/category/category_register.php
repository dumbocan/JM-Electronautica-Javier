<h2>Categorias de <?=$material_name?></h2>
<?php ?>
<?php  foreach ($category as $key):  //recorremos el array de objetos y obtenemos el valor de las propiedades?>
    <?php echo $category_name=$key->category_name; ?>
    <?php $category_id = $key->category_id; ?>
    <?php $material_id = $key->material_id; ?>
          
    <form action="<?=base_url; ?>category/edit_category" method="POST">
        <input type="hidden" id="category_id"  name="category_id" value="<?=$category_id; ?>">
        <input type="hidden" id="category_name"  name="category_name" value="<?=$category_name; ?>">
        <input type="hidden" id="material_name"  name="material_name" value="<?=$material_name; ?>">
        <input type="hidden" id="material_id" name="material_id" value="<?=$cat->getMaterial_id()?>">
        <input type="submit"   value="Editar categoria">
    </form>
    <form action="<?=base_url; ?>category/ask_delete" method="POST">
        <input type="hidden" id="category_id"  name="category_id" value="<?=$category_id; ?>">
        <input type="hidden" id="category_name"  name="category_name" value="<?=$category_name; ?>">
        <input type="hidden" id="material_name"  name="material_name" value="<?=$material_name; ?>">
        <input type="hidden" id="material_id" name="material_id" value="<?=$cat->getMaterial_id()?>">
        <input type="submit"   value="Borrar categoria">
    </form>
</br> 
    
<?php endforeach; ?>
    <form action="<?=base_url; ?>category/new_category" method="POST">
        <input type="hidden" id="material_name" name="material_name" value="<?=$material_name?>">
        <input type="hidden" id="material_id" name="material_id" value="<?=$cat->getMaterial_id()?>">
        <input type="submit" id="new_category" name="new_category" value="Nueva categoria">
    </form>

