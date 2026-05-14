<html>
<head><title>Añadir Departamento</title></head>
<body>
<?php
require_once("../dbConnection.php");

if (isset($_POST['submit'])) {

    $nombre    = mysqli_real_escape_string($mysqli, $_POST['nombre']);
    $ubicacion = mysqli_real_escape_string($mysqli, $_POST['ubicacion']);
    $telefono  = mysqli_real_escape_string($mysqli, $_POST['telefono']);

    if (empty($nombre)) {
        echo "<font color='red'>El nombre es obligatorio.</font><br/>";
        echo "<a href='javascript:self.history.back();'>Volver</a>";
    } else {
        // Comprobar que el nombre no está ya en uso (es ÚNICO)
        $check = mysqli_query($mysqli, "SELECT COUNT(*) AS total FROM departamento WHERE nombre = '$nombre'");
        $count = mysqli_fetch_assoc($check)['total'];

        if ($count > 0) {
            echo "<font color='red'>Ya existe un departamento con ese nombre.</font><br/>";
            echo "<a href='javascript:self.history.back();'>Volver</a>";
        } else {
            $result = mysqli_query($mysqli,
                "INSERT INTO departamento (nombre, ubicacion, telefono)
                 VALUES ('$nombre', '$ubicacion', '$telefono')"
            );

            if ($result) {
                echo "<font color='green'>Departamento añadido correctamente.</font>";
                echo "<br/><a href='index.php'>Ver listado</a>";
            } else {
                echo "<font color='red'>Error: " . mysqli_error($mysqli) . "</font>";
            }
        }
    }
}
?>
</body>
</html>
