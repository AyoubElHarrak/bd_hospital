<?php
require_once("../dbConnection.php");

$result = mysqli_query($mysqli, "SELECT * FROM departamento ORDER BY idDepartamento ASC");
?>
<html>
<head>
    <title>Departamentos</title>
</head>
<body>

<h2>Departamentos</h2>
<p>
    <a href="../index.php">Inicio</a> |
    <a href="add.php">Añadir Nuevo Departamento</a>
</p>

<table width="70%" border="1" cellpadding="6">
    <tr bgcolor="#DDDDDD">
        <td><strong>ID</strong></td>
        <td><strong>Nombre</strong></td>
        <td><strong>Ubicación</strong></td>
        <td><strong>Teléfono</strong></td>
        <td><strong>Acción</strong></td>
    </tr>
    <?php
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>" . $row['idDepartamento'] . "</td>";
        echo "<td>" . $row['nombre'] . "</td>";
        echo "<td>" . $row['ubicacion'] . "</td>";
        echo "<td>" . $row['telefono'] . "</td>";
        echo "<td>
                <a href='edit.php?id=" . $row['idDepartamento'] . "'>Editar</a> |
                <a href='delete.php?id=" . $row['idDepartamento'] . "'
                   onClick=\"return confirm('¿Seguro que quieres eliminar este departamento?')\">Eliminar</a>
              </td>";
        echo "</tr>";
    }
    ?>
</table>

</body>
</html>
