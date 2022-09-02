<!-- pagina principal de proyectos, añadir, ver, y acabar-->


<?php if ($search_worksheet):?>
<!-- Si $search_worksheet da null no imprime lista dehojas de trabajo realizadas-->
<h1>Trabajos realizados en proyecto <?= $project_data->project_number; ?> <?=$project_data->boat_name; ?></h1>
 <table>
        <tr class="header_small">
            <th style="width: 50px;">ID</th>
            <th style="width: 160px;">Fecha</th>
            <th style="width: 1160px;">Descripcion</th>
            <th style="width: 120px;">Hora de entrada</th>
            <th style="width: 120px;">Hora de salida</th>
            <th style="width: 75px;">Tiempo efectivo</th>
            <th style="width: 70px;"></th>
            

        </tr>
    <!--Con $total hours, hago la suma de las horas del proyecto mediante una funcion en SQL -->
    <?php $total_hours =  $worksheet -> total_hours(); ?>  
    <?php while ($data = $search_worksheet -> fetch_object()):?>
         <tr>
        	<td>  <?= $data -> worksheet_id ?> </td>
            <td>  <?= $data -> worksheet_date ?> </td>     
            <td>  <?= $data -> worksheet_desc ?> </td>
            <td>  <?= $data -> start_time ?> </td>
            <td>  <?= $data -> finish_time ?> </td>
            <td>  <?= $data -> efective_time ?> </td>
            <!--botones de accion sobre los proyectos -->
            <?php if ($project_data->project_state != 'f'):?>
            <td class="icons" >
                <form action="<?=base_url; ?>detail/add_detail" method="POST">
                    <button class="submit">
                        <abbr title="Añadir material"><i class="fa fa-plus-circle"></i> </abbr>
                    </button>    
                    <input  type="hidden" value="<?= $data -> worksheet_id?>" name="worksheet_id">
    	        </form>
                <form action="<?=base_url; ?>worksheet/show_worksheet" method="POST">
                    <button class="submit">
                        <abbr title="Actualizar hoja de trabajo"> <i class="fa fa-pencil"></i></button></abbr>    
                    </button>    
                    <input  type="hidden" value="<?=$data -> worksheet_id ?>" name="worksheet_id">
        	    </form>    
        	    <form action="<?=base_url; ?>worksheet/ask_delete" method="POST">
        	        <button class="submit">
                        <abbr title="Borrar hoja de trabajo"><i class="fa fa-trash"></i></abbr>
                    </button>    
    		        <input type="hidden"  value="<?= $data -> worksheet_id?>" name="worksheet_id">
			        <input type="hidden"  value="<?= $data -> worksheet_date?>" name="worksheet_date">
                    <input type="hidden"  value="<?= $data -> project_id?>" name="project_id">
                </form>
            </td> 
            <?php  endif; ?>
        </tr> 
        
<?php  endwhile ;endif; ?>
<?php if ($project_data -> project_state != 'f'):?>
<?php $project_data -> project_state = 's';?>
<form action="<?=base_url; ?>worksheet/save_worksheet" method="POST">   
            <td>
            </td>
            <td>
                <input type="date" name="worksheet_date" >
            </td>
            <td>
                <input type="text"   name="worksheet_desc" style="width: 100%;" >
            </td>
            <td>
                <input type="time" name="start_time" list="listahorasdeseadas">
            </td>
            <td>
                <input type="time" name="finish_time" list="listahorasdeseadas">
            </td>
            <td>
                <input type="text" name="efective_time" value="" style="width: 100%;">
            </td>
            <td>
                <input type="hidden" value="<?=$project_data->project_state?>" name="project_state">  
                <input type="hidden"  value="<?= $project_data -> project_id?>" name="project_id">
                <input type="submit" value="Enviar"/> 
            </td>
        </tr>
        </form>
<!-- Imprime el total de horas trabajadas-->
</table>
<h3>Total horas: <?=($total_hours->total);?></h3>
<br>
<table>
    <tr>
        <th>Material utilizado</th>
    </tr>
</table>
<table>
    <tr class="header_small">
        <th style="width: 90px;">Fecha</th>
        <th style="width: 650px;">Material</th> 
        <th style="width: 70px;">Cantidad</th>
        <th style="width: 80px;">Precio</th>        
        <th style="width: 60px;">Descuento</th> 
        <th style="width: 90px;">Total</th>
    </tr>
    <tr>
    <?php while ($data = $search_worksheet -> fetch_object()):?>

        <td>
            1
        </td>
        <td>
            2 
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
        <?php  endwhile; ?>
    </tr>
</table>
<br>
<br>
<!--

  <h1>Trabajo realizado en <?=$project_data->boat_name; ?></h1>
  
 
  
    <label for="worksheet_id">Numero de proyecto <?= $project_data->project_number; ?></label>
    <input type="hidden" name="project_id" value="<?= $project_data->project_id; ?>">
    <br>
    <br>
    (condition ? action_if_true: action_if_false;) 
    <?php ($project_data->project_state == 's' ? $value = 'checked' : $value = ' '); ?>
    <input type="radio" name="project_state" value="s" <?=$value; ?> /> Empezado
    <?php ($project_data->project_state == 'f' ? $value = 'checked' : $value = ' '); ?>
    <input type="radio" name="project_state" value="f" <?=$value; ?>/> Terminado 
    <?php ($project_data->project_state == 'w' ? $value = 'checked' : $value = ' '); ?>
    <input type="radio" name="project_state" value="w" <?=$value; ?>/> En espera
    
    <br>
    <label for="worksheet_date">Fecha</label>
    <input type="date" name="worksheet_date" >
    <br>
    <br>
    <label for="worksheet_desc">Trabajo realizado</label>
    <textarea type="text" rows="4" cols="50" name="worksheet_desc" ></textarea>
    <br>
    <label for="start_time">Hora de entrada</label>
    <input type="time" name="start_time" list="listahorasdeseadas">
    <br>
    <label for="finish_time">hora de salida</label>
    <input type="time" name="finish_time" list="listahorasdeseadas">
    <br>
    <label for="efective_time">Tiempo efectivo</label>
    <input type="text" name="efective_time" value="">
    <br>
    <br>
    
    <br>-->
   
  <!--boton para terminar un projecto -->
  <form action="<?=base_url; ?>worksheet/finish_project" method="POST">
    <input type="hidden" name="project_state" value="f" >
    <input type="hidden" name="project_id" value="<?=$project_data -> project_id; ?>" >
    <input type="submit" value="Terminar proyecto"/> 
  </form>

  <br>
<?php  endif; ?>
  

<datalist id="listahorasdeseadas">
  <option value="07:00"><option value="07:30">
  <option value="08:00"><option value="08:30">
  <option value="09:00"><option value="09:30">
  <option value="10:00"><option value="10:30">
  <option value="11:00"><option value="11:30">
  <option value="12:00"><option value="12:30">
  <option value="13:00"><option value="13:30">
  <option value="14:00"><option value="14:30">
  <option value="15:00"><option value="15:30">
  <option value="16:00"><option value="16:30">
  <option value="17:00"><option value="17:30">
  <option value="18:00"><option value="18:30">
  <option value="19:00"><option value="19:30">
  <option value="20:00"><option value="20:30">
  <option value="21:00"><option value="21:30">
  <option value="22:00"><option value="22:30">
</datalist>