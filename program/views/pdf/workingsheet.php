    <?php foreach($pworksheet as $data):?><?php endforeach?>
      <div class="center"> 

      <?php include 'data.php'; ?>  
      <div class="work">
        <table>
          <tr>
            <th>Trabajos a relalizar</th>
          <tr>
            <td><?=$data['project_desc'];?>
            </td>
          </tr>
        </table>
      </div>
      <div class="description">
        <table >
          <tr>
            <th class="line5-1">Fecha</th>
            <th class="line5-2">Descripción</th>
            <th class="line5-3">Hora entrada</th>
            <th class="line5-4">Hora salida</th>
            <th class="line5-5">Tiempo efectivo</th>            
          </tr>
          <tr >
            <?php foreach($get_worksheet as $wdata):?>
            <td class="output"><?=$wdata['worksheet_date']?></td>
            <td class="desc"><?=$wdata['worksheet_desc']?><!-- descripcion--> </td>   
            <td class="output"><?=$wdata['start_time']?><!--hora entrada--></td>
            <td class="output"><?=$wdata['finish_time']?><!--hora salida--></td>
            <td class="output"><?=$wdata['efective_time']?><!--tiempo efectivo--></td>  
          </tr><?php endforeach;?>
        </table>
      </div> 
      <table class="total">
          <tr>
            <td class="line6-1">
              total horas
            </td>
            <td class="line6-2">
            <?=$total_hours -> total?><!-- total horas-->
            </td>
          </tr>
        </table>
      <div class="observations">
        <table style="border: 2px: color:red;">
          <tr>
            <th>
              Observaciones y material utilizado
            </th>
          </tr>
            </table>
                     
             <?php foreach($get_detail as $ddata):?>
          <!-- observaciones y material entre <li>-->
                
                    <li>
                        <table >
                            <tr>
                                <td class="quantity">
                                    <?=$ddata['material_quantity']?>        
                                </td>
                                <td class="material2">    
                                    <?=$ddata['material_name']?>     
                                </td>
                                <td>    
                                    <?=$ddata['detail_price']?>
                                </td>
                            </tr>        
                        </table>
                    </li> 
               
           
        <?php endforeach;?>
        
      </div>
    </div>
    <div class="footer">
      <div id="tecnico">
        <table id="firm">
          <tr>
            <th id="tecnico">
              Firma tecnico
            </th>
          </tr>
          <tr >
            <td id="firm">
             <!--firma aqui-->
            </td>
          </tr>
        </table>
      </div >
      <div id="cliente">
      <table id="firm">
          <tr>
            <th id="tecnico">
              Firma cliente
            </th>
          </tr>
          <tr id="firm">
            <td >
             <!--firma aqui-->
            </td>
          </tr>
      </table>
      </div>   
    </div>
  </div>
