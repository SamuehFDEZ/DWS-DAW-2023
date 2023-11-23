<?php

/**
 * @author Samuel Arteaga López <samu.ar.lo.04@gmail.com>
 */
/*Ejercicios de Expresiones Regulares: debes probar con preg_match el patrón que hayas
generado con una cadena válida y una cadena no válida. */

function validar($expresion, $cadena){
    if(preg_match($expresion ,$cadena)){
        echo "Expresión correcta". "\n";
    
    }
    else{ 
        echo "Expresión incorrecta". "\n";
    
    }
}


/*a) Genera el patrón para los teléfonos fijos de la provincia de Valencia*/

$cadena1a = "+34898789123";
$cadena2a = "+34198789123";
$expresiona = "/^(\+34|0034|34)?(8|9)([0-9]){8}/";

echo "VALIDAR TELEFONO FIJO\n";
echo "\n";

validar($expresiona, $cadena1a);
validar($expresiona, $cadena2a);


/*b) Genera el patrón para los códigos postales de la Comunidad Valenciana*/


$cadena1b = "46200";
$cadena2b = "1111";
$expresionb = "/^(([1-4][0-9][0-9][0-9][0-9])|(0(?=[1-9][0-9][0-9][0-9]))|(5(?=[0-2][0-9][0-9][0-9])))/";

echo "\n";

echo "CODIGO POSTAL\n";

echo "\n";

validar($expresionb, $cadena1b);
validar($expresionb, $cadena2b);

// /*c) Genera el patrón para los teléfonos móviles*/


$cadena1c = "+34698789123";
$cadena2c = "+34898789123";
$expresionc = "/^(\+34|0034|34)?(6|7)([0-9]){8}/";

echo "\n";

echo "TELEFONOS MOVILES\n";

echo "\n";

validar($expresionc, $cadena1c);
validar($expresionc, $cadena2c);

// /*d) Genera el patrón para un NIF*/


$cadena1d = "53892854J";
$cadena2d = "038928545";
$expresiond = "/^[0-9]{8}[A-Z]/";

echo "\n";

echo "DNI\n";

echo "\n";

validar($expresiond, $cadena1d);
validar($expresiond, $cadena2d);

// /*e) Genera el patrón para fecha en formato dd/mm/aaaa o bien dd-mm-aaaa*/

$cadena1e = "01/12/2004";
$cadena2e = "32/01/3000";
$expresione = "/^(0[1-9]|[1-2][0-9]|3[0-1])[-\/](0[1-9]|1[0-2])[-\/](\d{4})/";

echo "\n";

echo "FECHA\n";

echo "\n";

validar($expresione, $cadena1e);
validar($expresione, $cadena2e);


// /*f) Genera el patrón para una cadena que sea aprobado (puede ser mayúsculas o minúsculas)*/

$expresionf = "/^aprobado$/i";

// g) Genera el patrón para una cadena que contenga aprobado en minúsculas

$expresiong = "/^aprobado/";

// h) Genera el patrón para una cadena que contenga aprobado tanto en mayúsculas como en minúsculas

$expresionh = "/^aprobado/i";

// i) Genera el patrón para letras mayúsculas/minúsculas y espacios

$expresioni = "/^[a-zA-Z\s]+$/";

// j) Genera el patrón para solamente números, sin espacios

$expresionj = "/^[0-9]+$/";

// k) Genera el patrón para números con espacios

$expresionk = "/^[0-9\s]+$/";

// l) Genera el patrón para texto en blanco, números, mayúsculas/minúsculas y caracteres acentuados

$expresionl = "";

// m) Genera el patrón para el caso anterior añadiendo los signos de puntuación: comillas simples, coma, punto, punto y coma, dos puntos y guiones

$expresionm = "";

// n) Genera el patrón para validar una dirección de email

$expresionn = "";

// o) Genera el patrón para validar una URL sencilla (http://www.ieslasenia.org/ejercicio?16)

$expresiono = "";

// p) Genera el patrón para validar una contraseña con al menos un carácter en minúscula, una mayúscula, un número y al menos 6 caracteres de longitud

$expresionp = "";


// q) Genera el patrón para validar una IPv4

$expresionq = "";


// r) Genera el patrón para validar una MAC separada por :

$expresionr = "";


// s) Genera el patrón para validar una MAC separada por -

$expresions = "";


// t) Genera el patrón para validar una matrícula de vehículo española

$expresiont = "";


?>