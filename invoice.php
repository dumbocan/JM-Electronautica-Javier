<doctipe<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" type="text/css" href="styles.css/styles.css"/>
<title>Workingsheet</title>
</head>
  <body>
    <div class="background"> 
      <?php include 'header.php'; ?>
      <?php include 'data.php'; ?>
      <div class="in-description">
        <table >
          <tr>
            <th class="in-amount">Cantidad</th>
            <th class="in-info">Descripción</th>
            <th class="in-price">Valor unidad</th>
            <th class="in-desc">Desc.</th>
            <th class="in-price">Valor total</th>            
          </tr>
          <tr >
            <td class="in-output"><!-- cantidad--> </td>
            <td class="desc"><!-- descripcion--> </td>   
            <td class="in-output"><!--precio unitario--></td>
            <td class="in-output"><!--descuento--></td>
            <td class="in-output"><!--precio total--></td>  
          </tr>
        </table>
      </div>
      <div class="in-footer"> 
        <div class="comments">
          <table>
            <tr>
              <th>
                Observaciones.
              </th>
            </tr>
            <tr>
              <td>
                <!-- Observaciones-->
              </td>
            </tr>
          </table>
        </div>  
        <div class="final">
          <table>
          <tr>
              <th>
                Base imponible.
              </th>
              <th>
                % IGIC
              </th>
              <th>
                Imponible IGIC.
              </th>
              <th>
                Total factura.
              </th>
            </tr>
            <tr>
              <td class="in-final">
                <!-- Subtotal-->
              </td>
              <td class="in-final">7
                <!-- %IGIC-->
              </td>
              <td class="in-final">
                <!-- Total IGIC-->
              </td>
              <td class="in-final">
                <!-- Precio final-->
              </td>
              
            </tr>
          </table>
        </div>
        <div class="cuenta">
        Cuenta JM Electronáutica    ES90 2080 1047 1030 4004 2205 
        </div>
      </div>
    </div>
  </body>
</html>    