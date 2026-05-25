<?php
include "conexion.php";

$consulta  = "SELECT * FROM perros ORDER BY id ASC";
$resultado = pg_query($conexion, $consulta);

if (!$resultado) {
    die("❌ Error: " . pg_last_error($conexion));
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8"/>
  <title>Ver Perros 🐾</title>
  <link rel="stylesheet" href="style.css"/>
  <style>
    .contenedor { max-width: 900px; margin: 3rem auto; padding: 0 2rem; }
    table { width: 100%; border-collapse: collapse; background: white; border-radius: 16px; overflow: hidden; box-shadow: 0 8px 30px rgba(107,58,42,0.15); }
    th { background: #6B3A2A; color: white; padding: 1rem; font-size: 1rem; }
    td { padding: 0.9rem 1rem; border-bottom: 1px solid #f0e0d0; text-align: center; }
    tr:hover td { background: #FFF8EF; }
    .btn { display: inline-block; margin: 1.5rem 0; background: #6B3A2A; color: white; padding: 0.8rem 2rem; border-radius: 50px; text-decoration: none; font-weight: 700; }
    .btn-eliminar { background: #cc3333; color: white; padding: 0.4rem 1rem; border-radius: 20px; text-decoration: none; font-size: 0.85rem; }
  </style>
</head>
<body>
  <header>
    <div class="logo">🌭 Mundo Salchicha</div>
  </header>

  <div class="contenedor">
    <h2 style="font-family:'Fredoka One',cursive; color:#6B3A2A; margin-bottom:1.5rem;">
      Perros Registrados 🐶
    </h2>

    <table>
      <thead>
        <tr>
          <th>ID</th>
          <th>Nombre</th>
          <th>Edad</th>
          <th>Color</th>
          <th>Pelaje</th>
          <th>Peso</th>
          <th>Acción</th>
        </tr>
      </thead>
      <tbody>
        <?php while ($fila = pg_fetch_assoc($resultado)): ?>
        <tr>
          <td><?= $fila['id'] ?></td>
          <td><?= $fila['nombre'] ?></td>
          <td><?= $fila['edad'] ?> años</td>
          <td><?= $fila['color'] ?></td>
          <td><?= $fila['tipo_pelaje'] ?></td>
          <td><?= $fila['peso_kg'] ?> kg</td>
          <td>
            <a href="eliminar_perro.php?id=<?= $fila['id'] ?>"
               class="btn-eliminar"
               onclick="return confirm('¿Eliminar a <?= $fila['nombre'] ?>?')">
               🗑️ Eliminar
            </a>
          </td>
        </tr>
        <?php endwhile; ?>
      </tbody>
    </table>

    <a href="agregar_perro.php" class="btn">+ Agregar Perro</a>
    <a href="index.html" class="btn" style="margin-left:1rem;">← Inicio</a>
  </div>
</body>
</html>
