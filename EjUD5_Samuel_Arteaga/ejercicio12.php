<?php 
/**
 * @author Samuel Arteaga López <samu.ar.lo.04@gmail.com>
 */
/**12. Ejercicio 5. Realiza el control de acceso a una caja fuerte.
La combinación será un número de
4 cifras. El programa nos pedirá la combinación para abrirla. 
Si no acertamos, se nos mostrará el
mensaje “Lo siento, esa no es la combinación” en color rojo y 
si acertamos se nos dirá “La caja
fuerte se ha abierto satisfactoriamente” en color verde. 
Tendremos cuatro oportunidades para
abrir la caja fuerte */


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
    <form action="ejercicio12.php" method="get">





    </form>
</body>
</html>