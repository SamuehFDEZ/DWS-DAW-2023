<?php 
/** 
 * @author Samuel Arteaga López <samu.ar.lo.04@gmail.com>
*/
/**5. Realiza el control de acceso a una caja fuerte. La combinación será un número de 4 cifras. El
programa nos pedirá la combinación para abrirla. Si no acertamos, se nos mostrará el mensaje
“Lo siento, esa no es la combinación” y si acertamos se nos dirá “La caja fuerte se ha abierto
satisfactoriamente”. Tendremos cuatro oportunidades para abrir la caja fuerte.*/

$oportunidades = 0;
$numRand = mt_rand(1000,9999);
//echo $numRand; //(Si se harta de intentos pruebe imrpimiendolo)
while ($oportunidades < 4){ //iteramos hasta que oportunidades llegue a 4
    $num = readline("Introduce el numero (4 cifras): "); //pedimos los numeros

    if($num == $numRand){ //si acertamos detenemos el bucle
        echo "La caja fuerte se ha abierto satisfactoriamente \n";
        $oportunidades = 4;
    }else{ //sino seguimos intentandolo
       echo "Lo siento, esa no es la combinación\n";
    }
    $oportunidades++; //sumamos las oportunidades

}

echo "La combinacion era $numRand \n"; //imprimir la combinacion correcta



?>