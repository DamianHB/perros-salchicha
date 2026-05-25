<?php
$host      = "localhost";
$puerto    = "5432";
$basedatos = "perros_salchicha";
$usuario   = "mi_usuario";
$password  = "123456";

$conexion = pg_connect("host=$host port=$puerto dbname=$basedatos user=$usuario password=$password");

if (!$conexion) {
    die("❌ Error al conectar con la base de datos");
} else {
    echo "✅ Conexión exitosa a PostgreSQL";
}
?>
