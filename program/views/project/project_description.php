<br>
<br>

<table>
    <tr>
        <th><h1>Trabajos a realizar en <?=$data->boat_name; ?></h1></th>
    </tr>
</table>
<table>
    <tr>
        <th style="width: 120px;">N proyecto</th>
        <th style="width: 100px;">Fecha</th>
        <th style="width: 577px;">Trabajos a realizar</th>        
        <th style="width: 230px;">Observaciones</th>

        <th style="width: 65px;"> </th>
    </tr>
    <tr>
        <form action="<?=base_url; ?>project/save" method="POST">
            <td><label for="project_number"><?= $number->number; ?></label></td>
                <input type="hidden" name="project_number" value="<?= $number->number; ?>">
      
            <td><input type="date" name="project_date" ></td>
            <td><input type="text" name="project_description" style="width: 100%;"></td>
                <input type="hidden" name="project_state" value="w" /> 
            <td><input type="text" name="project_comments" style="width: 100%;"></td>
    
            <td><button class="file" name="pictures"><i class="fa fa-file-image-o"></i></button>  
            <button class="file" name="files"><i class="fa fa-file-o"></i></button></td>    

    <input type="hidden" name="boat_id" value="<?=$data->boat_id?>">
    </tr>
</table>
<?//php var_dump($data);?>
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
                              boat_id -->
    
</form>
 
