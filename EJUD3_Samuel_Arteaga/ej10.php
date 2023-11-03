<?php 
/**
 * @author Samuel Arteaga López <samu.ar.lo.04@gmail.com> 
 */

/*10. Genera un número entre 1 y 20 y calcula su sumatorio. Nota: El sumatorio de un número es la
suma de él mismo con sus anteriores. Ejemplo ∑3=3+2+1=6*/ 

$num = mt_rand(1, 20); //generamos numero aleatorio entre 1 y 20
$contador = $num; // igualamos el contador al numero 
$sumatorio = 0; // la variable sumatorio a 0

do {
    $sumatorio = $sumatorio + $contador; // calculamos el sumatorio más el contador
    $contador --; // vamos restando el contador
} while ($contador >= 1); // mientras se cumpla la condicion de que el contador sea mayor a 1

echo "Sumatorio de Σ $num = $sumatorio \n";  // imprimimos el factorial


?>