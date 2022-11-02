<!--Utilizo el mismo formulario para insertar o para editar, solo me cambia el action -->

<?php if (isset($cos) && is_object($cos)):?>
    
<H1>Editar cliente <?=$cos->costumer_name; ?></H1>

<?php $url_action = base_url.'costumer/update'; ?>

<?php else: ?>
    
<h1>Registro clientes</h1>
<?php $url_action = base_url. 'costumer/save'; ?>

<?php endif; ?>




<?php if (isset($_SESSION['register']) && $_SESSION['register'] == 'complete'):?>
<strong id="ok">Registro completado correctamente</strong>
<?php elseif (isset($_SESSION['register']) && $_SESSION['register'] == 'failed'):?>
<strong id="fallo">Registro fallido, introduce bien los datos</strong>

<?php endif; ?>

<?php Utils::deleteSession('register'); ?>
<form action="<?=$url_action?>" method="POST" enctype="multipart/form-data">
    
<input type="hidden" name="costumer_id" value="<?=isset($cos) && is_object($cos) ? $cos->costumer_id : ''; ?>"/>

    <label for="costumer_name">Nombre</label>
    <input type="text" name="costumer_name" value="<?=isset($cos) && is_object($cos) ? $cos->costumer_name : ''; ?>"/>
    
    <label for="address">Dirección</label>
    <input type="text" name="address" value="<?=isset($cos) && is_object($cos) ? $cos->address : ''; ?>"/>

    <label for="passport">Identificación</label>
    <input type="text" name="passport" value="<?=isset($cos) && is_object($cos) ? $cos->passport : ''; ?>"/>

    <label for="country">Pais</label>
    <input type="text" name="country" value="<?=isset($cos) && is_object($cos) ? $cos->country : ''; ?>"/>

    <label for="telephone">Teléfono</label>
    <input type="text" name="telephone" value="<?=isset($cos) && is_object($cos) ? $cos->telephone : ''; ?>"/>
    
    <label for="email">Email</label>
    <input type="email" name="email" value="<?=isset($cos) && is_object($cos) ? $cos->email : ''; ?>"/>

    <label for="boat_name">Nombre embarcación</label>
    <input type="text" name="boat_name" value="<?=isset($cos) && is_object($cos) ? $cos->boat_name : ''; ?>"/>

    <label for="marina">Marina</label>
    <input type="text" name="marina" value="<?=isset($cos) && is_object($cos) ? $cos->marina : ''; ?>"/>

    <label for="type">Tipo de barco</label>
    <input type="text" name="type" value="<?=isset($cos) && is_object($cos) ? $cos->type : ''; ?>"/>
    <br>
    <br>
    <input type="submit" value="Guardar"/>
    
</form>