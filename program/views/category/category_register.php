<table>
    <tr>
        <th>
            <h2>Categorias de <?=$section_name; ?></h2>
        </th>    
    </tr>
</table>
<?php  while ($key = $category -> fetch_object()):  //recorremos el  objeto y obtenemos el valor de las propiedades?>
<?php $category_id = $key->category_id; ?>
<?php $section_id = $key->section_id; ?>
<?php $category_name = $key->category_name;?>
<table>
    <tr>
        <td>
        <form action="<?=base_url; ?>subcategory/index" method="POST">
            <input type="hidden" id="category_id"  name="category_id" value="<?=$category_id; ?>">
            <input type="hidden" id="category_name"  name="category_name" value="<?=$category_name; ?>">
            <input type="submit"   value="<?= $category_name;?>">
            
        </form>

        </td>
        <td>
            <form action="<?=base_url; ?>category/edit_category" method="POST">
                <input type="hidden" id="category_id"  name="category_id" value="<?=$category_id; ?>">
                <input type="hidden" id="category_name"  name="category_name" value="<?=$category_name; ?>">
                <input type="hidden" id="section_name"  name="section_name" value="<?=$section_name; ?>">
                <input type="hidden" id="section_id" name="section_id" value="<?=$cat->getsection_id(); ?>">
                    <button class="submit">
                        <abbr title="Actualizar categoria"> <i class="fa fa-pencil"></i></button></abbr>    
                    </button> 
            </form>
        </td>
        <td>
            <form action="<?=base_url; ?>category/ask_delete" method="POST">
                <input type="hidden" id="category_id"  name="category_id" value="<?=$category_id; ?>">
                <input type="hidden" id="category_name"  name="category_name" value="<?=$category_name; ?>">
                <input type="hidden" id="section_name"  name="section_name" value="<?=$section_name; ?>">
                <input type="hidden" id="section_id" name="section_id" value="<?=$cat->getsection_id(); ?>">
                    <button class="submit">
                        <abbr title="Borrar categoria"><i class="fa fa-trash"></i></abbr>
                    </button>      
            </form>
        </td>
        
    </tr>
      
</table>
  <?php endwhile; ?>
    <form action="<?=base_url; ?>category/new_category" method="POST">
        <input type="hidden" id="section_name" name="section_name" value="<?=$section_name; ?>">
        <input type="hidden" id="section_id" name="section_id" value="<?=$cat->getsection_id(); ?>">
        <input type="submit" id="new_category" name="new_category" value="Nueva categoria">
    </form>

