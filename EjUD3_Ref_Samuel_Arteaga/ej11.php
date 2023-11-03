<?php 
/** 
 * @author Samuel Arteaga López <samu.ar.lo.04@gmail.com>
*/
/**11. Crear y rellenar una tabla de tamaño 10x10, mostrar la suma de cada fila y de cada columna*/


$M = []; // creamos el array

for ($i=0; $i < 10; $i++) {  //recorremos el for para que en las posiciones i, j rellene con la suma de i, j
    for ($j=0; $j < 10; $j++) { 
        
        $M[$i][$j] = $i+$j;
        
    }
}

$suma = 0;
for ($i=0; $i < 10; $i++) {   /*Con estos dos fors imprimimos la tabla 10x10, ademas sumando las filas al final con formato de n,n,n,n,n,n = resultado  */
    for ($j= 0; $j < 10; $j++) {
        echo ($M[$i][$j]. " ");
        $suma += $M[$i][$j];
    }
    echo " = ";
    echo ($suma. " ");
    $suma = 0;
    echo "\n";    
}

?>