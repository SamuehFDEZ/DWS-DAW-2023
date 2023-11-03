<?php 
/**
 * @author Samuel Arteaga López <samu.ar.lo.04@gmail.com>
 */

/*
3. Igual que el programa anterior, pero esta vez la pirámide estará hueca (se debe ver únicamente
el contorno hecho con asteriscos)*/

$size = 9;  //altura de la pirámide
for($i = 1; $i <= $size; $i++) { // con el primer for rellenamos la base
    for($j = 1; $j <= $size - $i; $j++) { //rellenamos los espacios
        echo " ";
    }
    for($j = 1; $j <= ($i * 2) - 1; $j++) { //si cumple alguna de las condiciones rellena con asteriscos, sino, con espacios
        if($j === 1 || $j === ($i * 2) - 1 || $i === $size) {
            echo "*";
        }
        else {
            echo " ";
        }
    }
    echo "\n";
}

?>