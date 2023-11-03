<?php 
/**
 * @author Samuel Arteaga López <samu.ar.lo.04@gmail.com>
 */
/*9. Realiza un programa que diga si un número entero positivo introducido por teclado es capicúa.
Se permiten números de hasta 5 cifras*/

$capicua = readline("Introduce un númeoro para averiguar si es capicua o no: "); //pedimos por pantalla el numero

$numInvertido = 0; //inicializamos la variable a 0 que luego nos servirá para almacenar el numero que pasemos pero al reves
$cociente = $capicua; // almacenamos el numero por pantalla en la variabe capicua

do {
    $resto = $cociente % 10; //almacenamos la ultima cifra de cociente en resto
	$numInvertido = $numInvertido * 10 + $resto; // calculamos el num invertido con el resto
	$cociente = (int)($cociente / 10); //parseamos cociente a int y lo dividimos entre 10

} while ( $cociente != 0); //mientras que cociente no sea 0

if ( $capicua == $numInvertido ) // si coinciden es capicua
	echo "El número $capicua es capicua \n";
else
	echo "El número $capicua no es capicua \n";

?>