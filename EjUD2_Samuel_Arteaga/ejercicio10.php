<?php 
/**
 * @author Samuel Arteaga López <samu.ar.lo.04@gmail.com>
 */
/*10. Generar un número aleatorio entre 1 y 5 de modo que muestre el número y su nombre en letras
(Ejemplo: 3 – tres)*/

$numRand = rand(1,5); //Almacenamos en numRand un numero random entre 1 y 5 incluidos


// Con el switch dependiendo del numero que salga al lado saldra escrito
switch ($numRand) {
    case 1:
        echo $numRand." - uno\n";
        break;
    case 2:
        echo $numRand." - dos\n";
        break;
    case 3:
        echo $numRand." - tres\n";
        break;
    case 4:
        echo $numRand." - cuatro\n";
        break;
    case 5:
        echo $numRand." - cinco\n";
        break;
}

?>