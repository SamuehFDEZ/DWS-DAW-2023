<?php 
/**
 * @author Samuel Arteaga López <samu.ar.lo.04@gmail.com> 
 */

/*9. Genera un número entre 1 y 15 y calcula su factorial. Nota: El factorial de un número es la
multiplicación de él mismo con sus anteriores. Ejemplo 3!=3*2*1=6*/


$num = rand(1, 15); //generamos numero aleatorio entre 1 y 15
$contador = $num; // para el contador restamos el numero - 1
$factorial = 1; // inicializamos el factorial a 1

do {
    $factorial = $factorial * $contador; // calculamos el factorial por el contador
    $contador --; // vamos restando el contador

} while ($contador >= 1); // mientras se cumpla la condicion de que el contador sea mayor a 1

echo "Factorial de $num! = $factorial \n";  // imprimimos el factorial

?>