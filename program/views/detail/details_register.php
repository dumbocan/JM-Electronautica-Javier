<h2>Material a insertar en proyecto <?=$name?></h2>
<h3>Del dia <?=$de->worksheet_date?></h3>

<?php if($count == 1):?>
  
  <label for="section"><h1><?=$sec->getsection_name()?></h1></label>
  <form  action="<?=base_url; ?>detail/add_detail" method="POST">
    <select name="category" id="category">
      <?php foreach ($cate as $row ): ?>
        <option value="<?=$row->category_id?>"><?=$row->category_name?> </option> 
      <?php endforeach;?>
    </select>
    <button type="submit">enviar</button>
    <input type="hidden" name="id" value="<?=$de->worksheet_id?>">
  </form>

<?php else: ?>
<label for="section">Añadir material</label>
  <form  action="<?=base_url; ?>detail/add_detail" method="POST">
    <select name="section" id="section">
      <?php foreach ($secti as $row ): ?>
        <option value="<?=$row->section_id?>"><?=$row->section_name?> </option> 
      <?php endforeach;?>
    </select>
    <button type="submit">enviar</button>
    <input type="hidden" name="id" value="<?=$de->worksheet_id?>">
  </form>
<?php endif ?>
    