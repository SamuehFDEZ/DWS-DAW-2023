<?php

/**
 * @author Samuel Arteaga López <samu.ar.lo.04@gmail.com>
 */

/**1. Usa el formulario del ejercicio 1 de Cookies de saludo o despedida de modo que uses la sesión
para mostrar el usuario y saludo actuales y además muestre el usuario y saludo anterior. */

if (isset($_POST["enviar"])) {

    $nombre = $_POST["nombre"];
    $saludo = $_POST["saludoDespedida"];

    echo "$nombre <br>";
    if ($saludo == "Saludo") {
        echo "Has seleccionado Saludo <br>";
    } 
    else {
        echo "Has seleccionado Despedida <br>";
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
    <form action="ejercicio1.php" method="post">
        <label for="nombre">Nombre: </label><br><br>
        <input type="text" name="nombre" id="nombre"><br><br>

        <label for="saludoDespedida">¿Saludo o Despedida?</label><br><br>
        <input type="radio" name="saludoDespedida" value="Saludo">Saludo<br><br>
        <input type="radio" name="saludoDespedida" value="Despedida">Despedida<br><br>

        <input type="submit" name="enviar" value="Enviar"><br><br>
        <?php
            session_start(); //iniciamos la sesión
            
            if (empty($_SESSION["nombre"]) && empty($_SESSION["saludoDespedida"])) {
                $_SESSION["nombre"] = $_POST["nombre"];
                $_SESSION["saludoDespedida"] = $_POST["saludoDespedida"];
            } 
            else {
                $_SESSION["nombreAntiguo"]  = $_SESSION["nombre"];
                $_SESSION["nombre"] = $_POST["nombre"];

                $_SESSION["saludoDespedidaAntiguo"] = $_SESSION["saludoDespedida"];
                $_SESSION["saludoDespedida"] = $_POST["saludoDespedida"];

                echo "Los datos anteriormente introducidos son: ",  $_SESSION["nombreAntiguo"] , ", ", $_SESSION["saludoDespedidaAntiguo"];
            }
            // Cambia "cliente nuevo" por el valor introducido en el Text
        ?>
    </form>
</body>

</html>