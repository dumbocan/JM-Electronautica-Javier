
<form action="<?=base_url; ?>costumer/search_db" method="POST">
    <label for="costumer_name">Nombre</label>
    <input type="text" name="costumer_name" id="costumer_name">
    <input type="hidden" name="costumer" id="costumer" value="costumer">
    <br>
    <br>
    <input type="submit" value="Enviar"/>
</form>