<h2>Material a insertar en proyecto <?=$name?></h2>
<h3>Del dia <?=$de->worksheet_date?></h3>
<table>
    <tr>
        <th>Materiales</th>
    </tr>
</table>
<table>
    <tr class="header_small">
        <th style="width: 100px;">Fecha</th>
        <th style="width: 70px;">Cantidad</th>
        <th style="width: 640px;">Material</th>
        <th style="width: 80px;">Precio</th>        
        <th style="width: 60px;">Descuento</th> 
        <th style="width: 90px;">Total</th>
    </tr>
    <tr>
    <?php //while ($data = $search_worksheet -> fetch_object()):?>

        <td>
            <?=$de->worksheet_date?>
        </td>
        <td>
            <input type="text"   name="subcategory_quantity" style="width: 100%;" > 
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
<?php switch ($count):
  case 0: ?>
    <label for="section">Añadir material</label>
      <form  action="<?=base_url; ?>detail/add_detail" method="POST">
        <select name="section" id="section">
          <?php while ($row = mysqli_fetch_object($secti) ): ?>
            <option value="<?=$row->section_id?>"><?=$row->section_name?></option>
          <?php endwhile;?>
          <option value="new">Nuevo</option>
        </select>
        <button type="submit">enviar</button>
        <input type="hidden" name="worksheet_id" value="<?=$de->worksheet_id?>">
      </form>
<?php break;   
  case 1:?>
    <label for="section"><h1><?=$a ->section_name?></h1></label>
      <form  action="<?=base_url; ?>detail/add_detail" method="POST">
        
        <select name="category" id="category">
          <?php while ($row = mysqli_fetch_object($cate) ): ?>
           <option value="<?=$row->category_id?>"><?=$row->category_name?></option>
          <?php endwhile;?>
        </select>
        <button type="submit">enviar</button>
        <input type="hidden" name="worksheet_id" value="<?=$de->worksheet_id?>">    
        <input type="hidden" name="section_name" value="<?=$a ->section_name?>">
        <input type="hidden" name="section_id" value="<?=$section_id?>">

        
      </form>
<?php break;   
  case 2:?>
    <label for="section"><h1><?=$a?></h1></label>
    <label for="category"><h1><?=$cat_name?></h1></label>
      <form  action="<?=base_url; ?>worksheet/prepare_worksheet" method="POST">

        <?php 
        if($subcat_name == true):
        while ($row = $subcat_name -> fetch_object() ): ?>
          <input type="submit" name="subcategory" value="<?=$row->subcategory_name?>"> 
          <input type="hidden" name="project_id" value="<?=$de->project_id?>">    
          <input type="hidden" name="subcategory_id" value="<?=$row->subcategory_id?>">    
          <input type="hidden" name="worksheet_id" value="<?=$de->worksheet_id?>">    

          <?php endwhile;endif;?>

      </form>
<?php break;
  case 3:?>
    <label for="seccion"><h1><?=$a ->section_name?></h1></label>
      <form  action="<?=base_url; ?>section/index" method="POST">
        <input type="hidden" name="section_id" value="<?=$section_id?>">
        <input type="hidden" name="section_name" value="<?=$section_name?>">
        <input type="submit"  value="Enviar">
      </form>
<?php endswitch ?>


