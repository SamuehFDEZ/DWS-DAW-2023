<?php 
/**
 * @author Samuel Arteaga López <samu.ar.lo.04@gmail.com> 
 */

 /*
 2. Dada la fecha del sistema, indicar las horas, minutos y segundos junto con el día de la semana
 */

 $fecha = time();  // con el metodo time almacenamos en la variable fecha la hora del pc
 
 echo date("d-m-Y (H:i:s)", $fecha)."\n"; //imprimimos el formato de date con la variable fecha
 

?>