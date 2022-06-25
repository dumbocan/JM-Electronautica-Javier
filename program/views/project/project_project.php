<h2>Proyectos en espera</h2>
<?php foreach ($searchW as $key => $value):?>
    <div class="nameboat">
    <h4><?=$value; ?></h4>
    <div class="">
        <form action="<?=base_url; ?>worksheet/prepare_worksheet" method="POST">    
            <input class="buttons" type="submit" name="<?=$value; ?>" value="Añadir hoja de trabajo">
            <input type="hidden" name="<?=$value; ?>" value="<?=$value; ?>" >
        </form>
        <form action="<?=base_url; ?>project/update_project" method="POST">
            <input class="buttons" type="submit" name="<?=$value; ?>" value="editar proyecto">
            <input type="hidden" name="<?=$value; ?>" value="<?=$value; ?>" >
        </form>
        <form action="<?=base_url; ?>project/ask_delete" method="POST">
            <input class="buttons" type="submit" value="borrar proyecto">
            <input type="hidden" name="name" value="<?=$value; ?>" >
        </form>    
    </div>
    </div>
<?php endforeach; ?>

<h2>Proyectos empezados</h2>
<?php foreach ($searchS as $key => $value): ?>
    <div class="nameboat">
    <h4><?=$value; ?></h4>
    <div class="">      
        <form action="<?=base_url; ?>worksheet/prepare_worksheet" method="POST">
            <input class="buttons" type="submit" name="<?=$value; ?>" value="Añadir hoja de trabajo" >
            <input type="hidden" name="<?=$value; ?>" value="<?=$value; ?>" >    
        </form>       
        <form action="<?=base_url; ?>project/update_project" method="POST">
            <input class="buttons" type="submit" name="<?=$value; ?>" value="editar proyecto">
            <input type="hidden" name="<?=$value; ?>" value="<?=$value; ?>" >
        </form>
        <form action="<?=base_url; ?>project/delete_project" method="POST">
            <input class="buttons" type="submit" name="<?=$value; ?>" value="borrar proyecto">
            <input type="hidden" name="<?=$value; ?>" value="<?=$value; ?>"    >
        </form>
    </div>
    </div>
<?php endforeach; ?>

<form action="<?=base_url; ?>worksheet/search_project" method="POST">
    <input  type="hidden" name="f" id="f" >
    <br>
    <input class="buttons" type="submit" value="Proyectos terminados"/>
</form>