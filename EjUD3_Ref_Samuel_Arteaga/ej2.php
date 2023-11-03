<?php 
/** 
 * @author Samuel Arteaga López <samu.ar.lo.04@gmail.com>
*/
/**2. Escribe un programa que dada una nota (entera) indique su correspondencia en el boletín
(Ejemplo 5 sería SUFICIENTE) */

$nota = readline("Escribe un nuemro del 1 al 10: "); //pedimos el numero

/**Realizamos un switch que en cada caso imprima la nota equivalente al número,
 * en caso por defecto decimos nota incorrecta
 */
switch ($nota) {
    case 1:
        echo "INSUFICIENTE\n";
        break;
    case 2:
        echo "INSUFICIENTE\n";
        break;
    case 3:
        echo "INSUFICIENTE\n";
        break;
    case 4:
        echo "INSUFICIENTE\n";
        break;
    case 5:
        echo "SUFICIENTE\n";
        break;
    case 6:
        echo "BIEN\n";
        break;
    case 7:
        echo "NOTABLE\n";
        break;
    case 8:
        echo "NOTABLE\n";
        break;
    case 9:
        echo "EXCELENTE\n";
        break;
    case 10:
        echo "SOBRESALIENTE\n";
        break;

    default:
        echo "Introduce una nota correcta correcto!!\n";
        break;
}



?>