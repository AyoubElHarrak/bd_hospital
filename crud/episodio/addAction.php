<html>
<head><title>Añadir Episodio</title></head>
<body>
<?php
require_once("../dbConnection.php");

if (isset($_POST['submit'])) {

    $idPaciente     = mysqli_real_escape_string($mysqli, $_POST['idPaciente']);
    $idDepartamento = mysqli_real_escape_string($mysqli, $_POST['idDepartamento']);
    $tipo           = mysqli_real_escape_string($mysqli, $_POST['tipo']);
    $fechaApertura  = mysqli_real_escape_string($mysqli, $_POST['fechaApertura']);
    $fechaCierre    = mysqli_real_escape_string($mysqli, $_POST['fechaCierre']);

    if (empty($idPaciente) || empty($idDepartamento) || empty($fechaApertura)) {
        if (empty($idPaciente))     echo "<font color='red'>Selecciona un paciente.</font><br/>";
        if (empty($idDepartamento)) echo "<font color='red'>Selecciona un departamento.</font><br/>";
        if (empty($fechaApertura))  echo "<font color='red'>La fecha de apertura es obligatoria.</font><br/>";
        echo "<a href='javascript:self.history.back();'>Volver</a>";
    } else {
        // fechaCierre es opcional — si está vacío se guarda NULL
        $cierreVal = empty($fechaCierre) ? "NULL" : "'$fechaCierre'";

        $result = mysqli_query($mysqli,
            "INSERT INTO episodio (idPaciente, idDepartamento, tipo, fechaApertura, fechaCierre)
             VALUES ($idPaciente, $idDepartamento, '$tipo', '$fechaApertura', $cierreVal)"
        );

        if ($result) {
            echo "<font color='green'>Episodio añadido correctamente.</font>";
            echo "<br/><a href='index.php'>Ver listado</a>";
        } else {
            echo "<font color='red'>Error: " . mysqli_error($mysqli) . "</font>";
        }
    }
}
?>
</body>
</html>
