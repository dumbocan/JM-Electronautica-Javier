<h1> GESTION DE MATERIALES </h1>

<table>
    <tr>
        <th style="width: 5%;">    
            id
        </th>
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
        <?php while ($row = $data -> fetch_object()):?>
            <td>
                <?= $row -> material_id?>
            </td>
            <td>    
                <?= $row -> material_name?>
            </td>
            <td>    
                <?= $row -> material_stock?>
            </td>
            <td>    
                <?= $row -> material_price?>
            </td>
            <td>               
                <?= $row -> material_sn?>
            </td>   
            <td>  
                <?= $row -> supplier_name?>
            </td>          
        <?php endwhile?>
    </tr>
</table>
<table>
    <tr>
        <td>
            <form action="<?=base_url; ?>material/add_material" method="POST">
                <input type="submit" name="new_material" value="Insertar Material">

            </form>
        </td>
    </tr>
</table>

