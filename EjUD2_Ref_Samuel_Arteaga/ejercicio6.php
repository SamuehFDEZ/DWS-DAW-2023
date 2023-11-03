<?php

/**
 * @author Samuel Arteaga López <samu.ar.lo.04@gmail.com>
 */

/*6. Realiza un programa que diga si un número introducido por teclado es par y/o divisible entre 5*/

$numero = readline("Escribe el número: "); // Pedimos el numero por pantalla


if ($numero % 2 == 0) { // Comprobamos que el numero sea par si el resto da 0
    echo "El número $numero es par\n";
}
else{
    echo "El número $numero es impar\n";
}

if ($numero % 5 == 0) { // Comprobamos que el numero sea divisible entre 5 si el resto da 0
    echo "El número $numero es divisible entre 5\n";
}
else{
    echo "El número $numero no es divisible entre 5\n";
}

?>