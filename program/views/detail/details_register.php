
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
    <tr>
        <td>
            <?=$get_data->worksheet_date?>
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
                                <input type="hidden" name="worksheet_id" value="<?=$get_data -> worksheet_id?>">
                            </form>
                        <?php break;   
                        case 1:?>   
                            <label for="section"><?=$section_name -> section_name?> / </label>
                            <form  action="<?=base_url; ?>detail/add_detail" method="POST">        
                                <select name="category" id="category">
                                    <?php while ($row = mysqli_fetch_object($cate) ): ?>
                                        <option value="<?=$row->category_id?>"><?=$row -> category_name?></option>
                                    <?php endwhile;?>
                                </select>
                                <button type="submit">enviar</button>
                                <input type="hidden" name="worksheet_id" value="<?=$get_data -> worksheet_id?>">    
                                <input type="hidden" name="section_name" value="<?=$section_name -> section_name?>">
                                <input type="hidden" name="section_id" value="<?=$section_id?>">
                            </form>    
                        <?php break;   
                        case 2:?>     
                            <label for="section"><?=$section_name?> / </label>
                            <label for="category"><?=$cat_name?> / </label>
                            <form  action="<?=base_url; ?>detail/add_detail" method="POST">
                                <select name="subcategory" id="subcategory">
                                    <?php while ($row = $show_subcategory -> fetch_object() ): ?>
                                        <option value="<?=$row -> subcategory_id?>"><?=$row -> subcategory_name?></option>
                                    <?php endwhile;?>
                                </select>
                                <input type="hidden" name="project_id" value="<?=$get_data -> project_id?>">    
                                <input type="hidden" name="worksheet_id" value="<?=$get_data -> worksheet_id?>">    
                                <button type="submit">enviar</button>
                            </form> 
                        <?php break;
                        case 3:?>     
                            <form  action="<?=base_url; ?>section/index" method="POST">
                                <input type="hidden" name="section_id" value="<?=$section_id?>">
                                <input type="hidden" name="section_name" value="<?=$section_name?>">
                                <input type="submit"  value="Enviar">
                            </form>
                    <?php endswitch ?>      
                </tr>
            </table>
        </td>
        <td>
          3  
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
</table>
