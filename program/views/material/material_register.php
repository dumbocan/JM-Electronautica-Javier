
<?php if (isset($_SESSION['register']) && $_SESSION['register'] == 'complete'):?>
    <strong id="ok">Tu peticion se ha llevado a cavo satisfactoriamente  </strong>
    <?php elseif (isset($_SESSION['register']) && $_SESSION['register'] == 'failed'):?>
    <strong id="fallo">Registro fallido, introduce bien los datos</strong>
<?php endif; Utils::deleteSession('register');?>


<h1> GESTION DE MATERIALES </h1>

<table>
    <tr>
        <th style="width: 5%;">    
            id
        </th>
        <th style="width: 40%;">    
            Descripcion
        </th>
        <th style="width: 6%;">    
            Stock
        </th>
        <th style="width: 8%;">    
            Coste
        </th>
        <th style="width: 18%;">    
            N. de serie
        </th>
        <th style="width: 17%;">    
            Proveedor
        </th>
        <th style="width: 18%;">    
            
        </th>
    </tr>
    <?php while ($row = $data -> fetch_object()):?>
    <tr>
        
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
            <td>  
                botones
            </td>              
        
    </tr><?php endwhile?>
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

