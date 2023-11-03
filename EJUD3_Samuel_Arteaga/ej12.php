<?php 
/**
 * @author Samuel Arteaga López <samu.ar.lo.04@gmail.com> 
 */

/*12. Crea un programa para leer las notas de los alumnos de una clase, y que informe del número de
alumnos cuya nota sea mayor de la media de la clase.*/

$numAlumn = readline("Introduce el numero de alumnos: \n"); //Pide el numero por pantalla

$arrayAlumn = []; //Declaramos el array
$sumaDeNotas = 0; // inicializamos la suma de las notas a 0
for ($i=0; $i < $numAlumn; $i++) {  /**Recorremos un for que dependiendo del numero x de alumnos pedirá un x numero de notas, esas notas las ponemos en el array mediante
    push y en suma de notas almacenamos el total de notas  */
    $notas = readline("Escribe las notas de los alumnos: \n");

    array_push($arrayAlumn, $notas);

    $sumaDeNotas += $arrayAlumn[$i];
}

$media = (int)$sumaDeNotas / $numAlumn; //calculamos la media
$AlumnSupMedia = 0;
foreach ($arrayAlumn as $key) { /**Mediante un foreach recorremos el array con su index com key, si la media es menor a key sumamos el contador de alumnsupmedia  */
    if($media < $key){
        $AlumnSupMedia++;           
    }    
}

echo "El numero de alumnos con una nota por encima de la media es: ".$AlumnSupMedia. "\n"; //printeamos el contador que es el numero de alumnos que superan la media

?>