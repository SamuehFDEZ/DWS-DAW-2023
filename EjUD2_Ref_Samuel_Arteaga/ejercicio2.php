<?php 

/**
 * @author Samuel Arteaga López <samu.ar.lo.04@gmail.com>
 */

/*2. Escribe un programa que pinte por pantalla una pirámide rellena a base de asteriscos. La base
de la pirámide debe estar formada por 9 asteriscos*/
$n = 9; //numero de estrellas en la base 
$k = 2 * $n - 2; //altura de la 
 
for ($i = 0; $i < $n; $i++){ // for para rellenar la base
    for ($j = 0; $j < $k; $j++) // da la forma de la piramide
        echo " ";
        $k = $k - 1;
    for ($j = 0; $j <= $i; $j++ ){ // for para rellenar el resto de asteriscos
      echo "* ";
    }
echo "\n";
}


?>