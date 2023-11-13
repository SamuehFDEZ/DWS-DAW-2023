<?php 
/**
 * @author Samuel Arteaga López <samu.ar.lo.04@gmail.com>
 */

 /**11. Ejercicio 24 Con los trabajadores del ejercicio anterior,
calcular el salario actual y el salario
aumentado un porcentaje indicado por el usuario */

if (isset($_GET["enviar"])) {
    // Get the input values as strings
    $salarioActual = $_GET["salarioActual"];
    $salarioPorcent = $_GET["salarioPorcent"];


    $salarioAumentado = ($salarioPorcent/100)*$salarioActual;

    echo "Salario : $salarioActual euros<br>";
    echo "Salario aumentado un $salarioPorcent %:". $salarioActual + $salarioAumentado ." euros<br>";

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
    <form action="ejercicio11.php" method="get">
        <label for="salarioActual">Introduce el salario actual</label><br><br>
        <input type="text" name="salarioActual"><br><br>

        <label for="salarioPorcent">Introduce el porcentaje a aumentar el salario</label><br><br>
        <input type="text" name="salarioPorcent"><br><br>

        <input type="submit" name="enviar" value="Enviar">
    </form>
</body>
</html>