<h2>Proyectos en espera</h2>
<?php
foreach($searchW as $key=>$value)
echo " <br>".$value;
?>

<h2>Proyectos empezados</h2>
<?php
foreach($searchS as $key=>$value)
echo "<br> ".$value;
?>

<form action="<?=base_url; ?>worksheet/search_project" method="POST">
   
    <input type="hidden" name="f" id="f" >
    <br>
    <input type="submit" value="Proyectos terminados"/>
</form>