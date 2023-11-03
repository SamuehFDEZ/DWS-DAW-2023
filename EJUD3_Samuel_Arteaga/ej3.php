<?php 
/**
 * @author Samuel Arteaga López <samu.ar.lo.04@gmail.com> 
 */

/*3. Crea un programa que reciba una hora expresada en segundos transcurridos desde las 12 de la
noche y la convierta en horas, minutos y segundos*/

$horaEnSegundos = readline("Escribe la hora expresada en segundos: "); // pedimos por pantalla las horas en segundos
 
echo gmdate("H:i:s",$horaEnSegundos);
// con el metodo gmdate lo obtenemos en formato hh:mm:ss

?>