<?php
$host      = getenv('PGHOST')     ?: 'postgres.railway.internal';
$puerto    = getenv('PGPORT')     ?: '5432';
$basedatos = getenv('PGDATABASE') ?: 'railway';
$usuario   = getenv('PGUSER')     ?: 'postgres';
$password  = getenv('PGPASSWORD') ?: 'YOqYsUzTdXJMqrTZbextWWHntzgBFptc';

$conexion = pg_connect("host=$host port=$puerto dbname=$basedatos user=$usuario password=$password");

if (!$conexion) {
    die("❌ Error al conectar con la base de datos");
}
?>
