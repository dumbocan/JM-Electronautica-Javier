<h2>Proyectos en espera</h2>

    <?php    while ($pro = $searchS->fetch_object()) :?>
         <?php   $array = $pro->project_date.' /  '.$pro->project_number.' '.$pro->boat_name;?>
        

    <div class="nameboat">
    <h4><?=$pro -> project_date . " -  " . $pro -> project_number . "  - " . $pro -> boat_name; ?></h4>
    <div class="">
        <form action="<?=base_url; ?>worksheet/prepare_worksheet" method="POST">    
            <input class="buttons" type="submit" name="<?=$value; ?>" value="Hojas de trabajo">
            <input type="hidden" name="<?=$value; ?>" value="<?=$value; ?>" >
        </form>
        <form action="<?=base_url; ?>project/update_project" method="POST">
            <input class="buttons" type="submit" name="<?=$value; ?>" value="Editar proyecto">
            <input type="hidden" name="<?=$value; ?>" value="<?=$value; ?>" >
        </form>
        <form action="<?=base_url; ?>project/ask_delete" method="POST">
            <input class="buttons" type="submit" value="Borrar proyecto">
            <input type="hidden" name="name" value="<?=$value; ?>" >
        </form>    
    </div>
    </div>
<?php endwhile ?>

<h2>Proyectos empezados</h2>
<?php foreach ($searchS as $key => $value): ?>
    <div class="nameboat">
    <h4><?=$value; ?></h4>
    <div class="">      
        <form action="<?=base_url; ?>worksheet/prepare_worksheet" method="POST">
            <input class="buttons" type="submit" name="<?=$value; ?>" value="Hojas de trabajo" >
            <input type="hidden" name="<?=$value; ?>" value="<?=$value; ?>" >    
        </form>       
        <form action="<?=base_url; ?>project/update_project" method="POST">
            <input class="buttons" type="submit" name="<?=$value; ?>" value="Editar proyecto">
            <input type="hidden" name="<?=$value; ?>" value="<?=$value; ?>" >
        </form>
        <form action="<?=base_url; ?>project/delete_project" method="POST">
            <input class="buttons" type="submit" name="<?=$value; ?>" value="Borrar proyecto">
            <input type="hidden" name="<?=$value; ?>" value="<?=$value; ?>"    >
        </form>
    </div>
    </div>
<?php endforeach; ?>
    
    <br>
    <br>
<form action="<?=base_url; ?>worksheet/search_project" method="POST">
    <input  type="hidden" name="f" id="f" >
   
    <input class="buttons" type="submit" value="Proyectos terminados"/>
</form>