<?php 

/**
 * @author Samuel Arteaga López <samu.ar.lo.04@gmail.com>
 */

/**6. Usa el formulario (Ejercicio 9 UD5) de la tabla de multiplicar donde se indique multiplicando y
multiplicador guardando estos datos en una Cookie. Se deben mostrar la tabla, el multiplicando
y multiplicador actual y el multiplicando y multiplicador anterior (cookie). */

if (isset($_POST["enviar"])) {

    $cookie_name = "miCookie";

    $num = $_POST["numero"];

    echo "Tabla de multiplicar del ".$num.":"."<br>"; // imrpimimos mediante concatenaciones su resultado de la multiplicacion
    echo $num."x 1 = ". $num*1 ."<br>";
    echo $num."x 2 = ". $num*2 ."<br>";
    echo $num."x 3 = ". $num*3 ."<br>";
    echo $num."x 4 = ". $num*4 ."<br>";
    echo $num."x 5 = ". $num*5 ."<br>";
    echo $num."x 6 = ". $num*6 ."<br>";
    echo $num."x 7 = ". $num*7 ."<br>";
    echo $num."x 8 = ". $num*8 ."<br>";
    echo $num."x 9 = ". $num*9 ."<br>";
    echo $num."x 10 = ". $num*10 ."<br>";

    $cookie_value = $num;  
    /**Creamos la cookie con los valores de nombre y value */

    setcookie($cookie_name, $cookie_value);
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
    <form action="ejercicio6.php" method="post">
        <label for="numero">Introduce el numero:</label><br><br>
        <input type="number" name="numero" ><br><br>
        <input type="submit" name="enviar" value="Enviar"><br><br>
    </form>
    <?php
    /**Con este php embebido en html damos lugar con un if si se ha establecido o no, si lo ha hecho
         * imprimimos todos los valores
         */
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