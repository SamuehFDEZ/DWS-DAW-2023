<?php 
/** 
 * @author Samuel Arteaga López <samu.ar.lo.04@gmail.com>
*/
/**1. Escribe un programa en que dado un número del 1 a 7 escriba el correspondiente nombre del
día de la semana. */

$diaDeLaSemana = readline("Escribe un nuemro del 1 al 7: "); //pedimos el numero

/**Realizamos un switch que en cada caso imrpima el dia de la semana con su respectivo número,
 * en caso por defecto decimos número incorrecto
 */
switch ($diaDeLaSemana) {
    case 1:
        echo "Lunes\n";
        break;
    case 2:
        echo "Martes\n";
        break;
    case 3:
        echo "Miércoles\n";
        break;
    case 4:
        echo "Jueves\n";
        break;
    case 5:
        echo "Viernes\n";
        break;
    case 6:
        echo "Sábado\n";
        break;
    case 7:
        echo "Domingo\n";
        break;

    default:
        echo "Introduce un numero correcto!!\n";
        break;
}



?>