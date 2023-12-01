<?php 

/**
 * @author Samuel Arteaga López <samu.ar.lo.04@gmail.com>
 */

/**2. Crea un formulario en el que se le pida al usuario los siguientes datos: nombre y preferencia de
idioma, color y ciudad. Crea una Cookie que almacene estos datos y que, al recargar la página
por realizar una nueva selección de datos (y posiblemente usuario) muestre los datos
introducidos en el formulario junto con los datos obtenidos de la Cookie. */


if (isset($_POST["enviar"])) {


    $nombre = $_POST["nombre"];

    echo "Nombre: $nombre <br>";
    
    $idioma = $_POST["idioma"];

    switch ($idioma) {
        case "Español":
           echo "Has seleccionado el idioma Español <br>";
            break;
        case "Inglés":
            echo "Has seleccionado el idioma Inglés <br>";
            break;
        case "Valenciano":
            echo "Has seleccionado el idioma Valenciano <br>";
            break;
        default:
           echo "ERROR!";
            break;
    }


    $color = $_POST["color"];

    echo "El color es: $color <br>";

    $ciudad = $_POST["ciudad"];

    echo "La ciudad seleccionada es: $ciudad <br>";

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
<form action="ejercicio2.php" method="post">
        <label for="nombre">Nombre: </label><br><br>
        <input type="text" name="nombre" id="nombre"><br><br>

        <label for="idioma">Selecciona tu idioma preferido</label><br><br>
        <input type="radio" name="idioma" value="Español">Español<br><br>
        <input type="radio" name="idioma" value="Inglés">Inglés<br><br>
        <input type="radio" name="idioma" value="Valenciano">Valenciano<br><br>

        <label for="color">Selecciona tu color favorito</label><br><br>
        <select name="color">
            <option value="rojo">Rojo</option>
            <option value="amarillo">Amarillo</option>
            <option value="verde">Verde</option>
            <option value="azul">Azul</option>
        </select><br><br>

        <label for="ciudad">Selecciona tu ciudad favorita</label><br><br>
        <select name="ciudad">
            <option value="Valencia">Valencia</option>
            <option value="Alicante">Alicante</option>
            <option value="Castellón">Castellón</option>
        </select><br><br>

        <input type="submit" name="enviar" value="Enviar"><br><br>
        <?php
            session_start(); //iniciamos la sesión
            
            if (empty($_SESSION["nombre"]) && empty($_SESSION["idioma"]) && empty($_SESSION["color"]) && empty($_SESSION["ciudad"])) {
                $_SESSION["nombre"] = $_POST["nombre"];
                $_SESSION["idioma"] = $_POST["idioma"];
                $_SESSION["color"] = $_POST["color"];
                $_SESSION["ciudad"] = $_POST["ciudad"];

            } 
            else {
                $_SESSION["nombreAntiguo"]  = $_SESSION["nombre"];
                $_SESSION["nombre"] = $_POST["nombre"];

                $_SESSION["idiomaAntiguo"] = $_SESSION["idioma"];
                $_SESSION["idioma"] = $_POST["idioma"];

                $_SESSION["colorAntiguo"] = $_SESSION["color"];
                $_SESSION["color"] = $_POST["color"];

                $_SESSION["ciudadAntiguo"] = $_SESSION["ciudad"];
                $_SESSION["ciudad"] = $_POST["ciudad"];

                echo "Los datos anteriormente introducidos son: ",  $_SESSION["nombreAntiguo"], ", ", $_SESSION["idiomaAntiguo"]
                , ", ", $_SESSION["colorAntiguo"], ", ", $_SESSION["ciudadAntiguo"];
            }
            // Cambia "cliente nuevo" por el valor introducido en el Text
        ?>
    </form>
</body>
</html>