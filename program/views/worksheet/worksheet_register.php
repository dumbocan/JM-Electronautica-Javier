<!-- pagina principal de proyectos, añadir, ver, y acabar-->


<?php  if (isset($search_worksheet) && $search_worksheet):?>
<!-- Si $search_worksheet da null no imprime lista dehojas de trabajo realizadas-->
<h1>Trabajos realizados en proyecto <?= $project_data->project_number; ?> <?=$project_data->boat_name; ?></h1>
 <table>
        <tr class="header_small">
          
            <th style="width: 160px;">Fecha</th>
            <th style="width: 1160px;">Descripcion</th>
            <th style="width: 120px;">Hora de entrada</th>
            <th style="width: 120px;">Hora de salida</th>
            <th style="width: 75px;">Tiempo efectivo</th>
            <th style="width: 70px;"></th>
            

        </tr>
    <!--Con $total hours, hago la suma de las horas del proyecto mediante una funcion en SQL -->
    <?php $total_hours = $worksheet->total_hours(); ?>  
    <?php while ($data = $search_worksheet->fetch_object()):?>
         <tr>
       <!-- 	<td>  <?= $data->worksheet_id; ?> </td>  -->
            <td>  <?= $data->worksheet_date; ?> </td>     
            <td>  <?= $data->worksheet_desc; ?> </td>
            <td>  <?= $data->start_time; ?> </td>
            <td>  <?= $data->finish_time; ?> </td>
            <td>  <?= $data->efective_time; ?> </td>
            <!--botones de accion sobre los proyectos -->
            <?php if ($project_data->project_state != 'f'):?>
            <td class="icons" >
                <form action="<?=base_url; ?>detail/add_detail" method="POST">
                    <button class="submit">
                        <abbr title="Añadir material"><i class="fa fa-plus-circle"></i> </abbr>
                    </button>    
                    <input  type="hidden" value="<?= $data->worksheet_id; ?>" name="worksheet_id">
                    <input  type="hidden" value="<?=$project->project_id; ?>" name="project_id">
    	        </form>
                <form action="<?=base_url; ?>worksheet/show_worksheet" method="POST">
                    <button class="submit">
                        <abbr title="Actualizar hoja de trabajo"> <i class="fa fa-pencil"></i></button></abbr>    
                    </button>    
                    <input  type="hidden" value="<?=$data->worksheet_id; ?>" name="worksheet_id">
        	    </form>    
        	    <form action="<?=base_url; ?>worksheet/ask_delete" method="POST">
        	        <button class="submit">
                        <abbr title="Borrar hoja de trabajo"><i class="fa fa-trash"></i></abbr>
                    </button>    
    		        <input type="hidden"  value="<?= $data->worksheet_id; ?>" name="worksheet_id">
			        <input type="hidden"  value="<?= $data->worksheet_date; ?>" name="worksheet_date">
                    <input type="hidden"  value="<?= $data->project_id; ?>" name="project_id">
                </form>
            </td> 
            <?php  endif; ?>
        </tr> 
        
<?php  endwhile; endif; ?>
<?php if (isset($project_data) && $project_data->project_state != 'f'):?>
<?php $project_data->project_state = 's'; ?>
<form action="<?=base_url; ?>worksheet/save_worksheet" method="POST">   
            
            <td>
                <input type="date" name="worksheet_date" >
            </td>
            <td>
                <input type="text"   name="worksheet_desc" style="width: 100%;" >
            </td>
            <td>
                <input type="time" name="start_time" list="listahorasdeseadas">
            </td>
            <td>
                <input type="time" name="finish_time" list="listahorasdeseadas">
            </td>
            <td>
                <input type="text" name="efective_time" value="" style="width: 100%;">
            </td>
            <td>
                <input type="hidden" value="<?=$project_data->project_state; ?>" name="project_state">  
                <input type="hidden"  value="<?= $project_data->project_id; ?>" name="project_id">
                <input type="submit" value="Enviar"/> 
            </td>
        </tr>
        </form>
<!-- Imprime el total de horas trabajadas-->
</table>
<h3>Total horas: <?=($total_hours->total); ?></h3>
<br>




<table>
    <tr>
        <th>Material utilizado</th>
    </tr>
</table>
<table>
    <tr class="header_small">
        <th style="width: 90px;">Fecha</th>
        <th style="width: 650px;">Material</th> 
        <th style="width: 70px;">Cantidad</th>
        <th style="width: 80px;">Precio</th>        
        <th style="width: 60px;">Descuento</th> 
        <th style="width: 90px;"></th>
    </tr>
        <?php if ($details == true):?>
            <?php foreach ($details as $detail):?>
                <tr>
                    <td>
                        <?= $detail['detail_date']; ?>
                    </td>
                    <td>
                        <?= $detail['material_name']; ?>
                    </td>
                    <td>
                        <?= $detail['material_quantity']; ?>  
                    </td>
                    <td>
                        <?= $detail['detail_price']; ?>
                    </td>
                    <td>
                        <?= $detail['detail_discount']; ?>
                    </td>
                
                    <td class="icons" >
                        <!--<form action="<?=base_url; ?>detail/update_detail" method="POST">
                            <button class="submit">
                            <abbr title="Actualizar material"> <i class="fa fa-pencil"></i></button></abbr>    
                                </button>    
                            <input type="hidden" value="<?=$detail_data->subcategory_name; ?>" name="subcategory_name">
                            <input type="hidden" value="<?=$detail_data->detail_id; ?>" name="detail_id">
                            <input type="hidden"  value="<?= $detail_data->project_id; ?>" name="project_id"> 
                        </form>  
                    -->   
                        <form action="<?=base_url; ?>detail/ask_delete_detail" method="POST">
        	                <button class="submit">
                                <abbr title="Borrar material"><i class="fa fa-trash"></i></abbr>
                            </button>  
                            <input type="hidden" name="detail_id" value="<?=$detail['detail_id']; ?>" >
                            <input type="hidden" name="material_name" value="<?=$detail['material_name']; ?>" >
                            <input type="hidden" name="material_id" value="<?=$detail['material_id']; ?>" >
                            <input type="hidden" name="project_id" value="<?=$detail['project_id']; ?>" >
    		              
                        </form>
                    </td>
                </tr>
           <?php  endforeach; ?>
        <?php  endif; ?>
</table>
<br>
<br>
<form action="<?=base_url; ?>worksheet/print" method="POST">
    <input type="hidden" name="project_id" value="<?=$detail['project_id']; ?>" >
    <input type="hidden" name="worksheet_id" value="<?=$detail['worksheet_id']; ?>" >


    <button type="submit" >Imprimir</button>
</form>
  <br>
<?php  endif; ?>
  

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