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

$cadena1f = "APROBADO";
$cadena2f = "apr0bad0";
$expresionf = "/^aprobado$/i";

echo "\n";

echo "CADENA APROBADO (puede ser mayúsculas o minúsculas)\n";

echo "\n";

validar($expresionf, $cadena1f);
validar($expresionf, $cadena2f);



// g) Genera el patrón para una cadena que contenga aprobado en minúsculas

$cadena1g = "aprobado";
$cadena2g = "APROBADO";
$expresiong = "/^aprobado/";

echo "\n";

echo "CADENA aprobado (en minúsculas)\n";

echo "\n";

validar($expresiong, $cadena1g);
validar($expresiong, $cadena2g);

// h) Genera el patrón para una cadena que contenga aprobado tanto en mayúsculas como en minúsculas


$cadena1h = "aprobado";
$cadena2h = "APROBADO";
$cadena3h = "apr0bado0";
$expresionh = "/^aprobado/i";

echo "\n";

echo "CADENA aprobado (en mayusculas y minúsculas)\n";

echo "\n";

validar($expresionh, $cadena1h);
validar($expresionh, $cadena2h);
validar($expresionh, $cadena3h);


// i) Genera el patrón para letras mayúsculas/minúsculas y espacios


$cadena1i = "SaMuEl";
$cadena2i = "$4m5E1";
$expresioni = "/^[a-zA-Z\s]+$/";

echo "\n";

echo "LETRAS mayúsculas/minúsculas y espacios\n";

echo "\n";

validar($expresioni, $cadena1i);
validar($expresioni, $cadena2i);

// j) Genera el patrón para solamente números, sin espacios

$cadena1j = "123456789";
$cadena2j = "5AMUE1";
$expresionj = "/^[0-9]+$/";

echo "\n";

echo "solamente números, sin espacios\n";

echo "\n";

validar($expresionj, $cadena1j);
validar($expresionj, $cadena2j);


// k) Genera el patrón para números con espacios

$cadena1k = "123 456 789";
$cadena2k = "123456789";
$expresionk = "/^[0-9]+$/";

echo "\n";

echo "solamente números, con espacios\n";

echo "\n";

validar($expresionk, $cadena1k);
validar($expresionk, $cadena2k);

// l) Genera el patrón para texto en blanco, números, mayúsculas/minúsculas y caracteres acentuados

$cadena1l = "12ASÁaá";
$cadena2l = "";
$expresionl = "/^[\p{L}\s\dÁáÉéÍíÓóÚúÜü]+$/u";

echo "\n";

echo "texto en blanco, números, mayúsculas/minúsculas y caracteres acentuados\n";

echo "\n";

validar($expresionl, $cadena1l);
validar($expresionl, $cadena2l);

// m) Genera el patrón para el caso anterior añadiendo los signos de puntuación: comillas simples, coma, punto, punto y coma, dos puntos y guiones


$cadena1m = "1-2;A:S'Á'aá";
$cadena2m = "dsadasda";
$expresionm = '/^[\d\s\'",;.:-A-Za-záéíóúÁÉÍÓÚ]+$/u';

echo "\n";

echo "texto en blanco, números, mayúsculas/minúsculas y caracteres acentuados añadiendo los signos de puntuación: comillas simples, coma, punto, punto y coma, dos puntos y guiones\n";

echo "\n";

validar($expresionm, $cadena1m);
validar($expresionm, $cadena2m);


// n) Genera el patrón para validar una dirección de email


$cadena1n = "samu.ar.lo.04@gmail.com";
$cadena2n = "samu.ar.lo.04.com";
$expresionn = "/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/";
echo "\n";

echo "dirección de email\n";

echo "\n";

validar($expresionn, $cadena1n);
validar($expresionn, $cadena2n);


// o) Genera el patrón para validar una URL sencilla (http://www.ieslasenia.org/ejercicio?16)


$cadena1o = "https://www.ieslasenia.org/ejercicio?16";
$cadena2o = "htt://www.ieslasenia.org/ejercicio?16";
$expresiono = "/^(http|https|ftp):\/\/[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}([\/a-zA-Z0-9%_.~-]*)*$/";

echo "\n";

echo "URL sencilla (http://www.ieslasenia.org/ejercicio?16)\n";

echo "\n";

validar($expresiono, $cadena1o);
validar($expresiono, $cadena2o);

// p) Genera el patrón para validar una contraseña con al menos un carácter en minúscula, una mayúscula, un número y al menos 6 caracteres de longitud

$cadena1p = "123456As";
$cadena2p = "";
$expresionp = "/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).{6,}$/";
echo "\n";

echo "contraseña con al menos un carácter en minúscula, una mayúscula, un número y al menos 6 caracteres de longitud\n";

echo "\n";

validar($expresionp, $cadena1p);
validar($expresionp, $cadena2p);

// q) Genera el patrón para validar una IPv4

$cadena1q = "206.253.208.100";
$cadena2q = "";
$expresionq = "/^(25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)\.(25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)\.(25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)\.(25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)$/";
echo "\n";

echo "IPv4\n";

echo "\n";

validar($expresionq, $cadena1q);
validar($expresionq, $cadena2q);

// r) Genera el patrón para validar una MAC separada por :

$cadena1r = "00:1B:44:11:3A:B7";
$cadena2r = "";
$expresionr = "/^([0-9A-Fa-f]{2}[:-]){5}([0-9A-Fa-f]{2})$/";

echo "\n";

echo "MAC separada por :\n";

echo "\n";

validar($expresionr, $cadena1r);
validar($expresionr, $cadena2r);

// s) Genera el patrón para validar una MAC separada por -

$cadena1s = "00-1B-44-11-3A-B7";
$cadena2s = "";
$expresions = "/^([0-9A-Fa-f]{2}[--]){5}([0-9A-Fa-f]{2})$/";

echo "\n";

echo "MAC separada por -\n";

echo "\n";

validar($expresions, $cadena1s);
validar($expresions, $cadena2s);

// t) Genera el patrón para validar una matrícula de vehículo española

$cadena1t = "6795HFP";
$cadena2t = "AB1234";
$expresiont = "/^[0-9]{4}[BCDFGHJKLMNPRSTVWXYZ]{3}$/";

echo "\n";

echo "Matrícula de vehículo española\n";

echo "\n";

validar($expresiont, $cadena1t);
validar($expresiont, $cadena2t);

?>