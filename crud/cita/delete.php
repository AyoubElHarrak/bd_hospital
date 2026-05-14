<?php
require_once("../dbConnection.php");
$id = $_GET["id"];
$result = mysqli_query($mysqli, "DELETE FROM cita WHERE idCita = $id");
if ($result) { header("Location: index.php"); } else { echo "Error: " . mysqli_error($mysqli); echo "<br/><a href=index.php>Volver</a>"; }
?>
