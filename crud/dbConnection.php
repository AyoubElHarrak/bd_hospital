<?php
$databaseHost     = 'localhost';
$databaseName     = 'bd_hospital';
$databaseUsername = 'root';
$databasePassword = '1234';

$mysqli = mysqli_connect($databaseHost, $databaseUsername, $databasePassword, $databaseName);

if (!$mysqli) {
    die("Error de conexión: " . mysqli_connect_error());
}
mysqli_set_charset($mysqli, 'utf8');
?>
