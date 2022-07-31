<h2>Material a insertar en proyecto <?=$name?></h2>
<h3>Del dia <?=$de->worksheet_date?></h3>

<?php switch ($count):
  case 0: ?>
    <label for="section">Añadir material</label>
      <form  action="<?=base_url; ?>detail/add_detail" method="POST">
        <select name="section" id="section">
          <?php foreach ($secti as $row ): ?>
            <option value="<?=$row->section_id?>"><?=$row->section_name?> </option> 
          <?php endforeach;?>
            <option value="new">Nuevo</option>
        </select>
        <button type="submit">enviar</button>
        <input type="hidden" name="id" value="<?=$de->worksheet_id?>">
      </form>
<?php break;   
  case 1:?>
    <label for="section"><h1><?=$a?></h1></label>
      <form  action="<?=base_url; ?>detail/add_detail" method="POST">
        <select name="category" id="category">
          <?php foreach ($cate as $row ): ?>
            <option value="<?=$row->category_id?>"><?=$row->category_name?> </option>
          <?php endforeach;?>
            <option value="new">Nuevo</option>
        </select>
        <button type="submit">enviar</button>
        <input type="hidden" name="id" value="<?=$de->worksheet_id?>">    
        <input type="hidden" name="section_name" value="<?=$a?>">
        <input type="hidden" name="section_id" value="<?=$section_id?>">
      </form>
<?php break;   
  case 2:?>
    <label for="section"><h1><?=$a?></h1></label>
    <label for="category"><h1><?=$cat_name?></h1></label>
      <form  action="<?=base_url; ?>detail/add_detail" method="POST">
        <?php foreach ($subcat_name as $row ): ?>
          <p><?=$row->subcategory_name?> </p> 
        
          <?php endforeach;?>
      </form>
<?php break;
  case 3:?>
    <label for="section"><h1><?=$a?></h1></label>
    <form  action="<?=base_url; ?>category/new_category" method="POST">
    <input type="hidden" name="section_id" value="<?=$section_id?>">
    <input type="hidden" name="section_name" value="<?=$section_name?>">
      <input type="submit"  value="Enviar">
    </form>
    <?php endswitch ?>
    