<?php 
/** 
 * @author Samuel Arteaga López <samu.ar.lo.04@gmail.com>
*/
/**7. Define tres arrays de 20 números enteros cada uno, con nombres “numero”, “cuadrado” y
“cubo”. Carga el array “numero” con valores aleatorios entre 0 y 100. En el array “cuadrado” se
deben almacenar los cuadrados de los valores que hay en el array “numero”. En el array “cubo”
se deben almacenar los cubos de los valores que hay en “numero”. A continuación, muestra el
contenido de los tres arrays dispuesto en tres columnas*/


$numero = []; //Creamos los tres vectores
$cuadrado = [];
$cubo = [];

for ($i=1; $i <= 20; $i++) { //recorremos el for y dentro del array $numero almacenamos los números aleatorios
   $numRand = rand(0,100);
    $numero[$i] = $numRand;
}

for ($i= 1; $i <= 20; $i++) { //recorremos el for y dentro del array $cuadrados almacenamos los números al cuadrado 
    $cuadrado[$i] = $numero[$i] ** 2;

}

for ($i= 1; $i <= 20; $i++) { //recorremos el for y dentro del array $cubo almacenamos los números al cubo
    $cubo[$i] = $numero[$i] ** 3;

}

for ($i=1; $i <= 20; $i++) { 
    printf("%d\t%d\t%d\t \n", $numero[$i],$cuadrado[$i],$cubo[$i]); //imprimimos con formato y recorriendo un for los números de los arrays: normal, al cuadrado y al cubo

}

?>