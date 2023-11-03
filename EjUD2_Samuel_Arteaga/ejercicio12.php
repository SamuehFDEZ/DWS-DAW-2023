<?php 
/**
 * @author Samuel Arteaga López <samu.ar.lo.04@gmail.com>
 */
/*12.Crea un conversor de monedas de pesetas a euros usando variables para almacenar el resultado*/

$peseta = readline("Ingresa cuantas pesetas para pasarlo a euros: \n"); //Mediante readline pedimos las pesetas

$euro = $peseta/166.386; // Obtenemos la formula para hacer la conversion

echo $peseta ." pesetas son ". round($euro,2). " euro/s\n" //Imprimimos la equivalencia y redondeamos los euros

?>