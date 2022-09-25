<h1>Insertar material</h1>
<form action="<?=base_url;?>material/material_save" method="POST">
    <table>
        <tr>
        
        <th style="width: 50%;">    
            Descripcion
        </th>
        <th style="width: 5%;">    
            Stock
        </th>
        <th style="width: 5%;">    
            Coste
        </th>
        <th style="width: 15%;">    
            N. de serie
        </th>
        <th style="width: 20%;">    
            Proveedor
        </th>
        </tr>
        <tr>
        <td >
            <input type="text" name="material_name" style="width: 100%;" >
        </td>
        <td>
            <input type="text" name="material_stock">
        </td>
        <td>
            <input type="text" name="material_price">
        </td>
        <td>
            <input type="text" name="material_sn">
        </td>
        <td>
            <select name="supplier_id">
                <?php while ($row = $supplier_data -> fetch_object()):?>
                <option value="<?=$row -> supplier_id?>"><?=$row -> supplier_name?></option>
                <?php endwhile?>
        </td>           
        </tr>
    </table>
    <input type="submit" name="material_new" value="Enviar">
</form>