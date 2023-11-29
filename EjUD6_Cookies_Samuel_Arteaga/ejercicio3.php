<?php 

/**
 * @author Samuel Arteaga López <samu.ar.lo.04@gmail.com>
 */

/**3. Usa el formulario (Ejercicio 1 UD5) del selector de operación y las operaciones de suma, resta,
división y multiplicación de modo que se guarde en la Cookie las operaciones elegidas y
muestre el resultado de la operación indicando cuáles han sido las operaciones elegidas en la
ejecución actual (formulario) y las elegidas en la operación anterior a la actual (cookie). */


if (isset($_POST["enviar"])) {

    $cookie_name = "miCookie";

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
    
    
    $cookie_value = $num1. ", ".$num2. ", ". implode(", ", $operaciones);  

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
    <form action="ejercicio3.php" method="post">

        <label for="numero1">Numero 1:</label>
        <input type="text" name="numero1"><br><br>

        <label for="numero1">Numero 2:</label>
        <input type="text" name="numero2"><br><br>

        <select multiple name="operacion[]" id="operacion">Operación:
            <option value="suma">Suma</option>
            <option value="resta">Resta</option>
            <option value="multiplicación">Multiplicación</option>
            <option value="división">División</option>
        </select><br><br>

        <input type="submit" name="enviar" value="Enviar"><br><br>
        <?php
            if (!isset($_COOKIE[$cookie_name])) {
                echo "El nombre de la cookie " . $cookie_name . " no está definida!";
            } 
            else {
                echo "Cookie " .  $cookie_name . " está definida!<br>";
                    
                echo "Los valores de la cookie son: " . $_COOKIE[$cookie_name];

                
            }
        ?>

    </form>
</body>
</html>