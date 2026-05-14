<?php
require_once("../dbConnection.php");

$result = mysqli_query($mysqli,
    "SELECT c.idCita, c.fecha, c.hora, c.estado, c.motivo,
            p.nombre AS pac_nombre, p.apellidos AS pac_apellidos,
            pe.nombre AS per_nombre, pe.apellidos AS per_apellidos
     FROM cita c
     JOIN paciente p  ON c.idPaciente = p.idPaciente
     JOIN personal pe ON c.idPersonal = pe.idPersonal
     ORDER BY c.idCita ASC"
);
?>
<html>
<head>
    <title>Citas</title>
</head>
<body>

<h2>Citas</h2>
<p>
    <a href="../index.php">Inicio</a> |
    <a href="add.php">Añadir Nueva Cita</a>
</p>

<table width="95%" border="1" cellpadding="6">
    <tr bgcolor="#DDDDDD">
        <td><strong>ID</strong></td>
        <td><strong>Fecha</strong></td>
        <td><strong>Hora</strong></td>
        <td><strong>Paciente</strong></td>
        <td><strong>Personal</strong></td>
        <td><strong>Motivo</strong></td>
        <td><strong>Estado</strong></td>
        <td><strong>Acción</strong></td>
    </tr>
    <?php
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>" . $row['idCita'] . "</td>";
        echo "<td>" . $row['fecha'] . "</td>";
        echo "<td>" . $row['hora'] . "</td>";
        echo "<td>" . $row['pac_apellidos'] . ", " . $row['pac_nombre'] . "</td>";
        echo "<td>" . $row['per_apellidos'] . ", " . $row['per_nombre'] . "</td>";
        echo "<td>" . $row['motivo'] . "</td>";
        echo "<td>" . $row['estado'] . "</td>";
        echo "<td>
                <a href='edit.php?id=" . $row['idCita'] . "'>Editar</a> |
                <a href='delete.php?id=" . $row['idCita'] . "'
                   onClick=\"return confirm('¿Seguro que quieres eliminar esta cita?')\">Eliminar</a>
              </td>";
        echo "</tr>";
    }
    ?>
</table>

</body>
</html>
