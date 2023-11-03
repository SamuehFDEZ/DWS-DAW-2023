<?php 

/**
 * @author Samuel Arteaga López <samu.ar.lo.04@gmail.com>
 */

/*4. Escribe un programa que calcule el salario semanal de un trabajador teniendo en cuenta que las
horas ordinarias (40 primeras horas de trabajo) se pagan a 12 euros la hora. A partir de la hora
41, se pagan a 16 euros la hora.*/

$horas = readline("Escribe las horas trabajadas para averiguar el salario: "); //Pedimos por teclado el numero de horas trabajadas


//Si son iguales o inferior 41 h multiplicamos las horas *12 y obtenemos el salario, en caso
// contrario multiplicamos por 16
if ($horas <= 40) {
    $salario = $horas*12;

    echo $salario."\n";
}
else{
    $horasExtra = $horas - 40;

    $salario = (40*12) + ($horasExtra*=16);

    echo $salario ."\n";
}


?>