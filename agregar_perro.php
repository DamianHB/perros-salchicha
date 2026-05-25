<?php
include "conexion.php";
$mensaje = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $nombre      = pg_escape_string($conexion, $_POST['nombre']);
    $edad        = (int) $_POST['edad'];
    $color       = pg_escape_string($conexion, $_POST['color']);
    $tipo_pelaje = pg_escape_string($conexion, $_POST['tipo_pelaje']);
    $peso        = (float) $_POST['peso'];

    $sql = "INSERT INTO perros (nombre, edad, color, tipo_pelaje, peso_kg)
            VALUES ('$nombre', $edad, '$color', '$tipo_pelaje', $peso)";

    $resultado = pg_query($conexion, $sql);

    if ($resultado) {
        $mensaje = "✅ ¡$nombre registrado exitosamente!";
    } else {
        $mensaje = "❌ Error: " . pg_last_error($conexion);
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8"/>
  <title>Agregar Perro 🐾</title>
  <link rel="stylesheet" href="style.css"/>
  <style>
    .form-container { max-width: 520px; margin: 3rem auto; padding: 2.5rem; background: white; border-radius: 24px; box-shadow: 0 8px 30px rgba(107,58,42,0.15); }
    h2 { font-family: 'Fredoka One',cursive; color: #6B3A2A; margin-bottom: 1.5rem; }
    label { display: block; font-weight: 700; color: #6B3A2A; margin-bottom: 0.4rem; }
    input, select { width: 100%; padding: 0.8rem 1rem; border: 2px solid #e0d0c0; border-radius: 10px; font-size: 1rem; margin-bottom: 1.2rem; transition: border 0.3s; }
    input:focus, select:focus { outline: none; border-color: #E8732A; }
    .btn-enviar { width: 100%; background: #6B3A2A; color: white; border: none; padding: 1rem; border-radius: 50px; font-size: 1.1rem; font-weight: 700; cursor: pointer; transition: background 0.3s; }
    .btn-enviar:hover { background: #E8732A; }
    .mensaje { padding: 1rem; border-radius: 10px; margin-bottom: 1.5rem; font-weight: 700; background: #FFF8EF; border-left: 5px solid #E8732A; }
    .btn-link { display: inline-block; margin-top: 1rem; color: #6B3A2A; text-decoration: none; font-weight: 700; }
  </style>
</head>
<body>
  <header>
    <div class="logo">🌭 Mundo Salchicha</div>
  </header>

  <div class="form-container">
    <h2>Registrar Perro 🐶</h2>

    <?php if ($mensaje): ?>
      <div class="mensaje"><?= $mensaje ?></div>
    <?php endif; ?>

    <form method="POST" action="agregar_perro.php">
      <label>Nombre</label>
      <input type="text" name="nombre" placeholder="Ej: Pancho" required/>

      <label>Edad (años)</label>
      <input type="number" name="edad" min="0" max="20" placeholder="Ej: 3" required/>

      <label>Color</label>
      <input type="text" name="color" placeholder="Ej: marrón" required/>

      <label>Tipo de pelaje</label>
      <select name="tipo_pelaje">
        <option value="liso">Liso</option>
        <option value="largo">Largo</option>
        <option value="duro">Duro</option>
      </select>

      <label>Peso (kg)</label>
      <input type="number" name="peso" step="0.1" min="0" max="15" placeholder="Ej: 5.2" required/>

      <button type="submit" class="btn-enviar">Registrar 🐾</button>
    </form>

    <a href="ver_perros.php" class="btn-link">→ Ver todos los perros</a><br/>
    <a href="index.html"     class="btn-link">← Volver al inicio</a>
  </div>
</body>
</html>
