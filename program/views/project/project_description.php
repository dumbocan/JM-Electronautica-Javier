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
 invoice_id          int
 -->
<h1>Trabajos a realizar</h1>
<?php if (isset($_SESSION['register']) && $_SESSION['register'] == 'complete'):?>
<strong id="ok">Registro completado correctamente</strong>
<?php elseif (isset($_SESSION['register']) && $_SESSION['register'] == 'failed'):?>
<strong id="fallo">Registro fallido, introduce bien los datos</strong>
<?php endif; ?>
<br/>
<?php

$date = $this-> description();
echo $date;