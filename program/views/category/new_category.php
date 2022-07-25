<h3>Nueva categoria de  <?=$section_name; ?></h3>

<form action="<?=base_url; ?>category/save_category" method="POST">
    <tag>Introduce nueva categoria para <?=$section_name; ?></tag>
    <input type="text" name="new_category" id="new_category">
    <input type="hidden" name="section_id" id="section_id" value="<?= $cat->getsection_id(); ?>">
    <input type="hidden" name="section_name" id="section_name" value="<?= $section_name; ?>">
    <input type="submit" >

</form>