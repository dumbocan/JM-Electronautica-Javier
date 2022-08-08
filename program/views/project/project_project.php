<h2>Proyectos en espera</h2>

    <?php    while ($pro = $searchW->fetch_object()) :?>
     
    <div class="nameboat">
    <h4><?=$pro -> project_date . " -  " . $pro -> project_number . "  - " . $pro -> boat_name; ?></h4>
    <div class="">
        <form action="<?=base_url; ?>worksheet/prepare_worksheet" method="POST">    
            <input class="buttons" type="submit"  value="Hojas de trabajo">
            <input type="hidden" name="project_id" value="<?=$pro -> project_id; ?>" >
        </form>
        <form action="<?=base_url; ?>project/update_project" method="POST">
            <input class="buttons" type="submit"  value="Editar proyecto">
            <input type="hidden" name="project_id" value="<?=$pro -> project_id; ?>">
        </form>
        <form action="<?=base_url; ?>project/ask_delete" method="POST">
            <input class="buttons" type="submit" value="Borrar proyecto">
            <input type="hidden" name="boat_name" value="<?=$pro -> boat_name; ?>" >
            <input type="hidden" name="project_id" value="<?=$pro -> project_id; ?>" >

        </form>    
    </div>
    </div>
<?php endwhile ?>

<h2>Proyectos empezados</h2>
<?php    while ($pro = $searchS->fetch_object()) :?>
        <div class="nameboat">
        <h4><?=$pro -> project_date . " -  " . $pro -> project_number . "  - " . $pro -> boat_name; ?></h4>
    <div class="">      
        <form action="<?=base_url; ?>worksheet/prepare_worksheet" method="POST">
            <input class="buttons" type="submit" value="Hojas de trabajo" >
            <input type="hidden" name="project_id" value="<?=$pro -> project_id; ?>" >    
        </form>       
        <form action="<?=base_url; ?>project/update_project" method="POST">
            <input class="buttons" type="submit" value="Editar proyecto">
            <input type="hidden" name="project_id" value="<?=$pro -> project_id; ?>">
        </form>
        <form action="<?=base_url; ?>project/ask_delete" method="POST">
            <input class="buttons" type="submit" value="Borrar proyecto">
            <input type="hidden" name="boat_name" value="<?=$pro -> boat_name; ?>"  >
            <input type="hidden" name="project_id" value="<?=$pro -> project_id; ?>" >

        </form>
    </div>
    </div>
<?php endwhile; ?>
    
    <br>
    <br>
<form action="<?=base_url; ?>worksheet/search_project" method="POST">
    <input  type="hidden" name="f" id="f" >
   
    <input class="buttons" type="submit" value="Proyectos terminados"/>
</form>