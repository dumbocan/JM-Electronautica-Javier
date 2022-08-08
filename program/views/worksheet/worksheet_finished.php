<h2>Proyectos finalizados</h2>

<?php while ($row = $searchF -> fetch_object()): ?>
    <form action="<?=base_url; ?>worksheet/prepare_worksheet" method="POST">
        <input type="submit"  value="<?=$row -> project_number ." ". $row -> boat_name; ?>" >
        <input type="hidden" name="project_id" value="<?=$row -> project_id?>">
        <input type="hidden" name="project_state" value="<?=$row -> project_state?>">
    </form>
<?php endwhile; ?>