<?php
require_once("../dbConnection.php");

$id     = $_GET['id'];
$result = mysqli_query($mysqli, "SELECT * FROM episodio WHERE idEpisodio = $id");
$row    = mysqli_fetch_assoc($result);

$pacientes     = mysqli_query($mysqli, "SELECT idPaciente, DNI, nombre, apellidos FROM paciente ORDER BY apellidos");
$departamentos = mysqli_query($mysqli, "SELECT idDepartamento, nombre FROM departamento ORDER BY nombre");
?>
<html>
<head>
    <title>Editar Episodio</title>
</head>
<body>

<h2>Editar Episodio #<?php echo $id; ?></h2>
<p>
    <a href="index.php">Volver al listado</a>
</p>

<form name="edit" method="post" action="editAction.php">
    <table border="0" cellpadding="6">
        <tr>
            <td>Paciente</td>
            <td>
                <select name="idPaciente">
                    <?php while ($p = mysqli_fetch_assoc($pacientes)): ?>
                        <option value="<?php echo $p['idPaciente']; ?>"
                            <?php echo $row['idPaciente'] == $p['idPaciente'] ? 'selected' : ''; ?>>
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
                    <?php while ($d = mysqli_fetch_assoc($departamentos)): ?>
                        <option value="<?php echo $d['idDepartamento']; ?>"
                            <?php echo $row['idDepartamento'] == $d['idDepartamento'] ? 'selected' : ''; ?>>
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
                    <?php foreach (['consulta', 'urgencias', 'ingreso'] as $t): ?>
                        <option value="<?php echo $t; ?>"
                            <?php echo $row['tipo'] === $t ? 'selected' : ''; ?>>
                            <?php echo ucfirst($t); ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </td>
        </tr>
        <tr>
            <td>Fecha Apertura</td>
            <td><input type="date" name="fechaApertura" value="<?php echo $row['fechaApertura']; ?>"></td>
        </tr>
        <tr>
            <td>Fecha Cierre <small>(opcional)</small></td>
            <td><input type="date" name="fechaCierre" value="<?php echo $row['fechaCierre']; ?>"></td>
        </tr>
        <tr>
            <td><input type="hidden" name="id" value="<?php echo $id; ?>"></td>
            <td><input type="submit" name="update" value="Actualizar"></td>
        </tr>
    </table>
</form>

</body>
</html>
