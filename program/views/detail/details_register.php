
<h2>Material a insertar en proyecto <?=$name?></h2>

<table>
    <tr>
        <th>Materiales</th>
    </tr>
</table>
<table>
    <tr class="header_small">
        <th style="width: 100px;">Fecha</th>
        <th style="width: 640px;">Material</th>
        <th style="width: 70px;">Cantidad</th>
        <th style="width: 8px;">Precio</th>        
        <th style="width: 6px;">Descuento</th> 
        <th style="width: 90px;"></th>
    </tr>
   


        <tr>
            <td>
                <?=$worksheet -> getworksheet_date()?>
            </td>
            <td>
                <table>
                    <tr>
                        <td>
                            <form  action="<?=base_url; ?>detail/add_detail" method="POST">
                                <input type="hidden" name="worksheet_id" value="<?=$worksheet -> getworksheet_id()?>">
                                <button class="submit" name="back" value="<?=$count-1?>">
                                    <abbr title="Atras"> <i class="fa fa-step-backward"></i></button></abbr>    
                                </button>   
                            </form>
                        </td>
                        <td>
                        <?php switch ($count):
                            case 0: ?>
                                <form  action="<?=base_url; ?>detail/add_detail" method="POST">
                                    <select name="section" id="section">
                                        <?php while ($row = mysqli_fetch_object($show_section) ): ?>
                                            <option value="<?=$row->section_id?>"><?=$row -> section_name?></option>
                                        <?php endwhile;?>
                                            <option value="new">Nuevo</option>
                                    </select>
                                    <input type="submit" value="enviar">
                                    <input type="hidden" name="worksheet_id" value="<?=$worksheet -> getworksheet_id()?>">
                                </form>
                            <?php break;   
                            case 1:?>   
                            
                                <form  action="<?=base_url; ?>detail/add_detail" method="POST">        
                                    <select name="category" id="category">
                                        <?php while ($row = mysqli_fetch_object($show_categories) ): ?>
                                            <option value="<?=$row->category_id?>"><?=$row -> category_name?></option>
                                        <?php endwhile;?>
                                    </select>
                                    <button type="submit">enviar</button>
                                    <input type="hidden" name="worksheet_id" value="<?=$worksheet -> getworksheet_id()?>">    
                                </form>    
                            <?php break;   
                            case 2:?>     
                            
                                
                                <form  action="<?=base_url; ?>detail/add_detail" method="POST">
                                    <select name="subcategory" id="subcategory">
                                        <?php while ($row = mysqli_fetch_object ($show_subcategory) ): ?>
                                            <option value="<?=$row -> subcategory_id?>"><?=$row -> subcategory_name?></option>
                                        <?php endwhile;?>
                                    </select>
                                    <input type="hidden" name="worksheet_id" value="<?=$worksheet -> getworksheet_id()?>">
                                    
                                    <button type="submit">enviar</button>
                                </form> 
                            <?php break;
                            case 3:?>                 
                                 <form action="<?=base_url; ?>detail/detail_save" method="post">
   
                                    <label><?=$subcategory -> getsubcategory_name()?></label> 
                                    <input type="hidden" name="subcategory_name" value="<?=$subcategory -> getsubcategory_name()?>"> 
                                    <input type="hidden" name="subcategory_id" value="<?=$subcategory -> getsubcategory_id()?>">  
                                    <input type="hidden" name="worksheet_id" value="<?=$worksheet -> getworksheet_id()?>">
                        <?php endswitch ?>
                        </td>      
                    </tr>
                </table>
            </td>
            <td>
                <?php if (isset($_POST['subcategory'])):?>
                    <?php if($quantity <> 0):?>
                    <select name="material_quantity" id="material_quantity" >
                            <?php $row = 1; while ($row < $quantity+1): ?>
                        <option value="<?=$row ?>"><?=$row ;$row++?></option>
                            <?php endwhile ?>
                    </select>    
                    <?php else:?>
                        <form action="<?=base_url; ?>detail/add_stock" method="POST">
                        <input type="hidden" name="subcategory_id" value="<?=$subcategory -> getsubcategory_id()?>">  
                        <input type="hidden" name="subcategory_stock" value="<?=$subcategory -> getsubcategory_stock()?>">  
                        <input type="hidden" name="add" value="1">  

                        <input type="submit" value="Añadir stock" name="add_stock">
                        </form>
                    <?php endif?>
                  <?php else :?>
                0
                <?php endif?>
            </td>
            <td>
                <?php if (isset($_POST['subcategory'])):?>
                   
                   <input type="number" name="material_price" value="<?=$detail -> getmaterial_price()?>">
                <?php else :?>
                0
                <?php endif?>
            </td>
            <td>
                <input type="number" name= "detail_discount">
            </td>
            <td>
            <?php if (isset($_POST['subcategory'])):?>

            <?php if($quantity <> 0):?>
                <input type="hidden" name="worksheet_id" value="<?=$worksheet_id?>"> 
                <input type="hidden" name="detail_date" value="<?=$worksheet -> getworksheet_date()?>">

                <input type="submit" name="detail_save" >
                </form>    
                <?php endif?>
                <?php endif?>

            </td>
          
        </tr> 
    
</table>
