<?php

/**
 * @author Samuel Arteaga López <samu.ar.lo.04@gmail.com>
 */

/**1. Crea un formulario sencillo donde el usuario indique su nombre y seleccione si quiere un
saludo o despedida. Se debe almacenar en una Cookie el usuario y el saludo y al pulsar Enviar,
se debe indicar los valores actuales (usuario y saludo o despedida elegidos) y los valores del
usuario anterior y acción elegida almacenadas en la Cookie */

if (isset($_POST["enviar"])) {

    $cookie_name = "miCookie";

    $nombre = $_POST["nombre"];
    $cookie_saludate = $_POST["saludoDespedida"];

    echo "$nombre <br>";
    if ($saludoDespedida == "Saludo") {
        echo "Has seleccionado Saludo <br>";
    } else {
        echo "Has seleccionado Despedida <br>";
    }

    $cookie_value = $nombre. " ".$cookie_saludate;
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
    <form action="ejercicio1.php" method="post">
        <label for="nombre">Nombre: </label><br><br>
        <input type="text" name="nombre" id="nombre"><br><br>

        <label for="saludoDespedida">¿Saludo o Despedida?</label><br><br>
        <input type="radio" name="saludoDespedida" value="Saludo">Saludo<br><br>
        <input type="radio" name="saludoDespedida" value="Despedida">Despedida<br><br>

        <input type="submit" name="enviar" value="Enviar"><br><br>
        <?php
        /**Con este php embebido en html damos lugar con un if si se ha establecido o no, si lo ha hecho
         * imprimimos todos los valores
         */
        if (!isset($_COOKIE[$cookie_name])) {
            echo "El nombre de la cookie " . $cookie_name . " no está definida!";
        } 
        else {
            echo "Cookie " .  $cookie_name . " está definida!<br>";
            echo "La forma de Saludo/Despedida es: " . $_COOKIE[$cookie_name];
        }
        ?>
    </form>
</body>

</html>