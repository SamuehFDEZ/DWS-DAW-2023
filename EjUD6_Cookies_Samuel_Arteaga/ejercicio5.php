<?php 

/**
 * @author Samuel Arteaga López <samu.ar.lo.04@gmail.com>
 */

/**5. Usa el formulario (Ejercicio 8 UD5) de la quincena donde se indique el día de la semana y
muestre la quincena guardando estos datos en una Cookie. Se deben mostrar el día y la
quincena actual y el día y la quincena anterior (cookie). */

if (isset($_POST["enviar"])) {

    $cookie_name = "miCookie";

    $fechaInicial = $_POST["fechaInicial"];
    echo "$fechaInicial <br>";
    $fechaFinal = $_POST["fechaFinal"];
    echo "$fechaFinal <br>";

    $diferenciaSegundos = $fechaFinal - $fechaInicial;

    $dias = floor($diferenciaSegundos / (60 * 60 * 24));
    $horasRestantes = floor(($diferenciaSegundos % (60 * 60 * 24)) / 3600);
    $minutosRestantes = floor(($diferenciaSegundos % 3600) / 60);

    echo "Días: $dias, Horas restantes: $horasRestantes, Minutos restantes: $minutosRestantes";

    $cookie_value = $fechaInicial. ", ".$fechaFinal.", ".$dias.", ".$horasRestantes.", ".$minutosRestantes;  

    setcookie($cookie_name, $cookie_value);
}

?>

<!DOCTYPE html>
<html lang="en">
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
        if (!isset($_COOKIE[$cookie_name])) {
            echo "El nombre de la cookie " . $cookie_name . " no está definida!";
        } 
        else {
            echo "Cookie " .  $cookie_name . " está definida!<br>";
                
            echo "Los valores de la cookie son: " . $_COOKIE[$cookie_name];
        }
    ?>
</body>
</html>