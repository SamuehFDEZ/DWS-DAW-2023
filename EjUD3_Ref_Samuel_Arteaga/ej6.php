<?php 
/** 
 * @author Samuel Arteaga López <samu.ar.lo.04@gmail.com>
*/
/**6. Realiza un programa que pida 8 números enteros, los almacene en un vector junto con la
palabra “par” o “impar” según proceda y los muestre. Además debe indicar la cantidad de
números en cada caso y el porcentaje de pares e impares.*/


$num = 8;
$par = 0;
$impar = 0;
$vector = [];

for ($i = 0; $i < $num; $i++) { /**Recorremos el for hasta el 8 que es el máximo nuemero de veces, pedimos los números 
    y si son pares ponemos valor a par y sumamos la variable par, lo mismo para el impar,
    dentro del vector almacenamos en las respectivas posiciones el valor (par/impar) con un
    foreach imprimimos en formato: num => par/impar  */
    $pedirNum = readline("Introduce los numeros: ");

    if($pedirNum %2 == 0) {
        $valor = "Par";    
        $par++;
    }
    else{
        $valor = "Impar";   
        $impar++;
    }
    $vector[$pedirNum] = $valor;

    foreach ($vector as $key => $valor) {
        echo "$key => $valor \n";
    }


//Imprimimos los numeros pares e impares y sus respectivos porcentajes
echo "Numeros pares: $par  \n";
echo "Numeros impares: $impar \n";

echo "Porcentaje de numeros pares: ". ($par / count($vector))* 100, " %". "\n";
echo "Porcentaje de numeros impares: ". ($impar / count($vector))* 100, " %" ."\n";

}
?>