<?php 
/** 
 * @author Samuel Arteaga López <samu.ar.lo.04@gmail.com>
*/
/**4. Muestra los múltiplos de 5 entre 0 y 100 usando:
a) bucle for
b) bucle while
c) bucle do-while*/

$i=0; //inicializamos a 0

for ($i=0; $i <= 100; $i++) { /**Recorremos todos los bucles hasta 100 e imprimimos los múltiplos de 5 mediante la condición del if */
    if ($i %5== 0) {
        echo "$i\n";
    }
}


while ($i <= 100) {
    if ($i %5== 0) {
        echo "$i\n";
    }
    $i++;
}


do {
    if ($i %5== 0) {
        echo "$i\n";
    }
    $i++;
} while ($i <= 100);


?>