
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
        <th style="width: 80px;">Precio</th>        
        <th style="width: 60px;">Descuento</th> 
        <th style="width: 90px;">Total</th>
    </tr>
    <form action="" method="POST">
        <tr>
            <td>
                <?=$worksheet -> getworksheet_date()?>
                <input type="hidden" name="worksheet_date" value="<?=$worksheet -> getworksheet_date()?>">
            </td>
            <td>
                <table>
                    <tr>
                        <?php switch ($count):
                            case 0: ?>
                                    <form  action="<?=base_url; ?>detail/add_detail" method="POST">
                                    <select name="section" id="section">
                                        <?php while ($row = mysqli_fetch_object($show_section) ): ?>
                                            <option value="<?=$row->section_id?>"><?=$row -> section_name?></option>
                                        <?php endwhile;?>
                                            <option value="new">Nuevo</option>
                                    </select>
                                    <button type="submit">enviar</button>
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
                                    <label type="text" name="subcategory" ><?=$subcategory -> getsubcategory_name()?></label> 
                                    <input type="hidden" name="subcategoryes" value="<?=$subcategory -> getsubcategory_name()?>">  
                        <?php endswitch ?>      
                    </tr>
                </table>
            </td>
            <td>
                <?php if (isset($_POST['subcategory'])):?>
                <form  action="<?=base_url; ?>detail/add_detail" method="POST">
                    <select name="quantity" id="quantity">
                            <?php $row = 0; while ($row < $quantity): ?>
                        <option value="<?=$row ?>"><?=$row ;$row++?></option>
                            <?php endwhile ?>
                    </select>
                    <input type="submit" value="enviar">
                </form>
                <?php else :?>
                3
                <?php endif?>
            </td>
            <td>
                4
            </td>
            <td>
            5 
            </td>
            <td>
            6 
            </td>
            <?php  //endwhile; ?>
        </tr> 
    </form>
</table>
