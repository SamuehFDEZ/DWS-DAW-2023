<?php
/**
 * Ejercicio 5: Control de acceso a una caja fuerte.
 * La combinación será un número de 4 cifras.
 * Tendremos cuatro oportunidades para abrir la caja fuerte.
 */

$numRand = mt_rand(1000, 9999); // Generar número aleatorio de 4 cifras
echo $numRand;
$oportunidades = 4; // Número de oportunidades

if (isset($_POST["enviar"])) {
    $numeroAdivinar = $_POST["numeroAdivinar"];
    $oportunidades--;
    
    if ($numeroAdivinar == $numRand) {
        // Correct combination
        echo "<p style='color:green;'>La caja fuerte se ha abierto satisfactoriamente en color verde</p>";
    } else {
        // Incorrect combination
        echo "<p style='color:red;'>Lo siento, esa no es la combinación</p>";

        // Decrement the remaining attempts
    }

    if ($oportunidades > 0) {
        echo "<p>Te quedan $oportunidades oportunidades.</p>";
    } else {
        echo "<p>Te has quedado sin oportunidades. La combinación era $numRand.</p>";
        // You can perform additional actions here if needed
    }
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
    <form action="ejercicio12.php" method="post">
        <label for="numeroAdivinar">Introduce el número de 4 cifras</label><br><br>
        <input type="text" name="numeroAdivinar"><br><br>
        <input type="submit" name="enviar" value="Enviar">
    </form>
</body>
</html>
