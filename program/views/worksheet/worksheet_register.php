<!-- pagina principal de proyectos, añadir, ver, y acabar-->


<?php if ($search_worksheet):?>
<!-- Si $search_worksheet da null no imprime lista dehojas de trabajo realizadas-->
<h1>Trabajos realizados en proyecto <?= $project_data->project_number; ?> <?=$project_data->boat_name; ?></h1>

<!--Con $total hours, hago la suma de las horas del proyecto mediante una funcion en SQL -->
<?php $total_hours =  $worksheet -> total_hours(); ?>  
<?php while ($data = $search_worksheet -> fetch_object()):?>
           
      
    
      	<div class="nameboat">
        	<label for="project"> <?= $data -> worksheet_id .' '.$data->worksheet_date.' '.$data->worksheet_desc.' '.$data->start_time.' '.$data->finish_time.' '.$data->efective_time;?></label>
        	<!--botones de accion sobre los proyectos -->
          <?php if ($project_data->project_state != 'f'):?>

          	<form action="<?=base_url; ?>worksheet/show_worksheet" method="POST">
        		  <input class="buttons" type="submit"  value="Editar" >
        		  <input  type="hidden" value="<?=$data -> worksheet_id ?>" name="worksheet_id">
        	  </form>
            <form action="<?=base_url; ?>detail/add_detail" method="POST">
        		  <input class="buttons" type="submit" value="Insertar Material" >
        		  <input  type="hidden" value="<?= $data -> worksheet_id?>" name="worksheet_id">
        	  </form>
        	  <form action="<?=base_url; ?>worksheet/ask_delete" method="POST">
        		  <input class="buttons" type="submit" value="borrar hoja de trabajo">
        		  <input type="hidden"  value="<?= $data -> worksheet_id?>" name="worksheet_id">
				      <input type="hidden"  value="<?= $data -> worksheet_date?>" name="worksheet_date">
              <input type="hidden"  value="<?= $data -> project_id?>" name="project_id">

            </form> 
            <br>
            <br>
             
          <?php  endif; ?>
 
      	</div>  
<?php  endwhile ;endif; ?>
<!-- Imprime el total de horas trabajadas-->

<h3>Total horas: <?=($total_hours->total);?></h3>
<br>
<br>
<?php if ($project_data->project_state != 'f'):?>

  <h1>Trabajo realizado en <?=$project_data->boat_name; ?></h1>
  <form action="<?=base_url; ?>worksheet/save_worksheet" method="POST">
 
    <br>
    <!--(condition ? action_if_true: action_if_false;) -->
    <?php ($project_data->project_state == 's' ? $value = 'checked' : $value = ' '); ?>
    <input type="radio" name="project_state" value="s" <?=$value; ?> /> Empezado
    <?php ($project_data->project_state == 'f' ? $value = 'checked' : $value = ' '); ?>
    <input type="radio" name="project_state" value="f" <?=$value; ?>/> Terminado
    <?php ($project_data->project_state == 'w' ? $value = 'checked' : $value = ' '); ?>
    <input type="radio" name="project_state" value="w" <?=$value; ?>/> En espera
    <br>
    <label for="worksheet_id">Numero de proyecto <?= $project_data->project_number; ?></label>
    <input type="hidden" name="project_id" value="<?= $project_data->project_id; ?>">
    <br>
    <label for="worksheet_date">Fecha</label>
    <input type="date" name="worksheet_date" >
    <br>
    <label for="worksheet_desc">Trabajo realizado</label>
    <textarea type="text" name="worksheet_desc" ></textarea>
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
    
    <br>
    <input type="submit" value="Enviar"/> 
  </form>
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