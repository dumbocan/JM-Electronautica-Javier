
<h1>Registro clientes</h1>

<?php

if (isset($_SESSION['register']) && $_SESSION['register'] == 'complete'):?>
<strong id="ok">Registro completado correctamente</strong>
<?php elseif (isset($_SESSION['register']) && $_SESSION['register'] == 'failed'):?>
<strong id="fallo">Registro fallido, introduce bien los datos</strong>

<?php endif; ?>

<?php Utils::deleteSession('register'); ?>
<form action="<?=base_url; ?>costumer/save" method="POST">
    
    
    
    <label for="costumer_name">Nombre</label>
    <input type="text" name="costumer_name" >
    
    <label for="address">Dirección</label>
    <input type="text" name="address" >

    <label for="passport">Identificación</label>
    <input type="text" name="passport" >

    <label for="country">Pais</label>
    <input type="text" name="country" >

    <label for="telephone">Teléfono</label>
    <input type="text" name="telephone" >
    
    <label for="email">Email</label>
    <input type="email" name="email" >

    <label for="boat_name">Nombre embarcación</label>
    <input type="text" name="boat_name" required>

    <label for="marina">Marina</label>
    <input type="text" name="marina" required>

    <label for="type">Tipo de barco</label>
    <input type="text" name="type" required>
    <br>
    <br>
    <input type="submit" value="Registrarse"/>
    
</form>