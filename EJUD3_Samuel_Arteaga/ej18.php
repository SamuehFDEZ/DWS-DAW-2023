<?php 
/**
 * @author Samuel Arteaga López <samu.ar.lo.04@gmail.com>
*/

/**18. Escribe un programa que diga cuál es la cifra que está en el centro (o las dos del centro si el
número de cifras es par) de un número entero introducido por teclado
 */

$numero = readline("Escribe el número: "); // Pedimos el numero por pantalla

$numString = str_split($numero); // pasamos el numero por pantalla a un array de strings

$longitud = count($numString); //almacenamos en longitud la lenght del array

if ($longitud % 2 == 0) { // si es par obtenemos las cifras del medio 
    $centro1 = $numString [($longitud / 2)-1];
    $centro2 = $numString [ $longitud / 2];
    echo "El centro de las cifras es $centro1 y $centro2 \n";
}
else{ // sino obtenemos unicamente la cifra
    $centro = $numString[$longitud / 2];
    echo "La cifra del centro es $centro \n";
}

?>