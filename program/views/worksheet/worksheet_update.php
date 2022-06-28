
<form action="<?=base_url; ?>worksheet/update_worksheet" method="POST">

    
    
    <br>
    <label for="worksheet_date">Fecha</label>
    <input type="date" name="worksheet_date" value="<?=$search_worksheet_object->worksheet_date?>" >
    <br>
    <label for="worksheet_desc">Trabajo realizado</label>
    <textarea type="text" name="worksheet_desc"> <?=$search_worksheet_object->worksheet_desc?></textarea>
    <br>
    <label for="start_time">Hora de entrada</label>
    <input type="time" name="start_time" list="listahorasdeseadas" value="<?=$search_worksheet_object->start_time?>">
    <br>
    <label for="finish_time">hora de salida</label>
    <input type="time" name="finish_time" list="listahorasdeseadas" value="<?=$search_worksheet_object->finish_time?>">
    <br>
    <label for="efective_time">Tiempo efectivo</label>
    <input type="text" name="efective_time" value="<?=$search_worksheet_object->efective_time?>">
    <input type="hidden" name="project_id" value="<?=$search_worksheet_object->project_id?>">
    <br>
   
    
    
  
    
    <br>
    <br>
    <input type="hidden" name="worksheet_id" value="<?=$search_worksheet_object->worksheet_id?>"/> 
    <input type="submit" value="Actualizar"/> 
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