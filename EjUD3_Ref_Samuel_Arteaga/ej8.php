<?php 
/** 
 * @author Samuel Arteaga López <samu.ar.lo.04@gmail.com>
*/
/**8. Leer por teclado y rellenar dos vectores de 10 números enteros y mezclarlos en un tercer vector
de la forma: el 1º de A, el 1º de B, el 2º de A, el 2º de B, etc.*/

$vector1 = [];
$vector2 = [];
$contVect1 = 0;
$contVect2 = 0;
/*Se introduce 10 números para llenar el vector $vector1. */
for ($i = 1; $i <= 10; $i++) {
    $numVect1 = readline("Introduce los números al primer vector: ");

    array_push($vector1, $numVect1);
}
/*Luego, introduce 10 números para llenar el vector $vector2. */
for ($i = 1; $i <= 10; $i++) {
    $numVect2 = readline("Introduce los números al segundo vector: ");

    array_push($vector2, $numVect2);

}
/*Se crea un nuevo vector $vector3 de hasta 20 elementos, y cada elemento se selecciona de manera alterna de $vector1 y $vector2. */
$vector3 = []; 
for($i=1; $i <=20; $i++){
   
    if($i %2 != 0){
        array_push($vector3, $vector1[$contVect1]);
        $contVect1++;
   }
   else{
        array_push($vector3, $vector2[$contVect2]);
        $contVect2++;
   }
}

/*Se muestra el contenido de $vector1 y $vector2 con un formato incorrecto, ya que la función printf en el primer bucle no está formateada correctamente. */

for ($i=0; $i < 10; $i++) { 
    printf("%d\t\n", $vector1[$i], $vector2[$i]);
}
for ($i=0; $i < 20; $i++) { 
    printf("%d\t \n",$vector3[$i]);
}

?>