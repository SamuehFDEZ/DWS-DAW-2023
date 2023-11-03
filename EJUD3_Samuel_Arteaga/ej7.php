<?php 

/**
 * @author Samuel Arteaga López <samu.ar.lo.04@gmail.com>
*/

/*
 * 7. Calcula, dada la fecha y hora actual y 
 * la fecha y hora deseada, cuántas horas y minutos quedan
 * para dicho momento.
 */


$fechaHoraActual = time(); // Obtiene la hora actual

// Fecha y hora deseada (debes especificarla en formato 'H:i:s')
$fechaHoraDeseada = strtotime(readline("Escribe la fecha: ")); 

// Calcula la diferencia en segundos
$diferenciaSegundos = $fechaHoraDeseada - $fechaHoraActual;

// Calcula las horas y minutos restantes
$horasRestantes = floor($diferenciaSegundos / 3600); 
$minutosRestantes = floor(($diferenciaSegundos % 3600) / 60); 

// Imprime la diferencia en horas y minutos
echo "Horas restantes: $horasRestantes, Minutos restantes: $minutosRestantes";


?>