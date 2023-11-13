<?php
/**
 * @author Samuel Arteaga López <samu.ar.lo.04@gmail.com>
 */

if (isset($_GET["enviar"])) {
    // Get the input values as strings
    $trabajadores = $_GET["trabajadores"];
    $salario = $_GET["salario"];

    //con explode dividimos el contenido del input
    //
    $trabajadoresArray = explode(",", $trabajadores);
    $salariosArray = explode(",", $salario);

    // crea un array asociativo donde los trabajadores son el indice y los salarios el valor
    /**Por ejemplo
     * 
     * array(
     *  "Samuel" => 1200
     *  "Carlos" => 2000
     * )
     * 
     * 
     */
    $trabajadores = array_combine($trabajadoresArray, $salariosArray);

    $salarioMaximo = max($salariosArray);
    $salarioMinimo = min($salariosArray);
    $salarioMedio = array_sum($salariosArray) / count($salariosArray);

    echo "Salario máximo: $salarioMaximo" . "<br>";
    echo "Salario mínimo: $salarioMinimo" . "<br>";
    echo "Salario medio: $salarioMedio" . "<br>";
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
    <form action="ejercicio10.php" method="get">
        <label for="trabajadores">Introduce el nombre de los trabajadores (separados por coma):</label><br><br>
        <input type="text" name="trabajadores"><br><br>
        <label for="salario">Introduce el salario de los trabajadores (separados por coma):</label><br><br>
        <input type="text" name="salario"><br><br>
        <input type="submit" name="enviar" value="Enviar"><br><br>
    </form>
</body>
</html>
