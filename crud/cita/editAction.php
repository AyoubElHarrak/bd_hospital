<html>
<head><title>Editar Cita</title></head>
<body>
<?php
require_once("../dbConnection.php");
if (isset($_POST["update"])) {
    $id         = mysqli_real_escape_string($mysqli, $_POST["id"]);
    $idPaciente = mysqli_real_escape_string($mysqli, $_POST["idPaciente"]);
    $idPersonal = mysqli_real_escape_string($mysqli, $_POST["idPersonal"]);
    $fecha      = mysqli_real_escape_string($mysqli, $_POST["fecha"]);
    $hora       = mysqli_real_escape_string($mysqli, $_POST["hora"]);
    $estado     = mysqli_real_escape_string($mysqli, $_POST["estado"]);
    $motivo     = mysqli_real_escape_string($mysqli, $_POST["motivo"]);

    if (empty($idPaciente) || empty($idPersonal) || empty($fecha) || empty($hora)) {
        echo "<font color=red>Faltan campos obligatorios.</font><br/>";
        echo "<a href=javascript:self.history.back();>Volver</a>";
    } else {
        $result = mysqli_query($mysqli,
            "UPDATE cita SET idPaciente=$idPaciente, idPersonal=$idPersonal, fecha='$fecha', hora='$hora', estado='$estado', motivo='$motivo' WHERE idCita = $id"
        );
        if ($result) {
            echo "<font color=green>Cita actualizada correctamente.</font>";
            echo "<br/><a href=index.php>Ver listado</a>";
        } else {
            echo "<font color=red>Error: " . mysqli_error($mysqli) . "</font>";
        }
    }
}
?>
</body>
</html>