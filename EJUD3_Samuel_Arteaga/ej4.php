<?php 
/**
 * @author Samuel Arteaga López <samu.ar.lo.04@gmail.com> 
 */

/*4. Elabora un programa para determinar si una hora leída en la forma horas, minutos y segundos
está correctamente expresada*/

$horaBuena = readline("Escribe la hora para comprobar si es correcta: "); //pedimos por pantalla la hora
$minutosBuenos = readline("Escribe la hora para comprobar si es correcta: "); //pedimos por pantalla los minutos
$segundosBuenos = readline("Escribe la hora para comprobar si es correcta: "); //pedimos por pantalla los segundos

//comprobamos que cada variable no se pase de sus respectivos limites

if ($horaBuena > 0 && $horaBuena < 24 && $minutosBuenos > 0 && $minutosBuenos < 60 && $segundosBuenos > 0 && $segundosBuenos < 60) {
    echo "Hora introducida correctamente: $horaBuena:$minutosBuenos:$segundosBuenos \n";

}
else{
    echo "Hora introducida incorrectamente \n";

}


?>