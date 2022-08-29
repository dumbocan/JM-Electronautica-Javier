<br>
<br>
<table>
    <tr>
        <th>
            <h2>Proyectos en espera</h2>
        </th>
    </tr>
</table>
<table>
    <tr>
        <th style="width: 100px;">Fecha</th>
        <th style="width: 120px;">N proyecto</th>
        <th style="width: 130px;">Embarcacion</th>
        <th style="width: 577px;">Trabajos a realizar</th>
        <th style="width: 70px;"> </th>
    </tr>
    <?php while ($pro = $searchW->fetch_object()) :?>
    <tr>
            <td><?=$pro -> project_date?></td>
            <td><?=$pro -> project_number ?></td>
            <td><?=$pro -> boat_name ?></td>
            <td><?=$pro -> project_desc ?> </td>
            <td class="icons">
                <form action="<?=base_url; ?>worksheet/prepare_worksheet" method="POST">    
                    <button class="submit">
                        <abbr title="Añadir hoja de trabajo"><i class="fa fa-plus-circle"></i> </abbr>
                    </button>    
                    <input type="hidden" name="project_id" value="<?=$pro -> project_id; ?>" >
                </form>
                <form action="<?=base_url; ?>project/update_project" method="POST">
                    <button class="submit">
                        <abbr title="Actualizar proyecto"> <i class="fa fa-pencil"></i></button></abbr>    
                    <input type="hidden" name="project_id" value="<?=$pro -> project_id; ?>">
                </form>
                <form action="<?=base_url; ?>project/ask_delete" method="POST">
                    <button class="submit">
                        <abbr title="Borrar proyecto"><i class="fa fa-trash"></i></abbr>
                    </i></button>    
                    <input type="hidden" name="boat_name" value="<?=$pro -> boat_name; ?>" >
                    <input type="hidden" name="project_id" value="<?=$pro -> project_id; ?>" >
                </form>    
            </td>
        </tr>
    <?php endwhile ?>
</table>

<table>
    <tr>
        <th>
            <h2>Proyectos empezados</h2>
        </th>
    </tr>
</table>
<table>
    <tr>
        <th style="width: 100px;">Fecha</th>
        <th style="width: 120px;">N proyecto</th>
        <th style="width: 130px;">Embarcacion</th>
        <th style="width: 577px;">Trabajos a realizar</th>
        <th style="width: 70px;"> </th>
    </tr>
    <?php while ($pro = $searchS->fetch_object()) :?>
        <tr>
            <td><?=$pro -> project_date?></td>
            <td><?=$pro -> project_number ?></td>
            <td><?=$pro -> boat_name ?></td>
            <td><?=$pro -> project_desc ?> </td>
            <td class="icons">
                <form action="<?=base_url; ?>worksheet/prepare_worksheet" method="POST">
                    <button class="submit">
                        <abbr title="Añadir hoja de trabajo"><i class="fa fa-plus-circle"></i> </abbr>
                    </button>    
                    <input type="hidden" name="project_id" value="<?=$pro -> project_id; ?>" >    
                </form>       
                <form action="<?=base_url; ?>project/update_project" method="POST">
                    <button class="submit">
                        <abbr title="Actualizar proyecto"> <i class="fa fa-pencil"></i></button></abbr>    
                    </button>    
                    <input type="hidden" name="project_id" value="<?=$pro -> project_id; ?>">
                </form>
                <form action="<?=base_url; ?>project/ask_delete" method="POST">
                    <button class="submit">
                        <abbr title="Borrar proyecto"><i class="fa fa-trash"></i></abbr>
                    </button>    
                    <input type="hidden" name="boat_name" value="<?=$pro -> boat_name; ?>"  >
                    <input type="hidden" name="project_id" value="<?=$pro -> project_id; ?>" >
                </form>
            </td> 
        </tr>
    <?php endwhile; ?>
   
</table>
    <br>
    <br>
<form action="<?=base_url; ?>worksheet/search_project" method="POST">
    <input  type="hidden" name="f" id="f" >
   
    <input class="buttons" type="submit" value="Proyectos terminados"/>
</form>