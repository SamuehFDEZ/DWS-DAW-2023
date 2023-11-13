<?php 
/**
 * @author Samuel Arteaga López <samu.ar.lo.04@gmail.com>
 */
/**9. Ejercicio 8. Crea la tabla de multiplicar de un número indicado por el usuario siendo que el
multiplicador se podrá seleccionar entre 1 y 10. Se multiplicará desde 1 al multiplicador
seleccionado. */


if (isset($_GET["enviar"])) {

    $num = $_GET["numero"];

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
}



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="ejercicio9.php" method="get">
        <label for="numero">Introduce el numero:</label><br><br>
        <input type="number" name="numero" ><br><br>
        <input type="submit" name="enviar" value="Enviar"><br><br>

    </form>
</body>
</html>