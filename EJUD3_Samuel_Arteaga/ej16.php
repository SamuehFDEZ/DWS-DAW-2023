<?php 
/**
 * @author Samuel Arteaga López <samu.ar.lo.04@gmail.com>
*/

/**16. Realiza un programa que resuelva una ecuación de primer grado (del tipo 2(ax - b)=0
 */
$a = readline("Introduce el número a: "); //Pedmos por pantalla a
$b = readline("Introduce el número b: "); //Pedmos por pantalla b


/*Pasos de solución
1. Dividir ambos lados entre 2:
    ax-b=0
2. Mover b al lado derecho 
    ax = b
3. dividir b entre a

x = b / a

*/

$x = $b / $a; // realizamos la operación
/*
Al ser una ecuación de primer grado hay que despejar la x, 
pasamos b al lado de 0 y pasa a ser negativo, luego como, a está 
multiplicando pasa al otro lado dividiendo quedando de la misma forma de
arriba:  $x = -$b / $a;

*/

echo "El resultado de la ecuación es ". $x."\n"; // Imprimimos el resultado de x

 
?>