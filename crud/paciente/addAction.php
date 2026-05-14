<html>
<head>
    <title>Añadir Paciente</title>
</head>
<body>
<?php
require_once("../dbConnection.php");

if (isset($_POST['submit'])) {

    $DNI            = mysqli_real_escape_string($mysqli, $_POST['DNI']);
    $nombre         = mysqli_real_escape_string($mysqli, $_POST['nombre']);
    $apellidos      = mysqli_real_escape_string($mysqli, $_POST['apellidos']);
    $fechaNacimiento= mysqli_real_escape_string($mysqli, $_POST['fechaNacimiento']);
    $telefono       = mysqli_real_escape_string($mysqli, $_POST['telefono']);
    $email          = mysqli_real_escape_string($mysqli, $_POST['email']);
    $direccion      = mysqli_real_escape_string($mysqli, $_POST['direccion']);

    // Comprobar campos obligatorios
    if (empty($DNI) || empty($nombre) || empty($apellidos)) {
        if (empty($DNI))       echo "<font color='red'>El DNI es obligatorio.</font><br/>";
        if (empty($nombre))    echo "<font color='red'>El nombre es obligatorio.</font><br/>";
        if (empty($apellidos)) echo "<font color='red'>Los apellidos son obligatorios.</font><br/>";
        echo "<br/><a href='javascript:self.history.back();'>Volver</a>";
    } else {
        // Comprobar que el DNI no está ya en la BD
        $check = mysqli_query($mysqli, "SELECT COUNT(*) AS total FROM paciente WHERE DNI = '$DNI'");
        $count = mysqli_fetch_assoc($check)['total'];

        if ($count > 0) {
            echo "<font color='red'>Ya existe un paciente con ese DNI.</font><br/>";
            echo "<a href='javascript:self.history.back();'>Volver</a>";
        } else {
            $fechaVal = empty($fechaNacimiento) ? "NULL" : "'$fechaNacimiento'";

            $result = mysqli_query($mysqli,
                "INSERT INTO paciente (DNI, nombre, apellidos, fechaNacimiento, telefono, email, direccion)
                 VALUES ('$DNI', '$nombre', '$apellidos', $fechaVal, '$telefono', '$email', '$direccion')"
            );

            if ($result) {
                echo "<font color='green'>Paciente añadido correctamente.</font>";
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
