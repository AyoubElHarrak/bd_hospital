<?php
require_once("../dbConnection.php");

// Cargar pacientes y personal para los selects
$pacientes = mysqli_query($mysqli, "SELECT idPaciente, DNI, nombre, apellidos FROM paciente ORDER BY apellidos");
$personal  = mysqli_query($mysqli, "SELECT idPersonal, nombre, apellidos, tipo FROM personal WHERE tipo IN ('Doctor','Enfermero') AND activo = 1 ORDER BY apellidos");
?>
<html>
<head>
    <title>Añadir Cita</title>
</head>
<body>

<h2>Añadir Cita</h2>
<p>
    <a href="index.php">Volver al listado</a>
</p>

<form action="addAction.php" method="post" name="add">
    <table border="0" cellpadding="6">
        <tr>
            <td>Paciente</td>
            <td>
                <select name="idPaciente">
                    <option value="">-- Selecciona paciente --</option>
                    <?php while ($p = mysqli_fetch_assoc($pacientes)): ?>
                        <option value="<?php echo $p['idPaciente']; ?>">
                            <?php echo $p['apellidos'] . ", " . $p['nombre'] . " (" . $p['DNI'] . ")"; ?>
                        </option>
                    <?php endwhile; ?>
                </select>
            </td>
        </tr>
        <tr>
            <td>Personal que atiende</td>
            <td>
                <select name="idPersonal">
                    <option value="">-- Selecciona personal --</option>
                    <?php while ($pe = mysqli_fetch_assoc($personal)): ?>
                        <option value="<?php echo $pe['idPersonal']; ?>">
                            <?php echo $pe['apellidos'] . ", " . $pe['nombre'] . " [" . $pe['tipo'] . "]"; ?>
                        </option>
                    <?php endwhile; ?>
                </select>
            </td>
        </tr>
        <tr>
            <td>Fecha</td>
            <td><input type="date" name="fecha"></td>
        </tr>
        <tr>
            <td>Hora</td>
            <td><input type="time" name="hora"></td>
        </tr>
        <tr>
            <td>Estado</td>
            <td>
                <select name="estado">
                    <option value="pendiente">Pendiente</option>
                    <option value="atendida">Atendida</option>
                    <option value="noPresentada">No Presentada</option>
                    <option value="cancelada">Cancelada</option>
                </select>
            </td>
        </tr>
        <tr>
            <td>Motivo</td>
            <td><input type="text" name="motivo" size="40"></td>
        </tr>
        <tr>
            <td></td>
            <td><input type="submit" name="submit" value="Añadir Cita"></td>
        </tr>
    </table>
</form>

</body>
</html>
