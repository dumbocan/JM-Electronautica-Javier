
<?php if (isset($costumer) && is_object($costumer)):?>
    <?php var_dump($costumer);?>
    <?php var_dump($boat);?>
<H1>Editar cliente <?=$name->costumer_name; ?></H1>

<?php $url_action = base_url.'costumer/update'; ?>
<?php else: ?>
    <?php var_dump($name);?>
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
    
    

    <label for="costumer_name">Nombre</label>
    <input type="text" name="costumer_name" value="<?=isset($pro) && is_object($data) ? $data->costumer_name : ''; ?>"/>
    
    <label for="address">Dirección</label>
    <input type="text" name="address" value="<?=isset($pro) && is_object($data) ? $data->address : ''; ?>"/>

    <label for="passport">Identificación</label>
    <input type="text" name="passport" value="<?=isset($pro) && is_object($data) ? $data->passport : ''; ?>"/>

    <label for="country">Pais</label>
    <input type="text" name="country" value="<?=isset($pro) && is_object($data) ? $data->country : ''; ?>"/>

    <label for="telephone">Teléfono</label>
    <input type="text" name="telephone" value="<?=isset($pro) && is_object($data) ? $data->telephone : ''; ?>"/>
    
    <label for="email">Email</label>
    <input type="email" name="email" value="<?=isset($pro) && is_object($data) ? $data->email : ''; ?>"/>

    <label for="boat_name">Nombre embarcación</label>
    <input type="text" name="boat_name" value="<?=isset($pro) && is_object($data) ? $data->boat_name : ''; ?>"/>

    <label for="marina">Marina</label>
    <input type="text" name="marina" value="<?=isset($pro) && is_object($data) ? $data->marina : ''; ?>"/>

    <label for="type">Tipo de barco</label>
    <input type="text" name="type" value="<?=isset($pro) && is_object($data) ? $data->type : ''; ?>"/>
    <br>
    <br>
    <input type="submit" value="Guardar"/>
    
</form>