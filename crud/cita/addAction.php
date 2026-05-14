<html>
<head><title>Añadir Cita</title></head>
<body>
<?php
require_once("../dbConnection.php");

if (isset($_POST['submit'])) {

    $idPaciente = mysqli_real_escape_string($mysqli, $_POST['idPaciente']);
    $idPersonal = mysqli_real_escape_string($mysqli, $_POST['idPersonal']);
    $fecha      = mysqli_real_escape_string($mysqli, $_POST['fecha']);
    $hora       = mysqli_real_escape_string($mysqli, $_POST['hora']);
    $estado     = mysqli_real_escape_string($mysqli, $_POST['estado']);
    $motivo     = mysqli_real_escape_string($mysqli, $_POST['motivo']);

    if (empty($idPaciente) || empty($idPersonal) || empty($fecha) || empty($hora)) {
        if (empty($idPaciente)) echo "<font color='red'>Selecciona un paciente.</font><br/>";
        if (empty($idPersonal)) echo "<font color='red'>Selecciona el personal que atiende.</font><br/>";
        if (empty($fecha))      echo "<font color='red'>La fecha es obligatoria.</font><br/>";
        if (empty($hora))       echo "<font color='red'>La hora es obligatoria.</font><br/>";
        echo "<br/><a href='javascript:self.history.back();'>Volver</a>";
    } else {
        $result = mysqli_query($mysqli,
            "INSERT INTO cita (idPaciente, idPersonal, fecha, hora, estado, motivo)
             VALUES ($idPaciente, $idPersonal, '$fecha', '$hora', '$estado', '$motivo')"
        );

        if ($result) {
            echo "<font color='green'>Cita añadida correctamente.</font>";
            echo "<br/><a href='index.php'>Ver listado</a>";
        } else {
            echo "<font color='red'>Error: " . mysqli_error($mysqli) . "</font>";
        }
    }
}
?>
</body>
</html>
