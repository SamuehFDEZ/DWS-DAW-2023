<?php 
/**
 * @author Samuel Arteaga López <samu.ar.lo.04@gmail.com>
 */
/**7. Ejercicio 5 Diseña un programa que determine la cantidad total a pagar por 5 llamadas
telefónicas de duración a introducir por el usuario de acuerdo a las siguientes premisas: Toda
llamada que dure menos de 3 minutos tiene un coste de 10 céntimos. Cada minuto adicional a
partir de los 3 primeros es un paso de contador y cuesta 5 céntimos. */


if (isset($_GET["enviar"])) {

    $llamada = array(

        $llamada[0] = $_GET["minutos1"],
        $llamada[1] = $_GET["minutos2"],
        $llamada[2] = $_GET["minutos3"],
        $llamada[3] = $_GET["minutos4"],
        $llamada[4] = $_GET["minutos5"],

    );

    $costeTotal = 0;

    for ($i = 0; $i < count($llamada); $i++){

        if ($llamada[$i] <= 3) { // si es menor o igual a 3 minutos se cobra 10 cent
            echo "Precio de la llamada: 10 céntimos <br>";
            $costeTotal += 10;
        }

        if ($llamada[$i] > 3) { 
            /**si la llamada dura mas de 3
             * entraremos al if y haremos lo siguiente:
             * en la variable minutos almacenaremos la llamada
             * menos 3 para recomprobar que es mas de 3, ese valor
             * le añadiremos un *5 despues en otra variable
             * llamada minu almacenaremos el 10 que sera sumado con el 
             * valor de minutos, e imprimimos el precio y luego el 
             * costetotal sumandole el precio
             */
            $minutos = $llamada[$i] - 3;
            $minutos *=5;
            $minu = 10;
            $precio = $minutos + $minu;
            echo "Total a pagar es: ". $precio."<br>";
            $costeTotal += $precio;

        }
    }
        echo "Coste total: $costeTotal";

}

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Samuel Arteaga</title>
</head>
<body>
    <form action="ejercicio7.php" method="get">
        <label for="minutos">Introduce la primera llamada</label><br><br>
        <input type="text" name="minutos1"><br><br>
        <label for="minutos">Introduce la segunda llamada</label><br><br>
        <input type="text" name="minutos2"><br><br>
        <label for="minutos">Introduce la tercera llamada</label><br><br>
        <input type="text" name="minutos3"><br><br>
        <label for="minutos">Introduce la cuarta llamada</label><br><br>
        <input type="text" name="minutos4"><br><br>
        <label for="minutos">Introduce la quinta llamada</label><br><br>
        <input type="text" name="minutos5"><br><br>

        <input type="submit" name="enviar" value="Enviar">
    </form>
</body>
</html>