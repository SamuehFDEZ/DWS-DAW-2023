<?php 

/**
 * @author Samuel Arteaga López <samu.ar.lo.04@gmail.com>
 */

/**3. Usa el formulario del ejercicio 3 de Cookies del selector de operación de modo que uses la
sesión para mostrar el resultado de la operación indicando cuáles han sido los números, las
operaciones elegidas y el resultado en la ejecución actual y los números y las operaciones
elegidas en la ejecución anterior a la actual. */


if (isset($_POST["enviar"])) {

    $num1 = $_POST["numero1"];
    echo "$num1 <br>";

    $num2 = $_POST["numero2"];
    echo "$num2 <br>";

    $operaciones = $_POST["operacion"];

    foreach ($operaciones as $operacion) {
        switch ($operacion) {
            case 'suma':
                echo "La suma de $num1 y $num2 es ".$num1 + $num2. "<br><br>"; 
                break;
            case 'resta':
                echo "La resta de $num1 y $num2 es ".$num1 - $num2. "<br><br>"; 
                break;
            case 'multiplicación':
                echo "La multiplicación de $num1 y $num2 es ".$num1 * $num2. "<br><br>"; 
                break;
            case 'división':
                echo "La división de $num1 y $num2 es ".$num1 / $num2. "<br><br>"; 
                break;
            default:
                "ERROR!";
                break;
        }
    }
    
    foreach ($operaciones as $operacion) {
        echo "$operacion <br>";
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
    <form action="ejercicio3.php" method="post">

        <label for="numero1">Numero 1:</label>
        <input type="text" name="numero1"><br><br>

        <label for="numero2">Numero 2:</label>
        <input type="text" name="numero2"><br><br>

        <select multiple name="operacion[]" id="operacion">Operación:
            <option value="suma">Suma</option>
            <option value="resta">Resta</option>
            <option value="multiplicación">Multiplicación</option>
            <option value="división">División</option>
        </select><br><br>

        <input type="submit" name="enviar" value="Enviar"><br><br>
        <?php
            session_start(); //iniciamos la sesión
            
            if (empty($_SESSION["numero1"]) && empty($_SESSION["numero2"]) && empty($_SESSION["operacion"])) {
                $_SESSION["numero1"] = $_POST["numero1"];
                $_SESSION["numero2"] = $_POST["numero2"];
                $_SESSION["operacion"] = $_POST["operacion"];
            } 
            else {
                $_SESSION["numero1Antiguo"]  = $_SESSION["numero1"];
                $_SESSION["numero1"] = $_POST["numero1"];

                $_SESSION["numero2Antiguo"] = $_SESSION["numero2"];
                $_SESSION["numero2"] = $_POST["numero2"];

                $_SESSION["operacionAntiguo"] = $_SESSION["operacion"];
                $_SESSION["operacion"] = $_POST["operacion"];

                echo "Los datos anteriormente introducidos son: ",  $_SESSION["numero1Antiguo"], ", ", $_SESSION["numero2Antiguo"]
                , ", ", implode(", ",$_SESSION["operacionAntiguo"]);
            }
            // Cambia "cliente nuevo" por el valor introducido en el Text
        ?>

    </form>
</body>
</html>