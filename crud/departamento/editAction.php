<html>
<head><title>Editar Departamento</title></head>
<body>
<?php
require_once("../dbConnection.php");

if (isset($_POST['update'])) {

    $id        = mysqli_real_escape_string($mysqli, $_POST['id']);
    $nombre    = mysqli_real_escape_string($mysqli, $_POST['nombre']);
    $ubicacion = mysqli_real_escape_string($mysqli, $_POST['ubicacion']);
    $telefono  = mysqli_real_escape_string($mysqli, $_POST['telefono']);

    if (empty($nombre)) {
        echo "<font color='red'>El nombre es obligatorio.</font><br/>";
        echo "<a href='javascript:self.history.back();'>Volver</a>";
    } else {
        // Comprobar nombre único excluyendo el propio registro
        $check = mysqli_query($mysqli,
            "SELECT COUNT(*) AS total FROM departamento WHERE nombre = '$nombre' AND idDepartamento != $id"
        );
        $count = mysqli_fetch_assoc($check)['total'];

        if ($count > 0) {
            echo "<font color='red'>Ya existe otro departamento con ese nombre.</font><br/>";
            echo "<a href='javascript:self.history.back();'>Volver</a>";
        } else {
            $result = mysqli_query($mysqli,
                "UPDATE departamento
                 SET nombre='$nombre', ubicacion='$ubicacion', telefono='$telefono'
                 WHERE idDepartamento = $id"
            );

            if ($result) {
                echo "<font color='green'>Departamento actualizado correctamente.</font>";
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
