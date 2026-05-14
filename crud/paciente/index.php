<?php
require_once("../dbConnection.php");

$result = mysqli_query($mysqli, "SELECT * FROM paciente ORDER BY idPaciente ASC");
?>
<html>
<head>
    <title>Pacientes</title>
</head>
<body>

<h2>Pacientes</h2>
<p>
    <a href="../index.php">Inicio</a> |
    <a href="add.php">Añadir Nuevo Paciente</a>
</p>

<table width="90%" border="1" cellpadding="6">
    <tr bgcolor="#DDDDDD">
        <td><strong>ID</strong></td>
        <td><strong>DNI</strong></td>
        <td><strong>Nombre</strong></td>
        <td><strong>Apellidos</strong></td>
        <td><strong>F. Nacimiento</strong></td>
        <td><strong>Teléfono</strong></td>
        <td><strong>Email</strong></td>
        <td><strong>Acción</strong></td>
    </tr>
    <?php
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>" . $row['idPaciente'] . "</td>";
        echo "<td>" . $row['DNI'] . "</td>";
        echo "<td>" . $row['nombre'] . "</td>";
        echo "<td>" . $row['apellidos'] . "</td>";
        echo "<td>" . $row['fechaNacimiento'] . "</td>";
        echo "<td>" . $row['telefono'] . "</td>";
        echo "<td>" . $row['email'] . "</td>";
        echo "<td>
                <a href='edit.php?id=" . $row['idPaciente'] . "'>Editar</a> |
                <a href='delete.php?id=" . $row['idPaciente'] . "'
                   onClick=\"return confirm('¿Seguro que quieres eliminar este paciente?')\">Eliminar</a>
              </td>";
        echo "</tr>";
    }
    ?>
</table>

</body>
</html>
