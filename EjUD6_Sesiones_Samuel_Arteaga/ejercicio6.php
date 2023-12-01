<?php 

/**
 * @author Samuel Arteaga López <samu.ar.lo.04@gmail.com>
 */

/**6. Usa el formulario del ejercicio 6 de Cookies con la tabla de multiplicar de modo que uses la
sesión para mostrar el multiplicando, el multiplicador y la tabla actuales y además muestre el
multiplicando, el multiplicador y la tabla de la ejecución anterior. */

if (isset($_POST["enviar"])) {

    $num = $_POST["numero"];

    echo "Tabla de multiplicar del ".$num.":"."<br>"; // imrpimimos mediante concatenaciones su resultado de la multiplicacion
    echo $num."x 1 = ". $num*1 ."<br>";
    echo $num."x 2 = ". $num*2 ."<br>";
    echo $num."x 3 = ". $num*3 ."<br>";
    echo $num."x 4 = ". $num*4 ."<br>";
    echo $num."x 5 = ". $num*5 ."<br>";
    echo $num."x 6 = ". $num*6 ."<br>";
    echo $num."x 7 = ". $num*7 ."<br>";
    echo $num."x 8 = ". $num*8 ."<br>";
    echo $num."x 9 = ". $num*9 ."<br>";
    echo $num."x 10 = ". $num*10 ."<br>";

    /**Creamos la cookie con los valores de nombre y value */

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
    <form action="ejercicio6.php" method="post">
        <label for="numero">Introduce el numero:</label><br><br>
        <input type="number" name="numero" ><br><br>
        <input type="submit" name="enviar" value="Enviar"><br><br>
    </form>
    <?php
        session_start(); //iniciamos la sesión
        
        if (empty($_SESSION["numero"])) {
            $_SESSION["numero"] = $_POST["numero"];
        } 
        else {
            $_SESSION["numeroAntiguo"]  = $_SESSION["numero"];
            $_SESSION["numero"] = $_POST["numero"];

            echo "Los datos anteriormente introducidos son: ",  $_SESSION["numeroAntiguo"];
        }
    ?>
</body>
</html>