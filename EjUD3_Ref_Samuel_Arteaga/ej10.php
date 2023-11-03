<?php 
/** 
 * @author Samuel Arteaga López <samu.ar.lo.04@gmail.com>
*/
/**10. Crear y rellenar por teclado dos matrices de tamaño 3x3, sumarlas y mostrar su suma. */


$M1 = []; // creamos el array
$M2 = []; // creamos el array

 for ($i=0; $i < 3; $i++) {  /**Primer for para pedir los numeros y almacenarlos en las matrices */
    $entrada1 = readline("Escribe los numeros:"); 
     for ($j=0; $j < 3; $j++) { 
        $M1[$i][$j] = $entrada1;     
        $M2[$i][$j] = $entrada1;     
    }
 }

 for ($i=0; $i < 3; $i++) {  /**Segundo for para sumar las matrices dentro de una variable */
    for ($j=0; $j < 3; $j++) { 
        $suma[$i][$j] = $M1[$i][$j]  + $M2[$i][$j];

     }
 }


for ($i=0; $i < count($M1); $i++) {  /**Tercer for para printear la suma de las dos matrices */
    for ($j= 0; $j < count($M2); $j++) {
        echo ($suma[$i][$j]. " "); 

    }
    echo " \n";
}

?>