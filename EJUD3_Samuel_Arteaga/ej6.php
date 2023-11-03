<?php 
/**
 * @author Samuel Arteaga López <samu.ar.lo.04@gmail.com> 
 */

 /*6. Escribe un programa que lea tres números positivos y compruebe si son iguales. Por ejemplo:
* Si la entrada fuese 5 5 5, la salida debería ser “hay tres números iguales a 5“.
* Si la entrada fuese 4 6 4, la salida debería ser “hay dos números iguales a 4“.
* Si la entrada fuese 0 1 2, la salida debería ser “no hay números iguales“*/

$num1 = readline("Escribe el primer numero: "); //Pedimos por pantalla el numero1
$num2 = readline("Escribe el segundo numero: "); //Pedimos por pantalla el numero2
$num3 = readline("Escribe el tercer numero: "); //Pedimos por pantalla el numero3


if ($num1 == $num2 && $num1 == $num3 && $num2 == $num3) { //Comparamos si todos los numeros son iguales
    echo "Hay tres números iguales a $num1 \n";
}

if ($num1 == $num3 && $num1 != $num2 || $num1 == $num2 && $num3 != $num2 || $num1 != $num3) { // Comparamos que haya dos numeros iguales en todos los casos
    echo "Hay dos números iguales a $num1 \n";
}

if ($num1 != $num2 && $num2 != $num3 && $num3 != $num1) { // comprobamos que ninguno sea igual
    echo "No hay números iguales \n";
}

?>