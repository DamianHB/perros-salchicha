<?php
$host      = "postgres.railway.internal";
$puerto    = "5432";
$basedatos = "railway";
$usuario   = "postgres";
$password  = "YOqYsUzTdXJMqrTZbextWWHntzgBFptc";

$conexion = pg_connect("host=$host port=$puerto dbname=$basedatos user=$usuario password=$password");

if (!$conexion) {
    die("❌ Error al conectar con la base de datos");
} else {
    echo "✅ Conexión exitosa a PostgreSQL";
}
?>
