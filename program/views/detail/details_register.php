
<h2>Material a insertar en proyecto <?=$name?></h2>

<table>
    <tr>
        <th>Materiales</th>
    </tr>
</table>
<table>
    <tr class="header_small">
        <th style="width: 10%;">Fecha</th>
        <th style="width: 50%;">Material</th>
        <th style="width: 10$;">Cantidad</th>
        <th style="width: 10%;">Precio</th>        
        <th style="width: 10%;">Descuento</th> 
        <th style="width: 10%;"></th>
    </tr>
   

    
        <tr>
            <td>
                <?=$worksheet -> getworksheet_date()?>
            </td>
            <td>
                <?php if($search_db == 0):?>
                <form action="<?=base_url?>detail/add_detail" method="POST">
                    <input type="text" name="material_name">
                    <input type="hidden" name="worksheet_id" value="<?=$worksheet_id?>">
                    <input type="hidden" name="project_id" value="<?=$project_id?>"> 

                    <button type="submit" >buscar</button>
                </form> 
                <?php elseif($search_db == 1):?> 
                    <form action="<?=base_url?>detail/add_detail" method="POST">
                        <select name="material_id">
                            <?php foreach($search as $data):?>
                                <option value="<?= $data['material_id']?>">  <?=$data['material_name']?> </option>
                            <?php endforeach;?> 
                        </select>
                        <input type="hidden" name="worksheet_id" value="<?=$worksheet_id?>">
                        <input type="hidden" name="project_id" value="<?=$project_id?>"> 

                        <button type="submit" >Aceptar</button>
                    </form>    
                
                <?php  elseif($search_db == 2): ?>
                    <?=$material -> material_name?>
                <?php endif;?>   

            </td>
            <td>
             <form action="<?=base_url?>worksheet/prepare_worksheet" method="POST" id="detail">
   
            <?php if (isset($_POST['material_id'])):?>
                    <?php if($quantity ):?>
                        <select name="material_quantity" id="quantity" form="detail">
                            <?php $row = 1; while ($row < $quantity+1): ?>
                            <option value="<?=$row ?>"><?=$row ;$row++?></option>
                        <?php endwhile ?>
                    <?php else:?>
                        <form action="<?=base_url; ?>detail/add_stock" method="POST">
                            <input type="hidden" name="material_id" value="<?=$material -> getmaterial_id()?>">  
                            <input type="hidden" name="material_stock" value="<?=$material -> getmaterial_stock()?>">  

                            <input type="submit" value="Añadir stock" name="add_stock">
                        </form> 
                   <?php endif?>
            <?php else :?>
            0
            <?php endif?>
                       
                
               
                    </select>    
            </td>
            <td>
                <?php if (isset($_POST['material_id'])):?>
                   
                   <input type="number" name="detail_price" value="<?=$detail -> getDetail_price()?>">
                <?php else :?>
                0
                <?php endif?>
            </td>
            <td>
            <?php if (isset($_POST['material_id'])):?>
                <input type="number" name= "detail_discount" id="detail_discount">
                    
                <?php else :?>
                0
                <?php endif?>
            </td>
            <td>
            

            
            
                <input type="hidden" name="worksheet_id" value="<?=$worksheet_id?>"> 
                <input type="hidden" name="project_id" value="<?=$project_id?>"> 
                <input type="hidden" name="detail_date" value="<?=$worksheet -> getworksheet_date()?>">
                <input type="hidden" name="worksheet_id" value="<?=$worksheet -> getworksheet_id()?>">
                <input type="hidden" name="material_id" value="<?=$material -> material_id?>">

                <input type="submit" name="detail_save" value="Enviar">
            </form>    
            
                

            </td>
          
        </tr> 
    
</table>
