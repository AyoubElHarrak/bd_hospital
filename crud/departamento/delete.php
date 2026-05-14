<?php
require_once("../dbConnection.php");
mysqli_report(MYSQLI_REPORT_OFF);
$id = $_GET["id"];
$result = mysqli_query($mysqli, "DELETE FROM departamento WHERE idDepartamento = $id");
if ($result) {
    header("Location: index.php");
} else {
    echo "<font color=red>No se puede eliminar: tiene personal o episodios asociados.</font>";
    echo "<br/><a href=index.php>Volver</a>";
}
?>
