<?php if ($search_worksheet == !null):?>

    <h1>Trabajos realizados en proyecto <?= $search->project_number; ?> <?=$search->boat_name; ?></h1>
    <!-- recorre la variable $search_worksheet que es un array y imprime cada array -->
    <?php  foreach ($search_worksheet as $key => $value): ?>
      	<div class="nameboat">
        	<label for="project"> <?=$value; ?></label>
        	<!-- con explode convierto el string $value a array y asi puedo sacar los datos por separado -->
        	<?php $array=(explode(" ",$value));?>
        	<!--botones de accion sobre los proyectos -->
          	<form action="<?=base_url; ?>worksheet/show_worksheet" method="POST">
        		<!--con la variable $array puedo elegir que dato quiero del string y selecciono $array[0] que es worksheet_id -->
        		<input class="buttons" type="submit"  value="Editar" >
        		<input  type="hidden" value="<?=$array[0]; ?>" name="id">
        	</form>
            <form action="<?=base_url; ?>detail/detail" method="POST">
        		<!--con la variable $array puedo elegir que dato quiero del string y selecciono $array[0] que es worksheet_id -->
        		<input class="buttons" type="submit" value="Insertar Material" >
        		<input  type="hidden" value="<?=$array[0]; ?>" name="id">
        	</form>
        	<form action="<?=base_url; ?>worksheet/ask_delete" method="POST">
        		<input class="buttons" type="submit" value="borrar hoja de trabajo">
        		<input type="hidden"  value="<?=$array[0]; ?>" name="id" >
				<input type="hidden"  value="<?=$array[1]; ?>" name="date" >
    		</form>  
      	</div>  
<?php endforeach; endif; ?>

<br>
<br>
<?php if ($search->project_state != 'f'):?>
<h1>Trabajo realizado en <?=$search->boat_name; ?></h1>
<form action="<?=base_url; ?>worksheet/save_worksheet" method="POST">

    
    <br>
    <!--(condition ? action_if_true: action_if_false;) -->
    <?php ($search->project_state == 's' ? $value = 'checked' : $value = ' '); ?>
    <input type="radio" name="project_state" value="s" <?=$value; ?> /> Empezado
    <?php ($search->project_state == 'f' ? $value = 'checked' : $value = ' '); ?>
    <input type="radio" name="project_state" value="f" <?=$value; ?>/> Terminado
    <?php ($search->project_state == 'w' ? $value = 'checked' : $value = ' '); ?>
    <input type="radio" name="project_state" value="w" <?=$value; ?>/> En espera
    <br>
    <label for="worksheet_id">Numero de proyecto <?= $search->project_number; ?></label>
    <input type="hidden" name="project_id" value="<?= $search->project_id; ?>">
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

<form action="<?=base_url; ?>worksheet/finish_project" method="POST">
    <input type="hidden" name="project_state" value="f" >
    <input type="hidden" name="project_id" value="<?=$search->project_id; ?>" >
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