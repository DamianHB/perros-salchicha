<?php
$host      = "postgres.zephyr.proxy.rlwy.net";
$puerto    = "47530";
$basedatos = "Ferrocarril";
$usuario   = "Postgres";
$password  = "YOqYsUzTdXMMqrTZbextWHntzgBptc";

$conexion = pg_connect("host=$host port=$puerto dbname=$basedatos user=$usuario password=$password");

if (!$conexion) {
    die("❌ Error al conectar con la base de datos");
} else {
    echo "✅ Conexión exitosa a PostgreSQL Railway";
}
?>
