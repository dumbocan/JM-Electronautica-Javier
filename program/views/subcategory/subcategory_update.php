<h2>Editar articulo : <?=$result_get_subcategories -> subcategory_name ; ?></h2>
<form action="<?=base_url; ?>subcategory/update_subcategory" method="POST">

<table>
        <tr>
            <th>Nombre</th>
            <th>Stock</th>
            <th>Precio</th>
            <th>Numero de serie</th>
        </tr>
        <tr>
            <td><input type="text" name="subcategory_name" value="<?=$result_get_subcategories -> subcategory_name ; ?>"></td>
            <td><input type="text" name="subcategory_stock" value="<?=$result_get_subcategories -> subcategory_stock; ?>"></td>
            <td><input type="text" name="subcategory_price" value="<?=$result_get_subcategories -> subcategory_price; ?>"></td>
            <td><input type="text" name="serial_number" value="<?=$result_get_subcategories -> serial_number; ?>"></td>
        </tr>
    </table>

<input type="submit" id="subcategory_update" >
<input type="hidden" name="subcategory_id" value="<?=$result_get_subcategories -> subcategory_id; ?>" >
<input type="hidden" name="category_name" value="<?=$category_name; ?>" >
<input type="hidden" name="category_id" value="<?=$category_id; ?>" >
</form>