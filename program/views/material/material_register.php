<h2>Materiales</h2>
<?php ?>
<?php  foreach ($material as $key):  //recorremos el array de objetos y obtenemos el valor de las propiedades?>
    <?php echo $material_name=$key->material_name; ?>
    <?php $material_id = $key->material_id; ?>
          
    <form action="<?=base_url; ?>material/edit_material" method="POST">
        <input type="hidden" id="material_id"  name="material_id" value="<?=$material_id; ?>">
        <input type="hidden" id="material_name"  name="material_name" value="<?=$material_name; ?>">
        <input type="submit"   value="Editar material">
    </form>
    <form action="<?=base_url; ?>material/ask_delete" method="POST">
        <input type="hidden" id="material_id"  name="material_id" value="<?=$material_id; ?>">
        <input type="hidden" id="material_name"  name="material_name" value="<?=$material_name; ?>">
        <input type="submit"   value="Borrar material">
    </form>
</br> 
    
<?php endforeach; ?>
    <form action="<?=base_url; ?>material/new_material" method="POST">
        <input type="submit" id="new_material" name="new_material" value="Nuevo material">
    </form>

