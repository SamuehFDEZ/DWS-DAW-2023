<?php

/**
 * @author Samuel Arteaga López <samu.ar.lo.04@gmail.com>
 */

/**10. Usa el formulario del ejercicio 10 de Cookies con selección de si se desea publicidad o no de
modo que uses la sesión para mostrar el nombre del usuario y si desea o no publicidad del
usuario actual y además muestre usuario y elección del anterior.*/

if (isset($_POST["enviar"])) {
    $email = $_POST["correo"];

    if(filter_var($email, FILTER_VALIDATE_EMAIL) && isset($_POST["publicidad"])){
        echo "El usuario con email $email ha aceptado recibir publicidad <br>";
    }
    else{
        echo "ERROR!<br>";
    }
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
        <input type="reset" name="borrar" value="Borrar"><br><br>
        <?php
            session_start(); //iniciamos la sesión
            
            if (empty($_SESSION["correo"]) && empty($_SESSION["publicidad"])) {
                $_SESSION["correo"] = $_POST["correo"];
                $_SESSION["publicidad"] = $_POST["publicidad"];
            } 
            else {
                $_SESSION["correoAntiguo"]  = $_SESSION["correo"];
                $_SESSION["correo"] = $_POST["correo"];

                $_SESSION["publicidadAntiguo"]  = $_SESSION["publicidad"];
                $_SESSION["publicidad"] = $_POST["publicidad"];

                echo "Los datos anteriormente introducidos son: ",  $_SESSION["correoAntiguo"], $_SESSION["publicidadAntiguo"];
            }
    ?>
    </form>
</body>
</html>