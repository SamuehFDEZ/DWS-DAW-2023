<?php 
/**
 * @author Samuel Arteaga López <samu.ar.lo.04@gmail.com>
 */

/**20. Realiza un programa que pida una hora por teclado y que muestre luego el saludo, esto es:
buenos días, buenas tardes o buenas noches según la hora. Se utilizarán los tramos de 6 a 12, de
13 a 20 y de 21 a 5 respectivamente. Sólo se tienen en cuenta las horas, los minutos no se deben
introducir por teclado. */

if (isset($_GET["enviar"])) {
    $hora = $_GET["hora"];
    
    if($hora >= 6 && $hora <= 12){
        echo "Buenos dias! <br>";
    }
    else if($hora >= 13 && $hora <= 20){
        echo "Buenas tardes! <br>";
    }
    else if($hora > 24){
        echo "Hora incorrecta! <br>";

    }
    else{
        echo "Buenas noches! <br>";

    }
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
    <form action="ejercicio20.php" method="get">
        <label for="hora">Introduce la hora</label><br><br>
        <input type="text" name="hora"><br><br>
        <input type="submit" name="enviar" value="Enviar"><br><br>
    </form>
</body>
</html>