<?php 

/**
 * @author Samuel Arteaga López <samu.ar.lo.04@gmail.com>
 */

/**2. Crea un formulario en el que se le pida al usuario los siguientes datos: nombre y preferencia de
idioma, color y ciudad. Crea una Cookie que almacene estos datos y que, al recargar la página
por realizar una nueva selección de datos (y posiblemente usuario) muestre los datos
introducidos en el formulario junto con los datos obtenidos de la Cookie. */


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

    $color = $_POST["red"];

    echo "El color es:". $color;

    // $cookie_value = $nombre. " ".$cookie_saludate;

    // setcookie($cookie_name, $cookie_value);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Samuel Arteaga</title>
</head>
<body>
<form action="ejercicio2.php" method="post">
        <label for="nombre">Nombre: </label><br><br>
        <input type="text" name="nombre" id="nombre"><br><br>

        <label for="idioma">Selecciona tu idioma preferido</label><br><br>
        <input type="radio" name="idioma" value="Español">Español<br><br>
        <input type="radio" name="idioma" value="Inglés">Inglés<br><br>
        <input type="radio" name="idioma" value="Valenciano">Valenciano<br><br>

        <label for="color">Selecciona tu color favorito</label><br><br>
        <input type="color" name="red[]" multiple><br><br>


        <input type="submit" name="enviar" value="Enviar"><br><br>
        <?php
        // if (!isset($_COOKIE[$cookie_name])) {
        //     echo "El nombre de la cookie " . $cookie_name . " no está definida!";
        // } 
        // else {
        //     echo "Cookie " .  $cookie_name . " está definida!<br>";
        //     echo "La forma de Saludo/Despedida es: " . $_COOKIE[$cookie_name];
        // }
        ?>
    </form>
</body>
</html>