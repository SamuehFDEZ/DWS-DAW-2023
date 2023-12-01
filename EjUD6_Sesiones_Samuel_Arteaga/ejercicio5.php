<?php 

/**
 * @author Samuel Arteaga López <samu.ar.lo.04@gmail.com>
 */

/**5. Usa el formulario del ejercicio 5 de Cookies con indicación de la quincena dado el día de la
semana de modo que uses la sesión para mostrar el día y la quincena actuales y además muestre
el día y la quincena anteriores. */

if (isset($_POST["enviar"])) {

    $fechaInicial = $_POST["fechaInicial"];
    echo "$fechaInicial <br>";
    $fechaFinal = $_POST["fechaFinal"];
    echo "$fechaFinal <br>";

    $diferenciaSegundos = $fechaFinal - $fechaInicial;

    $dias = floor($diferenciaSegundos / (60 * 60 * 24));
    $horasRestantes = floor(($diferenciaSegundos % (60 * 60 * 24)) / 3600);
    $minutosRestantes = floor(($diferenciaSegundos % 3600) / 60);

    echo "Días: $dias, Horas restantes: $horasRestantes, Minutos restantes: $minutosRestantes";

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
    <form action="ejercicio5.php" method="post">
        <label for="fechaInicial">Introduce la fecha inicial</label><br><br>
        <input type="datetime-local" name="fechaInicial"><br><br>
        <label for="fechaFinal">Introduce la fecha final</label><br><br>
        <input type="datetime-local" name="fechaFinal"><br><br>
        <input type="submit" name="enviar" value="Enviar"><br><br>
    </form>
    <?php
        session_start(); //iniciamos la sesión
        
        if (empty($_SESSION["fechaInicial"]) && empty($_SESSION["fechaFinal"])) {
            $_SESSION["fechaInicial"] = $_POST["fechaInicial"];
            $_SESSION["fechaFinal"] = $_POST["fechaFinal"];
        } 
        else {
            $_SESSION["fechaInicialAntiguo"]  = $_SESSION["fechaInicial"];
            $_SESSION["fechaInicial"] = $_POST["fechaInicial"];

            $_SESSION["fechaFinalAntiguo"] = $_SESSION["fechaFinal"];
            $_SESSION["fechaFinal"] = $_POST["fechaFinal"];

            echo "Los datos anteriormente introducidos son: ",  $_SESSION["fechaInicialAntiguo"], ", ", $_SESSION["fechaFinalAntiguo"];
        }
        // Cambia "cliente nuevo" por el valor introducido en el Text
        ?>
</body>
</html>