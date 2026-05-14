<?php
require_once("../dbConnection.php");

$id     = $_GET['id'];
$result = mysqli_query($mysqli, "SELECT * FROM departamento WHERE idDepartamento = $id");
$row    = mysqli_fetch_assoc($result);
?>
<html>
<head>
    <title>Editar Departamento</title>
</head>
<body>

<h2>Editar Departamento #<?php echo $id; ?></h2>
<p>
    <a href="index.php">Volver al listado</a>
</p>

<form name="edit" method="post" action="editAction.php">
    <table border="0" cellpadding="6">
        <tr>
            <td>Nombre</td>
            <td><input type="text" name="nombre" value="<?php echo $row['nombre']; ?>"></td>
        </tr>
        <tr>
            <td>Ubicación</td>
            <td><input type="text" name="ubicacion" value="<?php echo $row['ubicacion']; ?>"></td>
        </tr>
        <tr>
            <td>Teléfono</td>
            <td><input type="text" name="telefono" value="<?php echo $row['telefono']; ?>"></td>
        </tr>
        <tr>
            <td><input type="hidden" name="id" value="<?php echo $id; ?>"></td>
            <td><input type="submit" name="update" value="Actualizar"></td>
        </tr>
    </table>
</form>

</body>
</html>
