<?php 
/** 
 * @author Samuel Arteaga López <samu.ar.lo.04@gmail.com>
*/
/**12. Crear un programa para introducir números por teclado mientras su suma no alcance o iguale a
1000. Cuando ésto ocurra, debes mostrar los números introducidos, cuántos son, el total de la
suma y la media de todos ellos. */

$numArr = []; //creamos el array vacio
do { /**En un do while introducimos los numeros en el array y almacenamos en una variable la suma del array */
    $num = readline("Introduce los numeros: ");
    array_push($numArr, $num);
    $sumArray = array_sum($numArr);
} while ($sumArray < 1000); // mientras no sea 1000 el numero que pedimos o el numero total de la suma del array seguiremos iterando

$totalSum = array_sum($numArr); // almacenamos en una variable la media y la suma
$media = array_sum($numArr)/ count($numArr);
echo "Numeros introducidos: ". implode(", ", $numArr). "\n";
echo "Cantidad de numeros: ".count($numArr). "\n";
echo "Total de la suma: ". $totalSum. "\n";
echo "Media: ". $media. "\n";
// imprimimos todo lo que nos pide el ejercicio: los numeros introducidos,  cantidad de numeros, el total de la suma y la media
?>