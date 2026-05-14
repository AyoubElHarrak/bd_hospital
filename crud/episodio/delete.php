<?php
require_once("../dbConnection.php");
$id = $_GET["id"];
$result = mysqli_query($mysqli, "DELETE FROM episodio WHERE idEpisodio = $id");
if ($result) {
    header("Location: index.php");
} else {
    echo "<font color=red>No se puede eliminar: tiene citas, tratamientos o estancias asociados.</font>";
    echo "<br/><a href=index.php>Volver</a>";
}
?>