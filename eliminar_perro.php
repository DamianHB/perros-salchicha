<?php
include "conexion.php";

if (isset($_GET['id'])) {
    $id  = (int) $_GET['id'];
    $sql = "DELETE FROM perros WHERE id = $id";

    $resultado = pg_query($conexion, $sql);

    if ($resultado) {
        header("Location: ver_perros.php");
    } else {
        echo "❌ Error al eliminar: " . pg_last_error($conexion);
    }
} else {
    header("Location: ver_perros.php");
}
?>
