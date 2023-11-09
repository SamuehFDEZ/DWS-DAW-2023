<?php 
/**
 * @author Samuel Arteaga López <samu.ar.lo.04@gmail.com>
 */
/**2. Ejerccicio 8: Genera un mensaje de modo que si el día seleccionado o introducido es menor o
igual que 15 muestre “primera quincena” mostrando “segunda quincena” en otro caso. */

$dia = $_GET["numDia"];

echo "$dia \n";

if ($dia <= 15) { // Comprobamos si el dia actual es menor o igual a 15 
    echo " Primera quincena \n"; // Imprimimos el dia y primera/segunda quincena accediendo a la posición del array
}
else{
    echo " Segunda quincena \n";
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
    <form action="ejercicio2.php" method="get">
        <label for="numDia">Introduce el dia:</label><br><br>
        <input type="text" name="numDia"><br><br>
        <input type="submit" value="Enviar"><br><br>
    </form>
</body>
</html>