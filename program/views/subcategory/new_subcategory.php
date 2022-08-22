<h3>Nuevo articulo en  <?=$category_name; ?></h3>

<form action="<?=base_url; ?>subcategory/save_subcategory" method="POST">
    <tag>Introduce nuevo articulo para <?=$category_name; ?></tag>
    <table>
        <tr>
            <th>Nombre</th>
            <th>Stock</th>
            <th>Precio</th>
            <th>Numero de serie</th>
        </tr>
        <tr>
            <td><input type="text" name="subcategory_name" id="subcategory_name"></td>
            <td><input type="text" name="subcategory_stock" id="subcategory_stock"></td>
            <td><input type="text" name="subcategory_price" id="subcategory_price" ></td>
            <td><input type="text" name="serial_number" id="serial_number"></td>
        </tr>
    </table>
    <input type="hidden" name="category_id" id="category_id" value="<?= $cat->getcategory_id(); ?>">
    <input type="hidden" name="category_name" id="category_name" value="<?= $category_name; ?>">
    <input type="submit" >

</form>