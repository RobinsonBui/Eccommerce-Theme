<div class="wrap page-analytics">
    <h1>Tag Manager</h1>
    <form method="post" action="">
        <span class="page-analytics__span">
            <label for="fieldHead">Código arriba del Head</label>
            <textarea class="page-analytics__input" id="fieldHead"
                name="option_head"><?php echo stripslashes(get_option('option_head', '')); ?></textarea>
        </span>
        <span class="page-analytics__span">
            <label for="fieldBody">Código después del Body</label>
            <textarea class="page-analytics__input" id="fieldBody"
                name="option_body"><?php echo stripslashes(get_option('option_body', '')); ?></textarea>
        </span>
        <input type="submit" name="submit" value="Guardar Cambios" class="button-primary">
    </form>
</div>



<?php
function process_tag_manager_form()
{
    $fieldHead = $_POST['option_head'];
    $fieldBody = $_POST['option_body'];

    global $wpdb;

    $table_exists = $wpdb->get_var("SHOW TABLES LIKE 'wk_data_tag_manager'");

    if (!$table_exists) {
        $create_table_sql = "CREATE TABLE wk_data_tag_manager (
            id INT NOT NULL AUTO_INCREMENT,
            field_head LONGTEXT NOT NULL,
            field_body LONGTEXT NOT NULL,
            PRIMARY KEY (id)
        );";
        $wpdb->query($create_table_sql);

        $insert_initial_row_sql = "INSERT INTO wk_data_tag_manager (field_head, field_body) VALUES ('', '');";
        $wpdb->query($insert_initial_row_sql);
    }

    $data = array($fieldHead, $fieldBody);
    $update_sql = "UPDATE wk_data_tag_manager SET field_head = %s, field_body = %s WHERE id = 1;";

    $prepared_update_sql = $wpdb->prepare($update_sql, $data);
    $result = $wpdb->query($prepared_update_sql);
    if ($result === false) {
        echo '<div class="notice notice-error"><p>Error al actualizar los datos en la base de datos: ' . $wpdb->last_error . '</p></div>';
    } else {
        // Actualizar las opciones en la tabla de opciones de WordPress
        update_option('option_head', $fieldHead);
        update_option('option_body', $fieldBody);

        echo '<div class="notice notice-success"><p>Los cambios se han guardado correctamente.</p></div>';
    }
}


if (isset($_POST['submit'])) {
    process_tag_manager_form();
}
?>