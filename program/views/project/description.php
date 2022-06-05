 <!--
 project_id          int
 project number      YY-MM-XXX
 project date        date
 project desciption  varchar
 project state       boolean
 project comments    long varchar
 pictures            varchar
 files               varchar
 boat_id             int

 -->

<?php if (isset($_SESSION['register']) && $_SESSION['register'] == 'complete'):?>
<strong id="ok">Registro completado correctamente</strong>
<?php elseif (isset($_SESSION['register']) && $_SESSION['register'] == 'failed'):?>
<strong id="fallo">Registro fallido, introduce bien los datos</strong>
<?php endif; ?>
<br/>

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

    <br>
    <br>
    <input type="submit" value="Enviar"/>
    <br>
   
    
</form>
 
