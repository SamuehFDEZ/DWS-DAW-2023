<?php
/**
 * @author Samuel Arteaga López <samu.ar.lo.04@gmail.com>
 */

 /*7. Ordena 3 números de modo que se impriman de mayor a menor. Si son iguales debe mostrar
una advertencia indicando que son iguales*/

$n1 = readline("Ingrese un número: "); // leemos el numero
$n2 = readline("Ingrese otro número: "); // leemos el numero
$n3 = readline("Ingrese otro número: "); // leemos el numero

    if ($n1 > $n2 && $n1 > $n3 && $n2 > $n3) {  /*Comprobamos en todos los if que n1 o n2 o n3 sea mayor a los numeros respectivamente*/
        echo "Los núemeros ordenados son: $n1, $n2, $n3 \n"; 
    }
    elseif ($n1 > $n2 && $n1 > $n3 && $n3 > $n2) { // En este por ejemplo comprobamos que n1 sea el mayor pero tambien que n3 sea mayor que n2
        echo "Los núemeros ordenados son: $n1, $n3, $n2 \n"; 

    }
    elseif($n2 > $n1 && $n2 > $n3 && $n3 > $n1){
        echo "Los núemeros ordenados son: $n2, $n3, $n1 \n"; 

    }
    elseif ($n2 > $n1 && $n2 > $n3 && $n1 > $n3) {
        echo "Los núemeros ordenados son: $n2, $n1, $n3 \n"; 
    }
    elseif ($n3 > $n1 && $n3 > $n2 && $n1 > $n2) {
        echo "Los núemeros ordenados son: $n3, $n1, $n2 \n"; 
    }
    elseif ($n3 > $n1 && $n3 > $n2 && $n2 > $n1) {
        echo "Los núemeros ordenados son: $n3, $n2, $n1 \n"; 
    }
    elseif($n1 == $n2 || $n1 == $n3 || $n2 == $n3){
        echo "Hay números iguales!!\n";  
    }


?>