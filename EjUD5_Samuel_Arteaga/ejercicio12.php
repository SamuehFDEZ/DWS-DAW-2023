<?php
/**
 * @author Samuel Arteaga López <samu.ar.lo.04@gmail.com>
 */
/**12. Ejercicio 5. Realiza el control de acceso a una caja fuerte. La combinación será un número de
4 cifras. El programa nos pedirá la combinación para abrirla. Si no acertamos, se nos mostrará el
mensaje “Lo siento, esa no es la combinación” en color rojo y si acertamos se nos dirá “La caja
fuerte se ha abierto satisfactoriamente” en color verde. Tendremos cuatro oportunidades para
abrir la caja fuerte. */

$numRand = isset($_POST["numRand"]) ? $_POST["numRand"] : mt_rand(1000, 9999); // Obtener o generar número aleatorio de 4 cifras
$oportunidades = isset($_POST["oportunidades"]) ? $_POST["oportunidades"] : 4; // Obtener o establecer el número de oportunidades

echo $numRand;

if (isset($_POST["enviar"])) {
    $numeroAdivinar = $_POST["numeroAdivinar"];
    $oportunidades--;

    if ($numeroAdivinar == $numRand) {
        // Combinación correcta
        echo "<p style='color:green;'>La caja fuerte se ha abierto satisfactoriamente</p>";
        // Puedes realizar acciones adicionales aquí si es necesario
    } else {
        // Combinación incorrecta
        echo "<p style='color:red;'>Lo siento, esa no es la combinación</p>";

        // Mostrar el número de oportunidades restantes
        if ($oportunidades > 0) {
            echo "<p>Te quedan $oportunidades oportunidades.</p>";
        } else {
            echo "<p>Te has quedado sin oportunidades. La combinación era $numRand.</p>";
            // Puedes realizar acciones adicionales aquí si es necesario
        }
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
        <input type="hidden" name="numRand" value="<?php echo $numRand; ?>">
        <input type="hidden" name="oportunidades" value="<?php echo $oportunidades; ?>">

        <label for="numeroAdivinar">Introduce el número de 4 cifras</label><br><br>
        <input type="text" name="numeroAdivinar"><br><br>
        <input type="submit" name="enviar" value="Enviar">
    </form>
</body>
</html>
