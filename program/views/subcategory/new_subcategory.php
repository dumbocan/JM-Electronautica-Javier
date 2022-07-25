<h3>Nueva categoria de  <?=$category_name; ?></h3>

<form action="<?=base_url; ?>subcategory/save_subcategory" method="POST">
    <tag>Introduce nueva subcategoria para <?=$category_name; ?></tag>
    <input type="text" name="new_subcategory" id="new_subcategory">
    <input type="hidden" name="category_id" id="category_id" value="<?= $cat->getcategory_id(); ?>">
    <input type="hidden" name="category_name" id="category_name" value="<?= $category_name; ?>">
    <input type="submit" >

</form>