<?php 
/**
 * @author Samuel Arteaga López <samu.ar.lo.04@gmail.com>
 */

/*5. Realiza un programa que resuelva una ecuación de primer grado (del tipo ax + b = 0)*/

$a = readline("Introduce el número a: "); //Pedmos por pantalla a
$b = readline("Introduce el número b: "); //Pedmos por pantalla b

$x = -$b / $a; // realizamos la operación
/*
Al ser una ecuación de primer grado hay que despejar la x, 
pasamos b al lado de 0 y pasa a ser negativo, luego como, a está 
multiplicando pasa al otro lado dividiendo quedando de la misma forma de
arriba:  $x = -$b / $a;

*/

echo "El resultado de la ecuación es ". $x."\n"; // Imprimimos el resultado de x


?>