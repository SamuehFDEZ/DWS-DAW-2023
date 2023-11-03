<?php 
/**
 * @author Samuel Arteaga López <samu.ar.lo.04@gmail.com>
 */

/**22. Escribe un programa que lea una lista de diez números y determine cuántos son positivos, y
cuántos son negativos (muestra los números, la cantidad de positivos y negativos y el porcentaje
de cada grupo)
 */

$num = 10;

$positivos = [];
$negativos = [];
$totalNum = 0;

for ($i=0; $i < $num; $i++) { // recorremos el vector 10 veces
    $lista = readline("Escribe los numeros: "); // pedimos 10 veces un numero por pantalla

    if (is_numeric($lista)) { //comprobamos que lista sea numerico 
        $lista = floatval($lista); // obtenemos los decimales de lista
        $totalNum++; // suamamos al contador

        if ($lista >= 0) { // si lista es positivo lo almacenamos en el vector positivo
            array_push($positivos, $lista);
        }
        else if($lista < 0){ // si lista es positivo lo almacenamos en el vector negativo
            array_push($negativos, $lista);
        }
        else{ // si no se cumple nada de lo anterior imrpimimos que introduzca un numero
            echo "Introduce un numero!!";
        }
    }
}

/**Imprimimos por un lado los numeros sin filtro
 * por otro lado los numeros negativos
 * y por otro los positivos
 */

echo "Números introducidos: ". implode(", ",$positivos + $negativos) . "\n"; 
echo "Cantidad de números positivos: ". count($positivos) . "\n";
echo "Cantidad de números negativos: ". count($negativos) . "\n";

$porcentajePos = (count($positivos)/$totalNum) *100;
$porcentajeNeg= (count($negativos)/$totalNum) *100;


//Imprimimos los porcentajes de numeros positivos y negativos que habiamos calculado anteriormente
echo "Porcentaje de numeros postivos: ". number_format($porcentajePos, 2). "%"."\n";
echo "Porcentaje de numeros negativos: ". number_format($porcentajeNeg, 2). "%"."\n";

?>