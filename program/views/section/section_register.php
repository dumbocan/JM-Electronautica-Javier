

<br>
<br>
<table>
    <tr>
        <th>
            <h3>Seccion</h3>
        </th>
    </tr>
</table>
<?php  while($key = $sec -> fetch_object()):
    //recorremos el objeto y obtenemos el valor de las propiedades?>
<?php $section_name = $key->section_name;?>
<?php $section_id = $key->section_id; ?>
<table>
    <tr>
        <td>
            
            <form action="<?=base_url; ?>category/index" method="POST">
                <input type="hidden" id="section_id"  name="section_id" value="<?=$section_id; ?>">
                <input type="hidden" id="section_name"  name="section_name" value="<?=$section_name; ?>">
                <input type="submit"   value="Categorias en <?=$section_name; ?>">
            </form>
        </td>
        <td>
             <form action="<?=base_url; ?>section/edit_section" method="POST">
                <input type="hidden" id="section_id"  name="section_id" value="<?=$section_id; ?>">
                <input type="hidden" id="section_name"  name="section_name" value="<?=$section_name; ?>">
                <button class="submit">
                    <abbr title="Actualizar seccion"> <i class="fa fa-pencil"></i></button></abbr>    
                </button>                
            </form>
        </td>
        <td>
            <form action="<?=base_url; ?>section/ask_delete" method="POST">
                <input type="hidden" id="section_id"  name="section_id" value="<?=$section_id; ?>">
                <input type="hidden" id="section_name"  name="section_name" value="<?=$section_name; ?>">
                <button class="submit">
                    <abbr title="Borrar seccion"><i class="fa fa-trash"></i></abbr>
                </button>                
            </form>
        </td>
    </tr>
</table>

  
    
          
   
    
    

    
<?php endwhile; ?>
    <form action="<?=base_url; ?>section/new_section" method="POST">
        <input type="submit" id="new_section" name="new_section" value="Nueva seccion">
    </form>

