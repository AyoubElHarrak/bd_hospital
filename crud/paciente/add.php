<html>
<head>
    <title>Añadir Paciente</title>
</head>
<body>

<h2>Añadir Paciente</h2>
<p>
    <a href="index.php">Volver al listado</a>
</p>

<form action="addAction.php" method="post" name="add">
    <table border="0" cellpadding="6">
        <tr>
            <td>DNI</td>
            <td><input type="text" name="DNI" maxlength="9" placeholder="12345678A"></td>
        </tr>
        <tr>
            <td>Nombre</td>
            <td><input type="text" name="nombre"></td>
        </tr>
        <tr>
            <td>Apellidos</td>
            <td><input type="text" name="apellidos"></td>
        </tr>
        <tr>
            <td>Fecha Nacimiento</td>
            <td><input type="date" name="fechaNacimiento"></td>
        </tr>
        <tr>
            <td>Teléfono</td>
            <td><input type="text" name="telefono"></td>
        </tr>
        <tr>
            <td>Email</td>
            <td><input type="email" name="email"></td>
        </tr>
        <tr>
            <td>Dirección</td>
            <td><input type="text" name="direccion" size="40"></td>
        </tr>
        <tr>
            <td></td>
            <td><input type="submit" name="submit" value="Añadir Paciente"></td>
        </tr>
    </table>
</form>

</body>
</html>
