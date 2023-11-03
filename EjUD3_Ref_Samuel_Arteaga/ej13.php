<?php 
/** 
 * @author Samuel Arteaga López <samu.ar.lo.04@gmail.com>
*/
/**13. Diseñar la función operaMatriz, a la que se le pasa dos matrices de enteros positivos mayores de
0 y la operación que se desea realizar: sumar, restar, multiplicar o dividir (mediante un carácter:
's', 'r', 'm', 'd'). La función debe imprimir las matrices originales, indicar la operación a realizar y
la matriz con los resultados */


/*Crea dos matrices $matriz1 y $matriz2, ambas de 3x3 dimensiones, y las llena con valores aleatorios entre 1 y 10.*/

$matriz1 = [];
$matriz2 = [];
$matrizRand = rand(1, 10);
$matriz2Rand = rand(1, 10);
$matriz3 = [];

for ($i=0; $i < 3; $i++) { 
    for ($j=0; $j < 3; $j++) { 
        $matriz1[$i][$j] = $matrizRand;
    }
}

for ($i=0; $i < 3; $i++) { 
    for ($j=0; $j < 3; $j++) { 
        $matriz2[$i][$j] = $matriz2Rand;
    }
}
/*Define una función llamada operaMatriz que realiza operaciones entre las dos matrices según un carácter ingresado 
por el usuario (suma, resta, multiplicación o división).
El usuario ingresa un carácter 's', 'r', 'm' o 'd' para seleccionar la operación a realizar. */
 function operaMatriz($matriz1, $matriz2){


    /*Dependiendo del carácter ingresado, la función realiza la operación correspondiente y muestra el resultado en la matriz $matriz3.*/ 
     $caracter = readline("Introduce un caracter(s, r, m, d): ");
     switch ($caracter) {
         case 's':
                for ($i=0; $i < 3; $i++) { 
                    for ($j=0; $j < 3; $j++) { 
                        $matriz3[$i][$j] = $matriz1[$i][$j] + $matriz2[$i][$j];

                        echo $matriz3[$i][$j]. " ";
                    }
                    echo "\n";
                }
             break;
         case 'r':
                for ($i=0; $i < 3; $i++) { 
                    for ($j=0; $j < 3; $j++) { 
                        $matriz3[$i][$j] = $matriz1[$i][$j] - $matriz2[$i][$j];

                        echo $matriz3[$i][$j]. " ";
                    }
                    echo "\n";
                }
             break;
         case 'm':
                for ($i=0; $i < 3; $i++) { 
                    for ($j=0; $j < 3; $j++) { 
                        $matriz3[$i][$j] = 0;
                    for ($k=0; $k < 3; $k++) { 
                       $matriz3[$i][$j] += $matriz1[$i][$j] * $matriz2[$i][$j];
                    }
                        echo $matriz3[$i][$j]. " ";
                    }
                    echo "\n";
                }
             break;
         case 'd':
                for ($i=0; $i < 3; $i++) { 
                    for ($j=0; $j < 3; $j++) { 
                        $matriz3[$i][$j] = $matriz1[$i][$j] / $matriz2[$i][$j];

                        echo $matriz3[$i][$j]. " ";
                    }
                    echo "\n";
                }
             break;
        
         default:
                echo "Error!!";
             break;
     }
 }

 operaMatriz($matriz1, $matriz2);

?>