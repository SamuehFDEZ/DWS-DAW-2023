<?php 
/**
 * @author Samuel Arteaga López <samu.ar.lo.04@gmail.com> 
 */

/*11. Diseña un programa para imprimir los números impares menores que N*/

$n = readline("Escribe el número: "); // leemos el numero por pantalla

for ($i=1; $i <= $n; $i++) { // recorremos el for hasta el numero que introducimos por pantalla

    if ($i %2 != 0) { // filtramos los numeros impares porque al dividirlos
        echo $i."\n"; // imprimimos los numeros impares
    }
}

?>