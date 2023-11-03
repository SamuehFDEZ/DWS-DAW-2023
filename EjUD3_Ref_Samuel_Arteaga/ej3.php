<?php 
/** 
 * @author Samuel Arteaga López <samu.ar.lo.04@gmail.com>
*/
/**3. Escribe un programa que calcule la media aritmética de 7 notas y la muestre junto con su
correspondencia en el boletín que has realizado en el ejercicio anterior*/

$notas = 7; 
$arrNotas = []; //Declaramos un array vacio en el que almacenar
for ($i=0; $i < $notas; $i++) { //recorremos el for 7 veces pues es el numero de notas
    $pedirNota = readline("Escribe las notas: "); //pedimos las notas

    array_push($arrNotas, $pedirNota); //introducimos las notas dentro del array

    $total = (array_sum($arrNotas))/$notas; //sumamos todos los valores del array y lo dividimo entre 7

}

echo "La media aritmética es $total \n"; //imprimimos el resultado
?>