<?php 
/**
 * @author Samuel Arteaga López <samu.ar.lo.04@gmail.com>
 */

/**23. Dado un vector asociativo de trabajadores con su salario creado solicitando al usuario el nombre
y salario de cada trabajador, crea usando funciones el salario máximo, el salario mínimo y el
salario medio.*/


// Vector asociativo para almacenar los trabajadores y sus salarios
$trabajadores = array();

// Solicitar al usuario los nombres y salarios de los trabajadores
$workers = readline("Ingrese un numero de trabajadores: ");

for ($i=0; $i < $workers; $i++) { 
    $nombre = readline("Ingrese el nombre del trabajador: ");
    $salario = floatval(readline("Ingrese el salario de $nombre: "));
    $trabajadores[] = $salario;

}
    
$salarioMaximo = max($trabajadores);
$salarioMinimo = min($trabajadores);
$salarioMedio = array_sum($trabajadores) / count($trabajadores);

echo "Salario máximo: $salarioMaximo" . "\n";
echo "Salario mínimo: $salarioMinimo" . "\n";
echo "Salario medio: $salarioMedio" . "\n";
?>