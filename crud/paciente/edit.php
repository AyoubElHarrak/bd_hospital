<?php
require_once("../dbConnection.php");

$id     = $_GET['id'];
$result = mysqli_query($mysqli, "SELECT * FROM paciente WHERE idPaciente = $id");
$row    = mysqli_fetch_assoc($result);
?>
<html>
<head>
    <title>Editar Paciente</title>
</head>
<body>

<h2>Editar Paciente</h2>
<p>
    <a href="index.php">Volver al listado</a>
</p>

<form name="edit" method="post" action="editAction.php">
    <table border="0" cellpadding="6">
        <tr>
            <td>DNI</td>
            <td><input type="text" name="DNI" maxlength="9" value="<?php echo $row['DNI']; ?>"></td>
        </tr>
        <tr>
            <td>Nombre</td>
            <td><input type="text" name="nombre" value="<?php echo $row['nombre']; ?>"></td>
        </tr>
        <tr>
            <td>Apellidos</td>
            <td><input type="text" name="apellidos" value="<?php echo $row['apellidos']; ?>"></td>
        </tr>
        <tr>
            <td>Fecha Nacimiento</td>
            <td><input type="date" name="fechaNacimiento" value="<?php echo $row['fechaNacimiento']; ?>"></td>
        </tr>
        <tr>
            <td>Teléfono</td>
            <td><input type="text" name="telefono" value="<?php echo $row['telefono']; ?>"></td>
        </tr>
        <tr>
            <td>Email</td>
            <td><input type="email" name="email" value="<?php echo $row['email']; ?>"></td>
        </tr>
        <tr>
            <td>Dirección</td>
            <td><input type="text" name="direccion" size="40" value="<?php echo $row['direccion']; ?>"></td>
        </tr>
        <tr>
            <td><input type="hidden" name="id" value="<?php echo $id; ?>"></td>
            <td><input type="submit" name="update" value="Actualizar"></td>
        </tr>
    </table>
</form>

</body>
</html>
