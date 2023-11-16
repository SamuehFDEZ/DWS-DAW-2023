<?php 
/**
 * @author Samuel Arteaga López <samu.ar.lo.04@gmail.com>
 */


function hundirLaFlota(){
    $tablero = [
        [1],[1],[1],[0],[1],[1],[0],[1],
        [0],[0],[0],[0],[0],[0],[0],[1],
        [1],[1],[1],[0],[0],[0],[1],[0],
        [0],[0],[0],[0],[1],[0],[1],[0],
        [1],[0],[1],[0],[0],[0],[0],[0],
        [1],[0],[0],[0],[0],[1],[0],[1],
        [1],[0],[1],[0],[0],[0],[0],[1],
        [1],[0],[0],[0],[1],[1],[0],[1],
    ];
    echo "HUNDIR LA FLOTA CON PHP \n\n";

    echo "Este es el tablero inicial, coloca tus barcos:\n\n";

    for ($i = 1; $i <= 8; $i++) {
        for ($j=1; $j <= 8; $j++) { 
            $tablero[$i][$j] = 0;

            echo $tablero[$i][$j]. " ";
        }
        echo " \n";
    }
    echo "\n\n";

    echo "POSICIONES DE LOS BARCOS:\n\n";
    for ($i=1; $i <= 8; $i++) { 
        $barco = rand(0, 1);
    
        for ($j=1; $j <= 8; $j++) { 
            $barco = rand(0, 1);
            if($tablero[$i][$j] == 1){
                $tablero[$i][$j] = 0;
            }
        echo $tablero [$i][$j] = $barco. " ";
        
        }
        echo "\n";
    }

    echo "\n";

    $numeroDeBarcos = 10;
    $numeroIntentos = 0;
    while ($numeroDeBarcos > 0) {

        echo "Introduce las coordenadas para disparar, ten en cuenta que tiene que ser la i y la j \n";
        $coordenadaI = readline("coordenada en i:\n");
        $coordenadaJ = readline("coordenada en j:\n");
        $numeroIntentos++;

        for ($i=1; $i <= 8; $i++) { 
            for ($j=1; $j <= 8; $j++) { 
                if($tablero[$i][$j] == 0){
                    echo "Agua!! \n";
                }
                else if($tablero[$i][$j] == -1){
                    echo "Tocado \n";
                }
                else if($tablero[$i][$j] == 2){
                    echo "Hundido \n";
                    $numeroDeBarcos--;
                }
            }
        }
    }

    function clasificacion(){
        $numeroIntentos = 0;

    if($numeroIntentos == 20){
        echo "Master \n";
    }
    else if($numeroIntentos > 20 && $numeroIntentos <= 30){
        echo "Expert \n";

    }
    else if($numeroIntentos > 30 && $numeroIntentos < 50){
        echo "Casual \n";

    }
    else if($numeroIntentos > 50){
        echo "Noob \n";
    }
    }

    clasificacion();
} 

hundirLaFlota();

?>