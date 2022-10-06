
<?php if (isset($_SESSION['register']) && $_SESSION['register'] == 'complete'):?>
    <strong id="ok">Tu peticion se ha llevado a cavo satisfactoriamente  </strong>
    <?php elseif (isset($_SESSION['register']) && $_SESSION['register'] == 'failed'):?>
    <strong id="fallo">Registro fallido, introduce bien los datos</strong>
<?php endif; Utils::deleteSession('register'); ?>


<h1> GESTION DE MATERIALES </h1>

<table>
    <tr>
        <th style="width: 5%;">    
            id
        </th>
        <th style="width: 45%;">    
            Descripcion
        </th>
        <th style="width: 6%;">    
            Stock
        </th>
        <th style="width: 8%;">    
            Coste
        </th>
        <th style="width: 16%;">    
            N. de serie
        </th>
        <th style="width: 18%;">    
            Proveedor
        </th>
        <th style="width: 18%;">    
            
        </th>
    </tr>
    <?php while ($row = $data->fetch_object()):?>
    <tr>
        
            <td>
                <?= $row->material_id; ?>
            </td>
            <td>    
                <?= $row->material_name; ?>
            </td>
            <td>    
                <?= $row->material_stock; ?>
            </td>
            <td>    
                <?= $row->material_price; ?>
            </td>
            <td>               
                <?= $row->material_sn; ?>
            </td>   
            <td>  
                <?= $row->supplier_name; ?>
            </td>
            <td style="display: flex;">  
            <form action="<?=base_url; ?>material/edit_material" method="POST">
                <input type="hidden" name="material_id" value="<?= $row->material_id?>"  >     

                    <button class="submit">
                        <abbr title="Actualizar articulo"> <i class="fa fa-pencil"></i></button></abbr>    
                    </button>   
                </form>    
            
                <form action="<?=base_url; ?>material/material_ask_delete" method="POST">
                <input type="hidden" name="material_id" value="<?= $row->material_id?>"  >     
                <input type="hidden" name="material_name" value="<?= $row->material_name?>"  >     

                    <button class="submit">
                        <abbr title="Borrar articulo"><i class="fa fa-trash"></i></abbr>
                    </button> 
                </form>
            </td>              
        
    </tr><?php endwhile; ?>
    </br>
    
</table>
<table>
    <tr>
        <td>
        </br>
        </br>
            <form action="<?=base_url; ?>material/add_material" method="POST">
                <input type="submit" name="new_material" value="Insertar Material">

            </form>
        </td>
    </tr>
</table>

