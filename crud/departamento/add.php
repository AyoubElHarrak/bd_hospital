<html>
<head>
    <title>Añadir Departamento</title>
</head>
<body>

<h2>Añadir Departamento</h2>
<p>
    <a href="index.php">Volver al listado</a>
</p>

<form action="addAction.php" method="post" name="add">
    <table border="0" cellpadding="6">
        <tr>
            <td>Nombre</td>
            <td><input type="text" name="nombre" placeholder="Ej: Cardiología"></td>
        </tr>
        <tr>
            <td>Ubicación</td>
            <td><input type="text" name="ubicacion" placeholder="Ej: Planta 2, Ala Norte"></td>
        </tr>
        <tr>
            <td>Teléfono</td>
            <td><input type="text" name="telefono" placeholder="Ej: 976000000"></td>
        </tr>
        <tr>
            <td></td>
            <td><input type="submit" name="submit" value="Añadir Departamento"></td>
        </tr>
    </table>
</form>

</body>
</html>
