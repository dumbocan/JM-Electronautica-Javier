<h2>Material a insertar en proyecto <?=$name?></h2>
<h3>Del dia <?=$de->worksheet_date?></h3>

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
        foreach ($subcat_name as $row ): ?>
          <input type="submit" name="subcategory" value="<?=$subcat_name->subcategory_name?>"> 
        <?php endforeach;endif;?>

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
    