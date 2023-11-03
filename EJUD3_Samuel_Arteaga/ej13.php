<?php 
/**
 * @author Samuel Arteaga López <samu.ar.lo.04@gmail.com>
*/

/**
 * 13. Escribe una función que calcule A elevado a B, 
 * siendo A y B números enteros.
 */

function elevadoA($a, $b){ // declaramos la funcion con sus dos parametros de entrada
    return $a ** $b; // elevamos mediante el doble asterisco => **
}

echo elevadoA(2,3); // imprimimos la invocacion de la funcion que nos da el resultado

?>