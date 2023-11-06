<?php 
/**
 * @author Samuel Arteaga López <samu.ar.lo.04@gmail.com>
 */
/*Ejercicios de la UD2:
1. Ejercicio 4 añadiendo selector de operación a aplicar (pueden seleccionarse mínimo una o
todas las operaciones): Dados dos números enteros realizar operaciones de suma, resta, división y
multiplicación y mostrar los resultados por pantalla concatenando la operación (expresión con
operandos y operador) y el resultado. Comprueba que los datos introducidos son los esperados*/

$num1 = $_GET["numero1"];
$num2 = $_GET["numero2"];
$operaciones = $_GET["operacion"];

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

?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Samuel Arteaga</title>
</head>
<body>
    <form action="ejercicio1.php" method="get" enctype="multipart/form-data">

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

        <input type="submit" value="Enviar">
    </form>
</body>
</html>