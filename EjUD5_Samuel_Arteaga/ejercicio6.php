<?php 
/**
 * @author Samuel Arteaga López <samu.ar.lo.04@gmail.com>
 */
/**6. Ejercicio 4: Elabora un programa para determinar si una hora leída en la forma horas, minutos
y segundos está correctamente expresada. Utiliza funciones para la comprobación de datos */

$hora = $_GET["hora"];
$minutos = $_GET["minutos"];
$segundos = $_GET["segundos"];

//comprobamos que cada variable no se pase de sus respectivos limites
if (isset($_GET["enviar"])) {
    if ($hora > 0 && $hora < 24 && $minutos > 0 && $minutos < 60 && $segundos > 0 && $segundos < 60) {
        echo "Hora introducida correctamente: $hora:$minutos:$segundos \n";
    
    }
    else{
        echo "Hora introducida incorrectamente \n";
    
    }
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
    <form action="ejercicio6.php" method="get">
        <br>
        <label for="hora">Introduce la hora:</label><br><br>
        <input type="text" name="hora"><br><br>
        <label for="minutos">Introduce la hora:</label><br><br>
        <input type="text" name="minutos"><br><br>
        <label for="segundos">Introduce la hora:</label><br><br>
        <input type="text" name="segundos"><br><br>
        <input type="submit" name="enviar" value="Enviar">
    </form>
    
</body>
</html>