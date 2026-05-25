<?php
function saludarPerro($nombre, $edad) {
    return "¡Hola! Soy $nombre y tengo $edad años 🐾";
}

$colores = ["marrón", "negro", "crema", "rojo"];

foreach ($colores as $color) {
    echo "Color: $color <br>";
}

echo saludarPerro("Salchi", 2);
?>
