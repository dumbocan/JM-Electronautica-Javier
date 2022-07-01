<?php ;?>
<h3>Insertar material en base de datos</h3>
<form action="<?=base_url?>material/save_material" method="POST">
    <label for="material_category">Categoria</label>
    <input type="text" name="material_category" >
    <label for="material_name">Nombre</label>
    <input type="text" name="material_name" >
    <label for="serial_number">Numero de serie</label>
    <input type="text" name="serial_number" >
    <label for="material_price">Precio coste</label>
    <input type="text" name="material_price" >
    <br>
    <br>
    <input type="submit" value="Enviar"/>


</form>