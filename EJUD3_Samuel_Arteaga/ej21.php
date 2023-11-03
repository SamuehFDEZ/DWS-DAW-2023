<?php 
/**
 * @author Samuel Arteaga López <samu.ar.lo.04@gmail.com>
 */

/**21. Escribe un programa que diga cuál es la penúltima cifra de un número entero introducido por
teclado. Se permiten números de hasta 5 cifras. Puedes usar la función creada para el ejercicio
19 */

$num = readline("Escribe un numero: "); //Pedimos un numero por pantalla
$numero = str_split($num); //lo convertimos en array
$longitud = count($numero) -1;  //obtenemos la longitud -1
echo "La penúltima cifra de $num es ".$numero[$longitud -1] ."\n"; //imroimimos la penultima cifra mediante el doble -1

?>