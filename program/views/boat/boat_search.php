
<form action="<?=base_url; ?>costumer/search_db" method="POST">
    <label for="boat_name">Nombre embarcación</label>
    <input type="text" name="boat_name" >
    <input type="hidden" name="boat" id="boat" value="boat">
    <br>
    <br>
    <input type="submit" value="Enviar"/>
</form>