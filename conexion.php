<?php
$host = "localhost";
$port = "5432";
$dbname = "PATAS_FELICES";
$user = "postgres";
$password = "12345678";

$conexion = pg_connect("host=$host port=$port dbname=$dbname user=$user password=$password");
if (!$conexion) {
    die("❌ Error al conectar a la base de datos: " . pg_last_error());
}
?>