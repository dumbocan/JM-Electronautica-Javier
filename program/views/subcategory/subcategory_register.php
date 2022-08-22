<h2>Subcategorias de <?=$category_name; ?></h2>
<?php ?>
    <table>
        <tr>
            <th>Nombre</th>
            <th>Stock</th>
            <th>Precio</th>
            <th>Numero de serie</th>
            <th></th>
            <th></th>
        </tr>
        
        <?php  while ($key = $subcategory -> fetch_object()):  //recorremos el objetos y obtenemos el valor de las propiedades?>
        <tr>
        
            <td><?php echo $subcategory_name = $key->subcategory_name; ?></td>
            <td><?php echo $subcategory_stock = $key->subcategory_stock; ?></td>
            <td><?php echo $subcategory_price = $key->subcategory_price; ?></td>
            <td><?php echo $serial_number = $key->serial_number; ?></td>
                <?php $subcategory_id = $key->subcategory_id; ?>
                <?php $category_id = $key->category_id; ?>
            <td>
                <form action="<?=base_url; ?>subcategory/edit_subcategory" method="POST">
                    <input type="hidden" id="subcategory_id"  name="subcategory_id" value="<?=$subcategory_id; ?>">
                    <input type="hidden" id="subcategory_name"  name="subcategory_name" value="<?=$subcategory_name; ?>">
                    <input type="hidden" id="category_name"  name="category_name" value="<?=$category_name; ?>">
                    <input type="hidden" id="category_id" name="category_id" value="<?=$cat->getcategory_id(); ?>">
                    <input type="submit"   value="Editar subcategoria">
                </form>    
            </td>
            <td>
                <form action="<?=base_url; ?>subcategory/ask_delete" method="POST">
                    <input type="hidden" id="subcategory_id"  name="subcategory_id" value="<?=$subcategory_id; ?>">
                    <input type="hidden" id="subcategory_name"  name="subcategory_name" value="<?=$subcategory_name; ?>">
                    <input type="hidden" id="category_name"  name="category_name" value="<?=$category_name; ?>">
                    <input type="hidden" id="category_id" name="category_id" value="<?=$cat->getcategory_id(); ?>">
                    <input type="submit"   value="Borrar subcategoria">
                </form>
                 
            </td>   
           
        </tr>
        <?php endwhile; ?>
    </table>  

    <form action="<?=base_url; ?>subcategory/new_subcategory" method="POST">
        <input type="hidden" id="category_name" name="category_name" value="<?=$category_name; ?>">
        <input type="hidden" id="category_id" name="category_id" value="<?=$cat->getcategory_id(); ?>">
        <input type="submit" id="new_subcategory" name="new_subcategory" value="Nueva subcategoria">
    </form>
   