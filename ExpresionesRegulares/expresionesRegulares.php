<?php

/**
 * @author Samuel Arteaga López <samu.ar.lo.04@gmail.com>
 */
/*Ejercicios de Expresiones Regulares: debes probar con preg_match el patrón que hayas
generado con una cadena válida y una cadena no válida. */

/*a) Genera el patrón para los teléfonos fijos de la provincia de Valencia*/

$cadena1 = "+34898789123";
$cadena2 = "+34198789123";
$expresion = "/^(\+34|0034|34)?(8|9)([0-9]){8}/";

echo "VALIDAR TELEFONO FIJO\n";
echo "\n";

if(preg_match($expresion ,$cadena1)){
    echo "Expresión correcta". "\n";

}
else{ 
    echo "Expresión incorrecta". "\n";

}

if(preg_match($expresion ,$cadena2)){
    echo "Expresión correcta". "\n";

}
else{ 
    echo "Expresión incorrecta". "\n";

}

/*b) Genera el patrón para los códigos postales de la Comunidad Valenciana*/


$cadena1 = "46200";
$cadena2 = "1111";
$expresion = "/^(([1-4][0-9][0-9][0-9][0-9])|(0(?=[1-9][0-9][0-9][0-9]))|(5(?=[0-2][0-9][0-9][0-9])))/";

echo "\n";

echo "CODIGO POSTAL\n";

echo "\n";

if(preg_match($expresion ,$cadena1)){
    echo "Expresión correcta". "\n";

}
else{ 
    echo "Expresión incorrecta". "\n";

}

if(preg_match($expresion ,$cadena2)){
    echo "Expresión correcta". "\n";

}
else{ 
    echo "Expresión incorrecta". "\n";

}

/*c) Genera el patrón para los teléfonos móviles*/


$cadena1 = "+34698789123";
$cadena2 = "+34898789123";
$expresion = "/^(\+34|0034|34)?(6|7)([0-9]){8}/";

echo "\n";

echo "TELEFONOS MOVILES\n";

echo "\n";

if(preg_match($expresion ,$cadena1)){
    echo "Expresión correcta". "\n";

}
else{ 
    echo "Expresión incorrecta". "\n";

}

if(preg_match($expresion ,$cadena2)){
    echo "Expresión correcta". "\n";

}
else{ 
    echo "Expresión incorrecta". "\n";

}

/*d) Genera el patrón para un NIF*/


$cadena1 = "53892854J";
$cadena2 = "038928545";
$expresion = "/^[0-9]{8}[A-Z]/";

echo "\n";

echo "DNI\n";

echo "\n";

if(preg_match($expresion ,$cadena1)){
    echo "Expresión correcta". "\n";

}
else{ 
    echo "Expresión incorrecta". "\n";

}

if(preg_match($expresion ,$cadena2)){
    echo "Expresión correcta". "\n";

}
else{ 
    echo "Expresión incorrecta". "\n";

}

/*e) Genera el patrón para fecha en formato dd/mm/aaaa o bien dd-mm-aaaa*/


$cadena1 = "53892854J";
$cadena2 = "038928545";
$expresion = "/^[0-9]{8}[A-Z]/";

echo "\n";

echo "DNI\n";

echo "\n";

if(preg_match($expresion ,$cadena1)){
    echo "Expresión correcta". "\n";

}
else{ 
    echo "Expresión incorrecta". "\n";

}

if(preg_match($expresion ,$cadena2)){
    echo "Expresión correcta". "\n";

}
else{ 
    echo "Expresión incorrecta". "\n";

}

?>