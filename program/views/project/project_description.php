


<h1>Trabajos a realizar en <?=$data->boat_name; ?></h1>
<form action="<?=base_url; ?>project/save" method="POST">

    
    <label for="project_number">Numero de proyecto <?= $number->number; ?></label>
    <input type="hidden" name="project_number" value="<?= $number->number; ?>">
    <br>
    <label for="project_date">Fecha</label>
    <input type="date" name="project_date" >
    <br>
    <label for="project_description">Trabajo a realizar</label>
    <input type="text" name="project_description" >
    <br>
    <input type="radio" name="project_state" value="s" /> Empezado
    <input type="radio" name="project_state" value="f" /> Terminado
    <input type="radio" name="project_state" value="w" /> En espera
    <br>
    <label for="project_comments">Observaciones</label>
    <input type="text" name="project_comments" >
    <br>
    <label for="pictures">Fotos</label>
    <input type="file" name="pictures" >
    <br>
    <label for="files">Archivos</label>
    <input type="file" name="files" >
    <input type="hidden" name="boat_id" value="<?=$data->boat_id?>">
<?php var_dump($data);?>
    <br>
    <br>
    <input type="submit" value="Enviar"/>
    <br>
   <!-- envia a project/save  project_number
                                project_date 
                                project_description
                                project_state
                                project_comments
                                pictures
                                files
                              boat_id
    
</form>
 
