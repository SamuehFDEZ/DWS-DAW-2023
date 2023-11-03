<?php 
/**
 * @author Samuel Arteaga López <samu.ar.lo.04@gmail.com>
 */

 /**24. Con los trabajadores del ejercicio anterior, calcular el salario actual y el salario aumentado un
porcentaje indicado por la variable. */


// Creamos un vector asociativo para almacenar los trabajadores y sus salarios
$trabajadores = array();

// Solicitamos al usuario los nombres y salarios de los trabajadores
$workers = readline("Ingrese un número de trabajadores: ");

for ($i = 0; $i < $workers; $i++) { // recorremos un for en base al numero de trabajadores y preguntamos el salario de ese trabajador, en un array almacenamos los trabajadores y sus respectivos salarios
    $nombre = readline("Ingrese el nombre del trabajador: ");
    $salario = floatval(readline("Ingrese el salario de $nombre: "));
    $trabajadores[$nombre] = $salario;
}

// indicamos el porcentaje de aumento
$porcentajeAumento = readline("Escribe el aumento: "); // Puedes cambiar este valor según tus necesidades

// Calculamos el salario actual y el salario aumentado para cada trabajador y lo imprimimos
foreach ($trabajadores as $nombre => $salario) {
    $salarioActual = $salario;
    $aumento = ($salario * $porcentajeAumento) / 100;
    $salarioAumentado = $salario + $aumento;

    echo "Trabajador: $nombre" . "\n";
    echo "Salario actual: $salarioActual" . "\n";
    echo "Salario aumentado ($porcentajeAumento% de aumento): $salarioAumentado" . "\n";
    echo "\n";
}
?>


