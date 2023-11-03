<?php 
/**
 * @author Samuel Arteaga López <samu.ar.lo.04@gmail.com>
 */
/*11. Crea un conversor de monedas de euros a pesetas usando variables para almacenar el resultado*/

$euro = readline("Ingresa cuantos euros para pasarlo a pesetas: \n"); //Mediante readline pedimos los euros

$peseta = $euro*166.386; // Obtenemos la formula para hacer la conversion

echo $euro ." euro/s son ". round($peseta). " pesetas\n" //Imprimimos la equivalencia y redondeamos las pesetas

?>