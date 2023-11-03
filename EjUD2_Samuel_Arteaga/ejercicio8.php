<?php 
/**
 * @author Samuel Arteaga López <samu.ar.lo.04@gmail.com>
 */
/*8. Genera un mensaje de modo que si el día actual es menor o igual que 15 muestre “primera
quincena” mostrando “segunda quincena” en otro caso. Haz una modificación para poder leer el
día*/

$today = getdate(); // almacenamos en una variable el dia actual


if ($today["mday"] <= 15) { // Comprobamos si el dia actual es menor o igual a 15 
    echo ($today["mday"])." Primera quincena\n"; // Imprimimos el dia y primera/segunda quincena accediendo a la posición del array
}
else{
    echo ($today["mday"])." Segunda quincena\n";
}


//Más info: https://www.php.net/manual/en/function.getdate
?>