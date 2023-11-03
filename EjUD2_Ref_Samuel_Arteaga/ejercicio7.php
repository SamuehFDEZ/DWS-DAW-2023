<?php 

/**
 * @author Samuel Arteaga López <samu.ar.lo.04@gmail.com>
 */

/*7. Escribe un programa que diga cuál es la última cifra de un número entero introducido por
teclado*/

$numero = readline("Escribe el número para saber su última cifra: ");

// El operador modulo (%) nos hace la siguiente operación
// Por ejemplo pasamos el numero 5445, si lo dividimos entre 10
// Obtenemos 544,5 => de ahí obtenemos la ultima cifra, la cual es el 5  
$numero = $numero % 10;
echo "la ultima cifra es: $numero \n";



?>