
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
    <input type="text" name="costumer_name" required>
    
    <label for="address">Dirección</label>
    <input type="text" name="address" required>

    <label for="passport">Identificación</label>
    <input type="text" name="passport" required>

    <label for="country">Pais</label>
    <input type="text" name="country" required>

    <label for="telephone">Teléfono</label>
    <input type="text" name="telephone" required>
    
    <label for="email">Email</label>
        <input type="email" name="email" required>
    
    <input type="submit" value="Registrarse"/>
    
</form>