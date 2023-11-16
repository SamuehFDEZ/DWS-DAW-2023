<?php
/**
 * Ejercicio 23: Dado un vector asociativo de trabajadores con su salario,
 * crea usando funciones y a criterio del usuario, el salario máximo, el salario mínimo
 * y el salario medio. (puede elegir uno de ellos, varios o todos)
 *
 * @author Samuel Arteaga López <samu.ar.lo.04@gmail.com>
 */

if (isset($_GET["enviar"])) {
    // Obtén los valores del formulario
    $trabajadores = $_GET["trabajadores"];
    $salarios = $_GET["salario"];

    // Divide los valores en arrays usando explode
    $trabajadoresArray = explode(",", $trabajadores);
    $salariosArray = explode(",", $salarios);

    // Crea un array asociativo con los trabajadores y sus salarios
    $trabajadoresSalarios = array_combine($trabajadoresArray, $salariosArray);

    // Funciones para calcular el salario máximo, mínimo y medio
    function salarioMaximo($arraySalarios){
        return max($arraySalarios);
    }

    function salarioMinimo($arraySalarios){
        return min($arraySalarios);
    }

    function salarioMedio($arraySalarios){
        return array_sum($arraySalarios) / count($arraySalarios);
    }

    // Calcular los resultados
    $salarioMaximo = salarioMaximo($salariosArray);
    $salarioMinimo = salarioMinimo($salariosArray);
    $salarioMedio = salarioMedio($salariosArray);

    // Mostrar los resultados
    echo "Salario máximo: $salarioMaximo" . "<br>";
    echo "Salario mínimo: $salarioMinimo" . "<br>";
    echo "Salario medio: $salarioMedio" . "<br>";
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
    <form action="ejercicio10.php" method="get">
        <label for="trabajadores">Introduce el nombre de los trabajadores (separados por coma):</label><br><br>
        <input type="text" name="trabajadores"><br><br>
        <label for="salario">Introduce el salario de los trabajadores (separados por coma):</label><br><br>
        <input type="text" name="salario"><br><br>
        <input type="submit" name="enviar" value="Calcular"><br><br>
    </form>
</body>
</html>
