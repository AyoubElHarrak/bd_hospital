<?php
require_once("../dbConnection.php");

$result = mysqli_query($mysqli,
    "SELECT e.idEpisodio, e.tipo, e.fechaApertura, e.fechaCierre,
            p.nombre AS pac_nombre, p.apellidos AS pac_apellidos,
            d.nombre AS departamento
     FROM episodio e
     JOIN paciente p ON e.idPaciente = p.idPaciente
     JOIN departamento d ON e.idDepartamento = d.idDepartamento
     ORDER BY e.idEpisodio ASC"
);
?>
<html>
<head>
    <title>Episodios</title>
</head>
<body>

<h2>Episodios</h2>
<p>
    <a href="../index.php">Inicio</a> |
    <a href="add.php">Añadir Nuevo Episodio</a>
</p>

<table width="95%" border="1" cellpadding="6">
    <tr bgcolor="#DDDDDD">
        <td><strong>ID</strong></td>
        <td><strong>Tipo</strong></td>
        <td><strong>Paciente</strong></td>
        <td><strong>Departamento</strong></td>
        <td><strong>Fecha Apertura</strong></td>
        <td><strong>Fecha Cierre</strong></td>
        <td><strong>Acción</strong></td>
    </tr>
    <?php
    while ($row = mysqli_fetch_assoc($result)) {
        $cierre = $row['fechaCierre'] ? $row['fechaCierre'] : '<font color="orange">Abierto</font>';
        echo "<tr>";
        echo "<td>" . $row['idEpisodio'] . "</td>";
        echo "<td>" . $row['tipo'] . "</td>";
        echo "<td>" . $row['pac_apellidos'] . ", " . $row['pac_nombre'] . "</td>";
        echo "<td>" . $row['departamento'] . "</td>";
        echo "<td>" . $row['fechaApertura'] . "</td>";
        echo "<td>" . $cierre . "</td>";
        echo "<td>
                <a href='edit.php?id=" . $row['idEpisodio'] . "'>Editar</a> |
                <a href='delete.php?id=" . $row['idEpisodio'] . "'
                   onClick=\"return confirm('¿Seguro que quieres eliminar este episodio?')\">Eliminar</a>
              </td>";
        echo "</tr>";
    }
    ?>
</table>

</body>
</html>
