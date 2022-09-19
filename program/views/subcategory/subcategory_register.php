<h2>Subcategorias de <?=$category_name; ?></h2>
<?php ?>
    <table>
        <tr class="header_small">
            <th  style="width: 550px;">Nombre</th>
            <th  style="width: 90px;">Stock</th>
            <th  style="width: 110px;">Precio</th>
            <th  style="width: 200px;">Numero de serie</th>
            <th  style="width: 50px;"></th>
            
        </tr>
        
        <?php  while ($key = $subcategory -> fetch_object()):  //recorremos el objetos y obtenemos el valor de las propiedades?>
        <tr>
        
            <td><?php echo $subcategory_name = $key->subcategory_name; ?></td>
            <td><?php echo $subcategory_stock = $key->subcategory_stock; ?></td>
            <td><?php echo $subcategory_price = $key->subcategory_price; ?></td>
            <td><?php echo $serial_number = $key->serial_number; ?></td>
                <?php $subcategory_id = $key->subcategory_id; ?>
                <?php $category_id = $key->category_id; ?>
            <td class="icons" >
                <form action="<?=base_url; ?>subcategory/edit_subcategory" method="POST">
                    <input type="hidden" id="subcategory_id"  name="subcategory_id" value="<?=$subcategory_id; ?>">
                    <input type="hidden" id="subcategory_name"  name="subcategory_name" value="<?=$subcategory_name; ?>">
                    <input type="hidden" id="category_name"  name="category_name" value="<?=$category_name; ?>">
                    <input type="hidden" id="add" name="add" value="<?=$add?>">

                    <input type="hidden" id="category_id" name="category_id" value="<?=$cat->getcategory_id(); ?>">
                    <button class="submit">
                        <abbr title="Actualizar articulo"> <i class="fa fa-pencil"></i></button></abbr>    
                    </button>   
                </form>    
            
                <form action="<?=base_url; ?>subcategory/ask_delete" method="POST">
                    <input type="hidden" id="subcategory_id"  name="subcategory_id" value="<?=$subcategory_id; ?>">
                    <input type="hidden" id="subcategory_name"  name="subcategory_name" value="<?=$subcategory_name; ?>">
                    <input type="hidden" id="category_name"  name="category_name" value="<?=$category_name; ?>">
                    <input type="hidden" id="category_id" name="category_id" value="<?=$cat->getcategory_id(); ?>">
                    <button class="submit">
                        <abbr title="Borrar articulo"><i class="fa fa-trash"></i></abbr>
                    </button> 
                </form>
                 
            </td>   
           
        </tr>
        <?php endwhile; ?>
    </table>  

    <form action="<?=base_url; ?>subcategory/index" method="POST">
        <input type="hidden" id="category_name" name="category_name" value="<?=$category_name; ?>">
        <input type="hidden" id="category_id" name="category_id" value="<?=$cat->getcategory_id(); ?>">
        <input type="hidden" id="add" name="add" value="1">

        <input type="submit" id="new_subcategory" name="new_subcategory" value="Nueva subcategoria">
    </form>
   
<?php if($add == 1):?>
    <h3>Nuevo articulo en  <?=$category_name; ?></h3>

<form action="<?=base_url; ?>subcategory/save_subcategory" method="POST">
    <tag>Introduce nuevo articulo para <?=$category_name; ?></tag>
    <table>
        <tr>
            <th>Nombre</th>
            <th>Stock</th>
            <th>Precio</th>
            <th>Numero de serie</th>
        </tr>
        <tr>
            <td><input type="text" name="subcategory_name" id="subcategory_name"></td>
            <td><input type="text" name="subcategory_stock" id="subcategory_stock"></td>
            <td><input type="text" name="subcategory_price" id="subcategory_price" ></td>
            <td><input type="text" name="serial_number" id="serial_number"></td>
        </tr>
    </table>
    <input type="hidden" name="category_id" id="category_id" value="<?= $cat->getcategory_id(); ?>">
    <input type="hidden" name="category_name" id="category_name" value="<?= $category_name; ?>">
    <input type="submit" >

</form>
<?php endif?>