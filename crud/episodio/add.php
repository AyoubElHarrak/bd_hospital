<?php
require_once("../dbConnection.php");

$pacientes    = mysqli_query($mysqli, "SELECT idPaciente, DNI, nombre, apellidos FROM paciente ORDER BY apellidos");
$departamentos= mysqli_query($mysqli, "SELECT idDepartamento, nombre FROM departamento ORDER BY nombre");
?>
<html>
<head>
    <title>Añadir Episodio</title>
</head>
<body>

<h2>Añadir Episodio</h2>
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
            <td>Departamento</td>
            <td>
                <select name="idDepartamento">
                    <option value="">-- Selecciona departamento --</option>
                    <?php while ($d = mysqli_fetch_assoc($departamentos)): ?>
                        <option value="<?php echo $d['idDepartamento']; ?>">
                            <?php echo $d['nombre']; ?>
                        </option>
                    <?php endwhile; ?>
                </select>
            </td>
        </tr>
        <tr>
            <td>Tipo</td>
            <td>
                <select name="tipo">
                    <option value="consulta">Consulta</option>
                    <option value="urgencias">Urgencias</option>
                    <option value="ingreso">Ingreso</option>
                </select>
            </td>
        </tr>
        <tr>
            <td>Fecha Apertura</td>
            <td><input type="date" name="fechaApertura"></td>
        </tr>
        <tr>
            <td>Fecha Cierre <small>(opcional)</small></td>
            <td><input type="date" name="fechaCierre"></td>
        </tr>
        <tr>
            <td></td>
            <td><input type="submit" name="submit" value="Añadir Episodio"></td>
        </tr>
    </table>
</form>

</body>
</html>
