<?php
require_once("dbConnection.php");

$totalPacientes     = mysqli_fetch_assoc(mysqli_query($mysqli, "SELECT COUNT(*) AS total FROM paciente"))['total'];
$totalCitas         = mysqli_fetch_assoc(mysqli_query($mysqli, "SELECT COUNT(*) AS total FROM cita"))['total'];
$totalDepartamentos = mysqli_fetch_assoc(mysqli_query($mysqli, "SELECT COUNT(*) AS total FROM departamento"))['total'];
$totalEpisodios     = mysqli_fetch_assoc(mysqli_query($mysqli, "SELECT COUNT(*) AS total FROM episodio"))['total'];
?>
<html>
<head>
    <title>Hospital CRUD</title>
</head>
<body>

<h2>Sistema de Gestión Hospitalaria</h2>
<p>Selecciona una tabla para gestionar:</p>

<table border="1" cellpadding="8">
    <tr bgcolor="#DDDDDD">
        <td><strong>Tabla</strong></td>
        <td><strong>Registros</strong></td>
        <td><strong>Acciones</strong></td>
    </tr>
    <tr>
        <td>Departamentos</td>
        <td><?php echo $totalDepartamentos; ?></td>
        <td><a href="departamento/index.php">Gestionar</a></td>
    </tr>
    <tr>
        <td>Pacientes</td>
        <td><?php echo $totalPacientes; ?></td>
        <td><a href="paciente/index.php">Gestionar</a></td>
    </tr>
    <tr>
        <td>Episodios</td>
        <td><?php echo $totalEpisodios; ?></td>
        <td><a href="episodio/index.php">Gestionar</a></td>
    </tr>
    <tr>
        <td>Citas</td>
        <td><?php echo $totalCitas; ?></td>
        <td><a href="cita/index.php">Gestionar</a></td>
    </tr>
</table>

</body>
</html>
