<?php
/**
 * @author Samuel Arteaga López <samu.ar.lo.04@gmail.com>
 */

/*4. Dados dos números enteros realizar operaciones de suma, resta, división y multiplicación y
mostrar los resultados por pantalla concatenando la operación y el resultado*/

$entero1 = readline("Ingresa el primer operando: "); //Usamos readline() para obtener el numero1 por terminal
$entero2 = readline("Ingresa el segundo operando: "); //Usamos readline() para obtener el numero2 por terminal

$resultado = $entero1 + $entero2; //dentro de la variable resultado almacenamos la suma de los dos numeros

echo "La suma de ". $entero1. " + ". $entero2 ." da ". $resultado. "\n"; //imprimimos el resultado

$resultado = $entero1 - $entero2; //dentro de la variable resultado almacenamos la resta de los dos numeros

echo "La resta de ". $entero1. " - ". $entero2 ." da ". $resultado. "\n"; //imprimimos el resultado

$resultado = $entero1 * $entero2; //dentro de la variable resultado almacenamos la multiplicación de los dos numeros

echo "La multiplicación de ". $entero1. " * ". $entero2 ." da ". $resultado. "\n"; //imprimimos el resultado

$resultado = $entero1 / $entero2; //dentro de la variable resultado almacenamos la división de los dos numeros

echo "La división de ". $entero1. " / ". $entero2 ." da ". $resultado. "\n"; //imprimimos el resultado

?>