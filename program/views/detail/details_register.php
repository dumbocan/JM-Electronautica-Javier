<h2>Material a insertar en proyecto <?=$name?></h2>
<h3>Del dia <?=$de->worksheet_date?></h3>

<label for="add_material">Añadir material</label>
    
    
    <form  action="<?=base_url; ?>detail/add_detail" method="POST">
    <select name="material" id="material">
      <?php foreach ($secti as $row ): ?>
        <option name="<?=$row->section_id?>" value="<?=$row->section_name?>"><?=$row->section_name?> </option> 
      <?php endforeach;?>
    </select>
    <button type="submit" value="<?=$row->section_name?>">enviar</button>
    </form>
    