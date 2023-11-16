<?php
    // Verifica si se enviaron palabras para traducir
    if(isset($_POST["palabras"])) {
        // Array de palabras en inglés y sus traducciones
        $diccionario = array(
            "House"=> "Casa",
            "Tree"=> "Árbol",
            "Sun"=> "Sol",
            "Book"=> "Libro",
            "Computer"=> "Ordenador",
            "Water"=> "Agua",
            "Friend"=> "Amigo",
            "Music"=> "Computadora",
            "Hello"=> "Hola",
            "Blue"=> "Azul",         
        );

        echo '<table border="1">';
        echo "<tr><th>Palabra en Inglés</th><th>Traducción al Castellano</th></tr>";

        foreach ($_POST["palabras"] as $palabraSeleccionada) {
            echo "<tr>";
            echo "<td>" . $palabraSeleccionada . "</td>";
            echo "<td>" . (isset($diccionario[$palabraSeleccionada]) ? $diccionario[$palabraSeleccionada] : "No hay traducción") . "</td>";
            echo "</tr>";
        }

        echo "</table>";
    } else {
        echo "<p>No se seleccionaron palabras para traducir.</p>";
    }
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Samuel Arteaga</title>
</head>
<body>
    <h2>Traductor de Palabras</h2>
    <form action="ejercicio17.php" method="post">
        <label for="palabras">Selecciona palabras:</label>
        <select name="palabras[]"  multiple>
            <option value="House">House</option>
            <option value="Tree">Tree</option>
            <option value="Sun">Sun</option>
            <option value="Computer">Computer</option>
            <option value="Water">Water</option>
            <option value="Friend">Friend</option>
            <option value="Music">Music</option>
            <option value="Hello">Hello</option>
            <option value="Blue">Blue</option>
        </select>
        <br>
        <input type="submit" value="Traducir">
    </form>
</body>
</html>
