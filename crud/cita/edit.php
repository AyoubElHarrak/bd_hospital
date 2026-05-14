<?php
require_once("../dbConnection.php");

$id     = $_GET['id'];
$result = mysqli_query($mysqli, "SELECT * FROM cita WHERE idCita = $id");
$row    = mysqli_fetch_assoc($result);

$pacientes = mysqli_query($mysqli, "SELECT idPaciente, DNI, nombre, apellidos FROM paciente ORDER BY apellidos");
$personal  = mysqli_query($mysqli, "SELECT idPersonal, nombre, apellidos, tipo FROM personal WHERE tipo IN ('Doctor','Enfermero') AND activo = 1 ORDER BY apellidos");
?>
<html>
<head><title>Editar Cita</title></head>
<body>
<h2>Editar Cita #<?php echo $id; ?></h2>
<p><a href="index.php">Volver al listado</a></p>

<form name="edit" method="post" action="editAction.php">
<table border="0" cellpadding="6">
<tr>
  <td>Paciente</td>
  <td>
    <select name="idPaciente">
      <?php while ($p = mysqli_fetch_assoc($pacientes)): ?>
        <option value="<?php echo $p['idPaciente']; ?>" <?php echo $row['idPaciente'] == $p['idPaciente'] ? 'selected' : ''; ?>>
          <?php echo $p['apellidos'] . ", " . $p['nombre'] . " (" . $p['DNI'] . ")"; ?>
        </option>
      <?php endwhile; ?>
    </select>
  </td>
</tr>
<tr>
  <td>Personal</td>
  <td>
    <select name="idPersonal">
      <?php while ($pe = mysqli_fetch_assoc($personal)): ?>
        <option value="<?php echo $pe['idPersonal']; ?>" <?php echo $row['idPersonal'] == $pe['idPersonal'] ? 'selected' : ''; ?>>
          <?php echo $pe['apellidos'] . ", " . $pe['nombre'] . " [" . $pe['tipo'] . "]"; ?>
        </option>
      <?php endwhile; ?>
    </select>
  </td>
</tr>
<tr>
  <td>Fecha</td>
  <td><input type="date" name="fecha" value="<?php echo $row['fecha']; ?>"></td>
</tr>
<tr>
  <td>Hora</td>
  <td><input type="time" name="hora" value="<?php echo substr($row['hora'],0,5); ?>"></td>
</tr>
<tr>
  <td>Estado</td>
  <td>
    <select name="estado">
      <?php foreach (['pendiente','atendida','noPresentada','cancelada'] as $e): ?>
        <option value="<?php echo $e; ?>" <?php echo $row['estado']===$e?'selected':''; ?>><?php echo $e; ?></option>
      <?php endforeach; ?>
    </select>
  </td>
</tr>
<tr>
  <td>Motivo</td>
  <td><input type="text" name="motivo" size="40" value="<?php echo $row['motivo']; ?>"></td>
</tr>
<tr>
  <td><input type="hidden" name="id" value="<?php echo $id; ?>"></td>
  <td><input type="submit" name="update" value="Actualizar"></td>
</tr>
</table>
</form>
</body>
</html>
