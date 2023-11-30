<?php 

/**
 * @author Samuel Arteaga López <samu.ar.lo.04@gmail.com>
 */

/**7. Usa el formulario (Ejercicio 12 UD5) de la caja fuerte donde se indique la contraseña y muestre
las contraseñas ya introducidas y el número de intentos guardando estos datos en una Cookie.
Se deben mostrar la contraseña correcta, las contraseñas ya introducidas y el número de intentos
(cookie). */


if (isset($_POST["enviar"])) {

    $numRand = isset($_POST["numRand"]) ? $_POST["numRand"] : mt_rand(1000, 9999); // Obtener o generar número aleatorio de 4 cifras
    $oportunidades = isset($_POST["oportunidades"]) ? $_POST["oportunidades"] : 4; // Obtener o establecer el número de oportunidades

    echo $numRand;

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

    $cookie_name = "miCookie";

    $cookie_value = "Numero aleatorio: ".$numRand.", Nº Oportunidades ".$oportunidades.", Numero a adivinar ".$numeroAdivinar;  
    /**Creamos la cookie con los valores de nombre y value */

    setcookie($cookie_name, $cookie_value);
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
    <form action="ejercicio7.php" method="post">
        <input type="hidden" name="numRand" value="<?php echo $numRand; ?>">
        <input type="hidden" name="oportunidades" value="<?php echo $oportunidades; ?>">

        <label for="numeroAdivinar">Introduce el número de 4 cifras</label><br><br>
        <input type="text" name="numeroAdivinar"><br><br>
        <input type="submit" name="enviar" value="Enviar">
    </form>
    <?php
    /**Con este php embebido en html damos lugar con un if si se ha establecido o no, si lo ha hecho
         * imprimimos todos los valores
         */
        if (!isset($_COOKIE[$cookie_name])) {
            echo "El nombre de la cookie " . $cookie_name . " no está definida!";
        } 
        else {
            echo "Cookie " .  $cookie_name . " está definida!<br>";
                
            echo "Los valores de la cookie son: " . $_COOKIE[$cookie_name];
        }
    ?>
</body>
</html>
