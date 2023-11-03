<?php 
/**
 * @author Samuel Arteaga López <samu.ar.lo.04@gmail.com> 
 */

/*5. Diseña un programa que determine la cantidad total a pagar por una llamada telefónica de
acuerdo a las siguientes premisas: Toda llamada que dure menos de 3 minutos tiene un coste de
10 céntimos. Cada minuto adicional a partir de los 3 primeros es un paso de contador y cuesta 5
céntimos.*/

$llamada = readline("Introduce la duración de la llamada(minutos): "); //pedimos por pantalla la duracion en minutos de la llamada

if ($llamada == 0) { // si la llamada no dura nada no se cobra nada
    echo "Precio de la llamada: 0 céntimos \n";

}

if ($llamada <= 3) { // si es menor o igual a 3 minutos se cobra 10 cent
    echo "Precio de la llamada: 10 céntimos \n";
}

if ($llamada > 3) { /* si dura mas de 3, por cada minuto se cobra 5 cent, al empezar en 3 siempre se declara con ese valor la i, 
                        siempre que itere el while le sumara segun el numero de la llamada*/
    $precio = 10;
    $i = 3;
        while ($i < $llamada) {
            $precio += 5;
            $i++;
        }
        
    echo "Precio de la llamada $precio céntimos \n";
}

?>