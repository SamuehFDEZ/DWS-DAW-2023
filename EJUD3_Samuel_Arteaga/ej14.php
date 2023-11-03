<?php 
/**
 * @author Samuel Arteaga López <samu.ar.lo.04@gmail.com>
*/

/**
 * 14. Escribe una función que calcule todas las potencias de un 
 * número hasta llegar al exponente
 *  indicado, las almacene en un vector y muestre el resultado de 
 *  cada potencia indicando además
 *  la suma de todas las potencias incluyendo la del exponente 
 *  indicado.
 */

 //Creamos una funcion con parametros del numero y su exponente
function numPotencias($num, $exp){
    $vector = []; //declaramos el vector vacio

    for ($i=0; $i <= $exp; $i++) {  //recorremos el for el mismo numero de veces que exponentes hay
        $res = $num ** $i; // en una variable llamada res almacenamos el calculo
        array_push($vector, $res); // almacenamos la variable res dentro del array con arra_push
        echo "$num ^ $i = $res \n"; //imprimimos el resultado con a ^ b = res
    }
    $sumaDePotencias = array_sum($vector); // con array_sum almacenamos la suma de los exponentes
    echo "Suma de las potencias = $sumaDePotencias"; //imprimimos la suma de las potencias
}

numPotencias(4,4); //invocamos a la funcion

?>