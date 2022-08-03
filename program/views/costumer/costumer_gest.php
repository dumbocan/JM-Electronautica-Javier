<html>
<h1>gestion</h1>
<?php while ($pro = $search->fetch_object()): ?>
<?php $data = $pro->costumer_name; ?>
<?php $name = $costumer->costumer_name($data); ?>

   
   
   
    <div class="costumer_gest">
            <tr>
                <!--<td class="id"><?= $name->costumer_id; ?></td>-->
                <td class="id"><?= $name->costumer_name; ?></td>
                <!--<td class="id"><?= $name->address; ?></td>-->
                <!--<td class="id"><?= $name->passport; ?></td>-->
                <!--<td class="id"><?= $name->country; ?></td>-->
                <td class="id"><?= $name->telephone; ?></td>
                <!--<td class="id"><?= $name->email; ?></td>-->
                <td class="id"><?= $name->boat_name; ?></td>
                <td class="id"><?= $name->marina; ?></td>
                <td class="id"><?= $name->type; ?></td>
                <td class="id"><?= $name->boat_id; ?></td>
                
                <form method="POST" action="<?=base_url; ?>costumer/edit">
                <td class="editar">
                    <input type="hidden" value="<?= $name->costumer_name; ?>" name="costumer_name" id="costumer_name">  
                    <input class="button-small-green" type="submit" value="Editar"></td>
            </form>
            
            <form method="POST" action="<?= base_url; ?>costumer/ask_delete">
                <td class="eliminar">
                    <input type="hidden" value="<?= $name->costumer_name; ?>" name="costumer_name" id="costumer_name">
                    <input class="button-small-red" type="submit" value="Eliminar"></td>
                    
            </form>

            <form method="POST" action="<?= base_url; ?>project/description">
                <td class="proyecto">
                    <input type="hidden" value="<?= $name->costumer_id; ?>" name="costumer_id" id="costumer_id">
                    <!--se envia (costumer id) para anadir un proyecto en project/description--> 
                    <input class="button-small-red" type="submit" value="Añadir proyecto"></td>
                    
            </form>

            </tr>

    </div>
<?php endwhile; ?>
