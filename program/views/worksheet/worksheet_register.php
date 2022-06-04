<h1>Trabajo realizado en <?=$data->boat_name; ?></h1>
<form action="<?=base_url; ?>worksheet/save" method="POST">

    
    <label for="worksheet_id">Numero de proyecto <?= $number->number; ?></label>
    <input type="hidden" name="worksheet_id" value="<?= $number->number; ?>">
    <br>
    <label for="worksheet_date">Fecha</label>
    <input type="date" name="worksheet_date" >
    <br>
    <label for="worksheet_desc">Trabajo realizado</label>
    <input type="text" name="worksheet_desc" >
    <br>
    <label for="start_time">Hora de entrada</label>
    <input type="time" name="start_time" >
    <br>
    <label for="finish_time">hora de salida</label>
    <input type="time" name="finish_time" >
    <br>
    <label for="efective_time">Tiempo efectivo</label>
    <input type="text" name="efective_time" >
    <br>
    
    
    
  
    
    <br>
    <br>
    <input type="submit" value="Enviar"/>
    <br>
    
    
</form>