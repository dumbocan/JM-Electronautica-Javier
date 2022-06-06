<h1>Trabajos realizados en proyecto <?= $search->project_number;?> <?=$search->boat_name; ?></h1>

<?php foreach($search_worksheet as $key => $value): ?>
 
  <label for="project">proyecto <?=$value;?></label>

  <form action="<?=base_url; ?>worksheet/prepare_worksheet" method="POST">
    <input type="submit" name="<?=$value ?>" value="Cambiar" >
  </form>
<?php endforeach; ?>

<br>
<br>
<h1>Trabajo realizado en <?=$search->boat_name; ?></h1>
<form action="<?=base_url; ?>worksheet/save_worksheet" method="POST">

    <?=$search->project_state; ?>
    <br>
    <!--(condition ? action_if_true: action_if_false;) -->
    <?php ($search->project_state == "s" ? $value = "checked" : $value = " "); ?>
    <input type="radio" name="project_state" value="s" <?=$value; ?> /> Empezado
    <?php ($search->project_state == "f" ? $value = "checked" : $value = " "); ?>
    <input type="radio" name="project_state" value="f" <?=$value; ?>/> Terminado
    <?php ($search->project_state == "w" ? $value = "checked" : $value = " "); ?>
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
    <br>
       
</form>
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