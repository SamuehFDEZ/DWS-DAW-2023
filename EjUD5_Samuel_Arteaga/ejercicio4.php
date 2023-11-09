<?php 
/**
 * @author Samuel Arteaga López <samu.ar.lo.04@gmail.com>
 */
/**4. Ejercicio 4. Escribe un programa que calcule el salario semanal de un trabajador teniendo en
cuenta que las horas ordinarias (40 primeras horas de trabajo) se pagan a 12 euros la hora. A
partir de la hora 41, se pagan a 16 euros la hora. */

$horas = $_GET["horas"];

if ($horas <= 40) {
    $salario = $horas*12;

    echo $salario." €\n";
}
else{
    $horasExtra = $horas - 40;

    $salario = (40*12) + ($horasExtra*=16);

    echo $salario ." €\n";
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
    <form action="ejercicio4.php" method="get">
        <label for="horas">Introduce las horas trabajadas:</label><br><br>
        <input type="text" name="horas"><br><br>
        <input type="submit" value="Enviar"><br><br>


    </form>
</body>
</html>