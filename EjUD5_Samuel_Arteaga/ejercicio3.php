<?php 
/**
 * @author Samuel Arteaga López <samu.ar.lo.04@gmail.com>
 */
/**3. Ejercicios 11 y 12 unirlos en una calculadora de euros que convierta de euros a pesetas y de
pesetas a euros según lo que elija el usuario (de forma excluyente) y por la cantidad que
introduzca. Comprueba que los datos introducidos son los esperados */


$calcular = $_GET["boton"];

$euros = $_GET["euros"];
$peseta = $_GET["peseta"];

$conversor = $_GET["conversor"];


if($conversor === "peseta"){
    $resultados = $euros/166.386;
    echo "La cantidad de pesetas a euros es ". round($resultados, 4). " euros\n";
}


if($conversor === "euro"){
    $resultado = $euros*166.386;
    echo "La cantidad de euros a pesetas es ". round($resultado, 4). " pesetas\n";
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
    <form action="ejercicio3.php" method="get">
                <label for="conversorEuros">Introduce la cantidad:</label><br><br>

                <input type="radio" name="conversor" value="euro" >Euros<br><br>
                <input type="radio" name="conversor" value="peseta" >Pesetas<br><br>

                <input type="text" name="euros"><br><br>

                <p>1€ equivale a 166.386 pesetas</p>
                <p>1pta equivale a 0.0060 euros</p>

                <input type="submit" name="boton" value="calcular"><br><br>
    </form>
</body>
</html>