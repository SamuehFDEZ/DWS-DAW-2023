<?php

/**
 * @author Samuel Arteaga López
 */

/***JUEGO HUNDIR LA FLOTA - EJERCICIO PRÁCTICO EVAL1 2DAW */

//Indicamos tamanyo de la matriz
$GLOBALS['filas'] = 8;
$GLOBALS['columnas'] = 8;

//Creamos la matriz del tablero y la inicializamos
for ($i = 0; $i < 8; $i++) { //recorremos cada una de las filas
    for ($j = 0; $j < 8; $j++) { //En cada una de las filas recorremos las columnas
        $GLOBALS['tablero'][$i][$j] = 0; //lo inicializamos con 0 - Agua
    }
}

//Creamos una función para imprimir la matriz como tablero sin mostrar los barcos
function imprimeTableroSinBarcos($matriz){
    // Imprimir la matriz con formato de filas y columnas
    for ($i = 0; $i < count($matriz); $i++) {
        for ($j = 0; $j < count($matriz); $j++) {
            if ($matriz[$i][$j] === 1) {
                echo "0" . " "; //ocultamos el barco
            } else {
                echo $matriz[$i][$j] . " "; //en cada fila las columnas se separan por espacios  
            }
        }
        echo "\n"; //separamos las filas con un salto de línea
    }
    echo "\n\n";
}

//Creamos una función para imprimir la matriz como tablero
function imprimeTablero($matriz){
    // Imprimir la matriz con formato de filas y columnas
    for ($i = 0; $i < count($matriz); $i++) {
        for ($j = 0; $j < count($matriz); $j++) {
            echo $matriz[$i][$j] . " "; //en cada fila las columnas se separan por espacios  
        }
        echo "\n"; //separamos las filas con un salto de línea
    }
    echo "\n\n";
}


//Inicializamos las variables del jugador
$puntuacion = array("intentos" => 0, "barcosHundidos" => 0);

//Guardamos los barcos en una variable para conocer su tamanyo
//luego podremos añadir datos como celda de inicio, orientación, etc.
/*hay 1 barco de 4 celdas
    2 barcos de 3 celdas
    3 barcos de 2 celdas
    4 barcos de 1 celda*/
$barcos = array(
    "B1" => array('tamanyo' => 4, 'filInicio' => null, 'colInicio' => null, 'direccion' => null),
    "B2" => array('tamanyo' => 3, 'filInicio' => null, 'colInicio' => null, 'direccion' => null),
    "B3" => array('tamanyo' => 3, 'filInicio' => null, 'colInicio' => null, 'direccion' => null),
    "B4" => array('tamanyo' => 2, 'filInicio' => null, 'colInicio' => null, 'direccion' => null),
    "B5" => array('tamanyo' => 2, 'filInicio' => null, 'colInicio' => null, 'direccion' => null),
    "B6" => array('tamanyo' => 2, 'filInicio' => null, 'colInicio' => null, 'direccion' => null),
    "B7" => array('tamanyo' => 1, 'filInicio' => null, 'colInicio' => null, 'direccion' => null),
    "B8" => array('tamanyo' => 1, 'filInicio' => null, 'colInicio' => null, 'direccion' => null),
    "B9" => array('tamanyo' => 1, 'filInicio' => null, 'colInicio' => null, 'direccion' => null),
    "B10" => array('tamanyo' => 1, 'filInicio' => null, 'colInicio' => null, 'direccion' => null)
);

//obtenemos el total de barcos que hay en el juego
$numBarcos = count($barcos);

/***** FUNCIÓN PARA SABER SI PODEMOS COLOCAR EL BARCO EN EL TABLERO */

//función para saber si un barco puede ser colocado en una posición del tablero
//se le pasan coordenadas (fila,columna) y orientación (0-HORIZONTAL y 1-VERTICAL)
function puedeColocarBarco($fila, $columna, $direccion, $tamanyo){ 
//Aquí deberemos hacer varias comprobaciones para saber si cabe en Horizontal o Vertical

    //DIRECCIÓN HORIZONTAL
    if ($direccion === 0) { //0 representa dirección HORIZONTAL
        if ($columna + $tamanyo > count($GLOBALS['tablero'])) {
            //Se sale del tablero
            return false;
        }

        //comprobamos que a su IZQUIERDA o no hay nada o es agua
        if ($columna > 0 && $GLOBALS['tablero'][$fila][$columna - 1] !== 0) {
            return false;
        } else if ($columna === 0 && $GLOBALS['tablero'][$fila][$columna] !== 0) { //es la primera columna y ocupada
            return false;
        }

        //Comprobamos que a su DERECHA o no hay nada o hay agua
        if ((($columna + $tamanyo) < count($GLOBALS['tablero'])) && ($GLOBALS['tablero'][$fila][$columna + $tamanyo] !== 0)) {
            return false;
        }

        //recorremos la longitud del barco para comprobar que no hay barcos
        for ($i = $columna; $i < $columna + $tamanyo; $i++) {
            //ARRIBA
            if ($fila - 1 > 0 && $GLOBALS['tablero'][$fila - 1][$i] !== 0) {
                return false;
            } else if ($fila - 1 === 0 && $GLOBALS['tablero'][$fila - 1][$i] !== 0) {
                return false;
            }
            //ABAJO
            if ($fila + 1 < count($GLOBALS['tablero']) && $GLOBALS['tablero'][$fila + 1][$i] !== 0) {
                return false;
            } else if ($fila + 1 === count($GLOBALS['tablero']) - 1 && $GLOBALS['tablero'][$fila + 1][$i] !== 0) {
            }
            //o en la propia celda
            if ($GLOBALS['tablero'][$fila][$i] !== 0) {
                return false;
            }
        }
    } else { // DIRECCIÓN VERTICAL
        if ($fila + $tamanyo > count($GLOBALS['tablero'])) {
            //Se sale del tablero
            return false;
        }

        //comprobamos que ARRIBA no hay nada o es agua
        if ($fila > 0 && $GLOBALS['tablero'][$fila - 1][$columna] !== 0) {
            return false;
        } else if ($fila === 0 &&  $GLOBALS['tablero'][$fila][$columna] !== 0) { //Es la primera fila y está ocupada
            return false;
        }

        //Comprobamos que ABAJO no hay nada o hay agua
        if ((($fila + $tamanyo) < count($GLOBALS['tablero'])) && ($GLOBALS['tablero'][$fila + $tamanyo][$columna] !== 0)) {
            return false;
        }

        //recorremos la longitud del barco para comprobar que no hay barcos
        for ($i = $fila; $i < $fila + $tamanyo; $i++) {
            //ARRIBA
            if ($columna - 1 > 0 && $GLOBALS['tablero'][$i][$columna - 1] !== 0) {
                return false;
            } else if ($columna - 1 === 0 && $GLOBALS['tablero'][$i][$columna - 1] !== 0) {
                return false;
            }
            //ABAJO
            if ($columna + 1 < count($GLOBALS['tablero']) && $GLOBALS['tablero'][$i][$columna + 1] !== 0) {
                return false;
            } else if ($columna + 1 === count($GLOBALS['tablero']) - 1 && $GLOBALS['tablero'][$i][$columna + 1] !== 0) {
                return false;
            }
            //o en la propia celda
            if ($GLOBALS['tablero'][$i][$columna] !== 0) {
                return false;
            }
        }
    }

    return true;
}

/****FUNCIÓN PARA COMPROBAR SI EL BARCO ESTÁ TOCADO O HUNDIDO */

//COmprobamos si el barco está hundido
function barcoHundido($barcos, $fila, $columna){
    foreach ($barcos as $barco => $values) { //para cada barco

        //comprobamos la dirección del barco (HORIZONTAL -0 o bien VERTICAl -1)
        if ($values['direccion'] === 0) { //0 es HORIZONTAL
            //obtenemos las celdas que ocupa el barco
            if ($values['filInicio'] === $fila) { //el barco está en la FILA
                $celdas = array();
                for ($i = $values['colInicio']; $i < $values['colInicio'] + $values['tamanyo']; $i++) {
                    $celdas[] = $i;  //guardamos las COLUMNAS que ocupa el barco
                }
                $index = array_search($columna, $celdas); //Buscamos la COLUMNA entre las celdas del barco
                if ($index !== false) { //el disparo acierta en el barco
                    $GLOBALS['tablero'][$fila][$columna] = -1;
                } else {
                    continue; //seguimos con el siguiente barco, no ha sido alcanzado
                }
                $numTocado = 0; //número de celdas que ha sido tocado
                foreach ($celdas as $celda) {
                    if ($GLOBALS['tablero'][$fila][$celda] === -1) {
                        //contamos las COLUMNAS de la FILA del barco que ha sido TOCADO
                        $numTocado++;
                    }
                }
                if ($numTocado === count($celdas)) { //todas las celdas están tocadas
                    foreach ($celdas as $celda) {
                        $GLOBALS['tablero'][$fila][$celda] = 2; //marcamos el barco como HUNDIDO
                    }
                    return true;
                } else {
                    return false;
                }
            }
        } else { //La dirección es VERTICAL

            //obtenemos las celdas que ocupa el barco
            if ($values['colInicio'] === $columna) { //el barco está en la COLUMNA
                $celdas = array();
                for ($i = $values['filInicio']; $i < $values['filInicio'] + $values['tamanyo']; $i++) {
                    $celdas[] = $i; //guardamos las FILAS que ocupa el barco
                }
                $index = array_search($fila, $celdas); //Buscamos la FILA entre las celdas del barco
                if ($index !== false) { //el disparo acierta en el barco
                    $GLOBALS['tablero'][$fila][$columna] = -1;
                } else {
                    continue; //seguimos con el siguiente barco, no ha sido alcanzado
                }
                $numTocado = 0; //número de celdas que ha sido tocado
                foreach ($celdas as $celda) {
                    if ($GLOBALS['tablero'][$celda][$columna] === -1) {
                        //contamos las FILAS de las COLUMNAS del barco que ha sido TOCADO
                        $numTocado++;
                    }
                }
                if ($numTocado === count($celdas)) { //todas las celdas están tocadas
                    foreach ($celdas as $celda) {
                        $GLOBALS['tablero'][$celda][$columna] = 2; //marcamos el barco como HUNDIDO
                    }
                    return true;
                } else {
                    return false;
                }
            }
        }
    }
}

/**** CÓDIGO PARA COLOCAR LOS BARCOS EN EL TABLERO DE FORMA ALEATORIA */

//Colocamos los barcos y guardamos su posición
foreach ($barcos as $barco => $value) {

    $tamanyo = $value['tamanyo']; //obtenemos el tamaño del barco que queremos colocar

    //Mientras no podamos colocar el barco, insistimos con valores aleatorios
    do { //do-while porque debemos calcular valores aleatorios al menos una vez para cado barco
        //Calculamos valores aleatorios
        $fila = rand(0, ($GLOBALS['filas'] - 1));
        $columna = rand(0, ($GLOBALS['columnas'] - 1));
        $direccion = rand(0, 1);    // 0 es HORIZONTAL - 1 es VERTICAL
    } while (!puedeColocarBarco($fila, $columna, $direccion, $tamanyo));

    //Guardamos las coordenadas de inicio y la dirección del barco
    $barcos[$barco]['filInicio'] = $fila;
    $barcos[$barco]['colInicio'] = $columna;
    $barcos[$barco]['direccion'] = $direccion;

    //Colocamos el barco en el tablero
    if ($direccion === 0) { //se coloca en posición HORIZONTAL
        for ($j = $columna; $j < $columna + $tamanyo; $j++) {
            $GLOBALS['tablero'][$fila][$j] = 1;
        }
    } else { //se coloca en posición VERTICAL
        for ($i = $fila; $i < $fila + $tamanyo; $i++) {
            $GLOBALS['tablero'][$i][$columna] = 1;
        }
    }
}


/**ESTAS LÍNEAS DEBEN COMENTARSE PARA EL JUEGO REAL, son para comprobar la colocación de los barcos */
echo "\nMatriz con la posición de los barcos tras colocarlos\n";
imprimeTablero($GLOBALS['tablero']);


/***
 * PROGRAMA PRINCIPAL
 * HUNDIR LA FLOTA
 */

do {

    //Solicitamos coordenadas al jugador (debemos convertir las filas y columnas de string to int)
    $fila = intval(readline("Introduce la fila (0-" . ($GLOBALS['filas'] - 1) . "): "));
    $columna = intval(readline("Introduce la columna (0-" . ($GLOBALS['columnas'] - 1) . "): "));


    // Validamos las coordenadas introducidas
    if ($fila < 0 || $fila >= $GLOBALS['filas'] || $columna < 0 || $columna >= $GLOBALS['columnas']) {
        echo "Coordenadas fuera de rango. Intenta de nuevo.\n";
        continue; //Va a la siguiente iteración sin ejecutar el resto del while
    }

    echo "\nHa seleccionado la coordenada ($fila,$columna)\n";

    //Actualizamos los intentos de disparo
    $puntuacion['intentos']++;

    //Comprobamos si ha tocado y hundido un barco
    if ($GLOBALS['tablero'][$fila][$columna] === 1) {
        if (barcoHundido($barcos, $fila, $columna)) {
            //El barco está hundido
            echo "HUNDIDO!!!\n";
            $puntuacion['barcosHundidos']++;
        } else {
            echo "TOCADO!\n";
        }
    } else if ($GLOBALS['tablero'][$fila][$columna] === 0) {
        echo "Agua...\n";
    }

    echo "\nTablero actualizado\n";
    imprimeTableroSinBarcos($GLOBALS['tablero']);
} while ($puntuacion['barcosHundidos'] < $numBarcos);  //mientras queden barcos por hundir

/*** CLASIFICACIÓN JUGADOR */
echo "La clasificación del jugador con " . $puntuacion['intentos'] . " intentos es:\n";
switch ($puntuacion['intentos']) {
    case ($puntuacion['intentos'] === 20):
        echo "Jugador Master";
        break;
    case ($puntuacion['intentos'] > 20 && $puntuacion['intentos'] <= 30):
        echo "Jugador Expert";
        break;
    case ($puntuacion['intentos'] > 30 && $puntuacion['intentos'] < 50):
        echo "Jugador Casual";
        break;
    case ($puntuacion['intentos'] >= 50):
        echo "Jugador Noob";
        break;
}