<?php 
/** 
 * @author Samuel Arteaga López <samu.ar.lo.04@gmail.com>
*/
/**9. Crear una matriz de tamaño 5x5 y rellenarla de la siguiente forma: la posición M[n,m] debe
contener n+m. Después se debe mostrar su contenido. */

$M = []; // creamos el array


for ($i=0; $i < 5; $i++) {  //recorremos hasta 5 el cuál son las filas 
    for ($j=0; $j < 5; $j++) { 
        $M[$i][$j] = $i+$j; // en la posicion: fila 1 columna 1 sumamos los valores
    }
}

for ($i=0; $i < 5; $i++) { 
    for ($j= 0; $j < 5; $j++) {
        echo ($M[$i][$j]. " "); // recorremos otros dos fors para imprimir la matriz con su espaciado y salto de linea 
    }
    echo " \n";
}

?>