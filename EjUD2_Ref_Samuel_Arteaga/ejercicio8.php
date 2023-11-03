<?php 
/**
 * @author Samuel Arteaga López <samu.ar.lo.04@gmail.com>
 */
/*8. Escribe un programa que diga cuál es la primera cifra de un número entero introducido por
teclado. Se permiten números de hasta 5 cifras*/


$numero = readline("Escribe el número para saber su primera cifra: ");

/*Parseamos el numero a string
e imprimimos el indice 0 para que siempre nos dé
la primer cifra*/

$numero = (string)$numero;

echo "la primera cifra es: ". $numero[0] ."\n";



?>