<?php

/**
 * @author Samuel Arteaga López <samu.ar.lo.04@gmail.com>
 */

/**10. Usa el formulario (Ejercicio 22 UD5) que guarde en una Cookie la preferencia del usuario de si
desea o no recibir publicidad y que muestre la opción anterior y la nueva elegida en caso de que
la modifique.*/

if (isset($_POST["enviar"])) {
    $email = $_POST["correo"];

    if(filter_var($email, FILTER_VALIDATE_EMAIL) && isset($_POST["publicidad"])){
        echo "El usuario con email $email ha aceptado recibir publicidad <br>";
    }
    else{
        echo "ERROR!<br>";
    }

    $cookie_name = "miCookie";

    $cookie_value = "" . $email. ",". isset($_POST["publicidad"]);
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
    <form action="ejercicio10.php" method="post">
        <label for="correo">Introduce tu correo:</label><br><br>
        <input type="text" name="correo"><br><br>
        Acepto recibir publicidad<input type="checkbox" name="publicidad"><br><br>
        <input type="submit" name="enviar" value="Enviar">&nbsp;
        <input type="reset" name="borrar" value="Borrar">
        <?php 
        /**Con este php embebido en html damos lugar con un if si se ha establecido o no, si lo ha hecho
         * imprimimos todos los valores
         */
            if (!isset($_COOKIE[$cookie_name])) {
                echo "El nombre de la cookie " . $cookie_name . " no está definida!";
            } else {
                echo "Cookie " .  $cookie_name . " está definida!<br>";
    
                echo "Los valores de la cookie son: " . $_COOKIE[$cookie_name]."<br>";
            }
        ?>
    </form>
</body>
</html>