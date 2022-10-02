
<h1> GESTION DE MATERIALES </h1>
<h3> Editar material: <?=$material->material_name?></h3>
<table>
    <tr>
        <th style="width: 5%;">    
            id
        </th>
        <th style="width: 50%;">    
            Descripcion
        </th>
        <th style="width: 6%;">    
            Stock
        </th>
        <th style="width: 10%;">    
            Coste
        </th>
        <th style="width: 18%;">    
            N. de serie
        </th>
        <th style="width: 18%;">    
            Proveedor
        </th>
        
    </tr>
    
    <tr>
        <form action="<?=base_url; ?>material/update_material" method="POST">
            <td>
                 <?= $material->material_id; ?><input type="hidden" name="material_id" value="<?= $material->material_id; ?>">
            </td>
            <td> 
                <input style="width: 100%;" type="text" name="material_name" value=" <?=  $material->material_name;?>">
            </td>
            <td>  
                <input   type="text" name="material_stock" value=" <?= $material->material_stock; ?>">
            </td>
            <td>  
                <input type="text" name="material_price" value=" <?= $material->material_price; ?>">
            </td>
            <td>  
                <input type="text" name="material_sn" value=" <?= $material->material_sn; ?>">
            </td>   
            <td>  
                <!-- this select-option use a foreach to find the data and selec the previusly selected "supplier_id" -->

                <select name="supplier_id">
                    <?php foreach ($suppliers as $supply): ?>
                        <option value="<?=$supply ['supplier_id'] ?>" <?php if($supplier -> supplier_id == $supply ['supplier_id']){echo 'selected="selected " ';  } ?>>  <?=$supply ['supplier_name'] ?></option>
                    <?php endforeach?>
                </select> 
                 
        
     </br>
    
</table>
<table>
    <tr>
        <td>
        </br>
        </br>
            
                <button type="submit" >Insertar cambios"</button>

            </form>
        </td>
    </tr>
</table>

