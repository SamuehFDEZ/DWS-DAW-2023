<?php 
/**
 * @author Samuel Arteaga López <samu.ar.lo.04@gmail.com>
*/

/**15. Crea una función llamada permutaciones que reciba un vector
    $V y que cambie la posición de
    los elementos dicho vector haciendo permutaciones. 
    Las permutaciones se harán entre los
    elementos $V[$N-1] y $V[0], $V[$N-2] y $V[1] , 
    $V[$N-3] y $V[2] etc. siendo $N el tamaño
    del vector.  
*/

    function permutaciones($V){
        //obtiene la longitud del array 
        $N = count($V);

        for ($i=0; $i < $N / 2; $i++) { 
        // Sustituye el elemento en $i con el elemento del otro extremo del vector
           $temp = $V[$i];
           $V[$i] =$V[$N - $i -1];
           $V[$N - $i - 1] = $temp;
        }
        //devuelve el arreglo permutado
        return $V;
    }

    //creamos un vector
    $vector = [1,2,3,4,5];
    //en una variable guardamos el vector permutado
    $res = permutaciones($vector);
    // imprimimos el vector permutado con separacion de comas gracias al metodo implode
    echo "Resultado de las permutaciones: ". implode(", ", $res)."\n";

?>