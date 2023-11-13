<?php 
/**
 * @author Samuel Arteaga López <samu.ar.lo.04@gmail.com>
 */
/**8. Ejercicio 7 Calcula, dada dos fechas inicio y final introducidas por el usuario (puede ser la
actual y otra deseada), cuántos días, horas y minutos hay de diferencia entre dichas horas.
 */


 if (isset($_GET["enviar"])) {
    $fechaInicial = strtotime($_GET["fechaInicial"]);
    $fechaFinal = strtotime($_GET["fechaFinal"]);

    // Calcula la diferencia en segundos
    $diferenciaSegundos = $fechaFinal - $fechaInicial;

    // Calcula los días, horas y minutos restantes
    $dias = floor($diferenciaSegundos / (60 * 60 * 24));
    $horasRestantes = floor(($diferenciaSegundos % (60 * 60 * 24)) / 3600);
    $minutosRestantes = floor(($diferenciaSegundos % 3600) / 60);

    // Imprime la diferencia en días, horas y minutos
    echo "Días: $dias, Horas restantes: $horasRestantes, Minutos restantes: $minutosRestantes";
}
//  $fechaHoraActual = time(); // Obtiene la hora actual

//  // Fecha y hora deseada (debes especificarla en formato 'H:i:s')
//  $fechaHoraDeseada = strtotime(readline("Escribe la fecha: ")); 
 
//  // Calcula la diferencia en segundos
//  $diferenciaSegundos = $fechaHoraDeseada - $fechaHoraActual;
 
//  // Calcula las horas y minutos restantes
//  $horasRestantes = floor($diferenciaSegundos / 3600); 
//  $minutosRestantes = floor(($diferenciaSegundos % 3600) / 60); 
 
//  // Imprime la diferencia en horas y minutos
//  echo "Horas restantes: $horasRestantes, Minutos restantes: $minutosRestantes";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Samuel Arteaga</title>
</head>
<body>
    <form action="ejercicio8.php" method="get">
        <label for="fechaInicial">Introduce la fecha inicial</label><br><br>
        <input type="datetime-local" name="fechaInicial"><br><br>
        <label for="fechaFinal">Introduce la fecha final</label><br><br>
        <input type="datetime-local" name="fechaFinal"><br><br>
        <input type="submit" value="Enviar"><br><br>
    </form>
</body>
</html>