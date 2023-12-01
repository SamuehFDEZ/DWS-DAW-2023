<?php 

/**
 * @author Samuel Arteaga López <samu.ar.lo.04@gmail.com>
 */

/**4. Usa el formulario del ejercicio 4 de Cookies del conversor de euros y pesetas de modo que uses
la sesión para mostrar la cantidad, moneda y conversión actuales y además muestre la cantidad,
moneda y conversión anterior.*/

if (isset($_POST["boton"])) {

    $euros = $_POST["euros"];
    echo "$euros <br>";

    $conversor = $_POST["conversor"];

    if ($conversor == "euro") {
        echo "Has elegido convertir la cantidad a euros <br>";
        $resultados = $euros/166.386;
        echo "La cantidad de pesetas a euros es ". round($resultados, 4). " euros <br>";
    }
    else{
        echo "Has elegido convertir la cantidad a pesetas <br>";
        $resultado = $euros*166.386;
        echo "La cantidad de euros a pesetas es ". round($resultado, 4). " pesetas <br>";
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
    <form action="ejercicio4.php" method="post">
        <label for="conversorEuros">Introduce la cantidad:</label><br><br>
        <input type="text" name="euros"><br><br>

        <input type="radio" name="conversor" value="euro" >Euros<br><br>
        <input type="radio" name="conversor" value="peseta" >Pesetas<br><br>


        <p>1€ equivale a 166.386 pesetas</p>
        <p>1pta equivale a 0.0060 euros</p>

        <input type="submit" name="boton" value="calcular"><br><br>
        <?php
            session_start(); //iniciamos la sesión
            
            if (empty($_SESSION["euros"]) && empty($_SESSION["conversor"])) {
                $_SESSION["euros"] = $_POST["euros"];
                $_SESSION["conversor"] = $_POST["conversor"];
            } 
            else {
                $_SESSION["eurosAntiguo"]  = $_SESSION["euros"];
                $_SESSION["euros"] = $_POST["euros"];

                $_SESSION["conversorAntiguo"] = $_SESSION["conversor"];
                $_SESSION["conversor"] = $_POST["conversor"];

                echo "Los datos anteriormente introducidos son: ",  $_SESSION["eurosAntiguo"], ", ", $_SESSION["conversorAntiguo"];
            }
            // Cambia "cliente nuevo" por el valor introducido en el Text
        ?>
    </form>
</body>
</html>