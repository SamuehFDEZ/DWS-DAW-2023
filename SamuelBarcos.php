<?php 
/**Se trata de hacer una estructura que almacene todos los barcos. 
 * Para cada barco, además 
 * almacenaremos su tamaño, filaInicio, colInicio y dirección.
Cuando tengas la estructura, 
debes recorrerla para mostrar los valores que tenga cada barco.
Sube el/los ficheros resultantes del ejercicio con la denominación AlumnoBarcos (Alumno es tu nombre) */

// 4 unidades = portaaviones
// 3 unidades = acorazado
// 2 unidades = crucero
// 1 unidad = destructor

$barcos = array(
    "portaaviones"=> array(
        "tamaño"=> 4,
        "filaInicio"=> 2,
        "colInicio"=> 3,
        "dirección"=> "vertical"),

    "acorazado1"=> array(
        "tamaño"=> 3,
        "filaInicio"=> 8,
        "colInicio"=> 9,
        "dirección"=> "horizontal"),

    "acorazado2"=> array(
        "tamaño"=> 3,
        "filaInicio"=> 4,
        "colInicio"=> 8,
        "dirección"=> "horizontal"),

    "crucero1"=> array(
        "tamaño"=> 2,
        "filaInicio"=> 3,
        "colInicio"=> 5,
        "dirección"=> "horizontal"),

    "crucero2"=> array(
        "tamaño"=> 2,
        "filaInicio"=> 1,
        "colInicio"=> 1,
        "dirección"=> "vertical"),   

    "crucero3"=> array(
        "tamaño"=> 2,
        "filaInicio"=> 5,
        "colInicio"=> 3,
        "dirección"=> "vertical"),

    "destructor1"=> array(
        "tamaño"=> 1, 
        "filaInicio"=> 7,
        "colInicio"=> 7,
        "dirección"=> "horizontal"),  

    "destructor2"=> array(
        "tamaño"=> 1, 
        "filaInicio"=> 1,
        "colInicio"=> 4,
        "dirección"=> "horizontal"),

    "destructor3"=> array(
        "tamaño"=> 1, 
        "filaInicio"=> 2,
        "colInicio"=> 5,
        "dirección"=> "horizontal"),

    "destructor4"=> array(
        "tamaño"=> 1, 
        "filaInicio"=> 3,
        "colInicio"=> 8,
        "dirección"=> "vertical")
);

//IMPRIME NULL
for ($i=0; $i < count($barcos); $i++) { 
    echo var_dump($barcos[$i]);
}


//LO IMPRIME
foreach ($barcos as $barco) {
     echo var_dump($barco);
}


?>