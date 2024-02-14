<?php
/*Del ejercicio 2 de roles */
session_start();

echo "Hola<b> delegado</b> " . $_SESSION["nombre"] . " " . $_SESSION["apellidos"] . "has escogido la asignatura " . $_SESSION["asignatura"] . "y este grupo " . $_SESSION["grupo"];

if (isset($_POST["volver"])) {
    session_unset();
    header("Location: ejercicio2.php");
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
        <form action="ejercicio2.php" method="post">
            <input type="submit" name="volver" value="Cerrar Sesión">
        </form>
    </body>

</html>