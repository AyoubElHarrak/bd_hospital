<?php
require_once("../dbConnection.php");

$id = $_GET['id'];

$result = mysqli_query($mysqli, "DELETE FROM paciente WHERE idPaciente = $id");

if ($result) {
    header("Location: index.php");
} else {
    echo "<font color='red'>No se puede eliminar: el paciente tiene citas o episodios asociados.</font>";
    echo "<br/><a href='index.php'>Volver</a>";
}
?>
