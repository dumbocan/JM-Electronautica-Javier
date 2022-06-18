

<h1>Trabajos a realizar en <?=$data->boat_name; ?></h1>
<form action="<?=base_url; ?>project/update" method="POST">

    
    <label for="project_number">Numero de proyecto <?= $data->project_number; ?></label>
    <input type="hidden" name="project_number" value="<?= $data->project_number; ?>">
    <br>
    <label for="project_date">Fecha</label>
    <input type="date" name="project_date" value="<?=$data->project_date; ?>" >
    <br>
    <label for="project_desc">Trabajo a realizar</label>
    <input type="text" name="project_desc" value="<?=$data->project_desc; ?>">
    <br>
    <?php ($data->project_state == 's' ? $value = 'checked' : $value = ' '); ?>
    <input type="radio" name="project_state" value="s" <?=$value; ?> /> Empezado
    <?php ($data->project_state == 'f' ? $value = 'checked' : $value = ' '); ?>
    <input type="radio" name="project_state" value="f" <?=$value; ?>/> Terminado
    <?php ($data->project_state == 'w' ? $value = 'checked' : $value = ' '); ?>
    <input type="radio" name="project_state" value="w" <?=$value; ?>/> En espera
    <br>
    <label for="project_comments">Observaciones</label>
    <input type="text" name="project_comments" value="<?=$data->project_comments; ?>">
    <br>
    <label for="pictures">Fotos</label>
    <input type="file" name="pictures" value="<?=$data->pictures; ?>">
    <br>
    <label for="files">Archivos</label>
    <input type="file" name="files" value="<?=$data->files; ?>">
    <input type="hidden" name="project_id" value="<?=$data->project_id; ?>">
    <input type="hidden" name="boat_id" value="<?=$data->boat_id; ?>">
    <br>
    <br>
    <input type="submit" value="Enviar"/>
    <br>
   
    
</form>
