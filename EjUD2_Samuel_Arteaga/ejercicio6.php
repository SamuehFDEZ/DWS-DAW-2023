<?php
/**
 * @author Samuel Arteaga López <samu.ar.lo.04@gmail.com>
 */

/*6. Calcula la media de varios números (mínimo 5) y redondea el resultado. Muestra los números
introducidos y el resultado*/ 

$n1 = readline("Ingrese un número: "); // leemos el numero
$n2 = readline("Ingrese otro número: "); // leemos el numero
$n3 = readline("Ingrese otro número: "); // leemos el numero
$n4 = readline("Ingrese otro número: "); // leemos el numero
$n5 = readline("Ingrese otro número: "); // leemos el numero

$media = ($n1+$n2+$n3+$n4+$n5) / 5; // sacamos la media de los numeros

echo "Números introducidos: $n1, $n2, $n3, $n4, $n5 \n"; //imprimimos los numeros introducidos
echo "La media redondeada es: ". round($media)."\n"; //imprimimos la media redondeada

?>
