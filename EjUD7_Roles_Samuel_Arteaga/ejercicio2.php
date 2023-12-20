<?php

/**
 * @author Samuel Arteaga López <samu.ar.lo.04@gmail.com>
 */

/**2. Crea un formulario de identificación de usuario de modo que el usuario introduzca su nombre,
apellido, asignatura y grupo. Además debe seleccionar si es menor o mayor de edad y si tiene
un cargo o no. Según los datos introducidos, se clasificará en un perfil según la siguiente tabla:
Perfil Mayor de edad Menor de edad Con cargo Sin cargo
Delegado X X
Estudiante X X
Profesor X X
Director X X
Genera una página para cada perfil de la tabla en la que se muestre un saludo de bienvenida
indicando los datos del usuario (nombre y apellidos) y mostrando la asignatura y grupo elegidos.
Además deberá poder cerrar la sesión y volver a la página del formulario. Utiliza las sesiones
para poder realizar este ejercicio. */

session_start();

$_SESSION["nombre"] = $_POST["nombre"];
$_SESSION["apellidos"] = $_POST["apellidos"];
$_SESSION["asignatura"] = $_POST["asignatura"];
$_SESSION["edad"] = $_POST["edad"];
$_SESSION["grupo"] = $_POST["grupo"];
$_SESSION["cargo"] = $_POST["cargo"];


if (isset($_POST["Acceder"])) {

    $nombre = $_POST["nombre"];
    $apellidos = $_POST["apellidos"];
    $asignatura = $_POST["asignatura"];
    $edad = $_POST["edad"];
    $grupo = $_POST["grupo"];
    $cargo = $_POST["cargo"];

    if($edad == "menor" && $cargo == "con"){
        header("Location: delegado.php");
    }
    else if($edad == "menor" && $cargo == "sin"){
        header("Location: estudiante.php");
    }
    else if($edad == "mayor" && $cargo == "sin"){
        header("Location: profesor.php");
    }
    else if($edad == "mayor" && $cargo == "con"){
        header("Location: director.php");
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
        <form action="ejercicio2.php" method="post">
            <label for="nombre">Nombre:</label><br><br>
            <input type="text" name="nombre" required><br><br>

            <label for="apellidos">Apellidos:</label><br><br>
            <input type="text" name="apellidos" required><br><br>

            <label for="asignatura">Asignatura:</label><br><br>
            <input type="text" name="asignatura" required><br><br>

            <label for="grupo">Grupo:</label><br><br>
            <input type="text" name="grupo" required><br><br>

            <label for="edad">Mayor de edad</label><br><br>
            Si<input type="radio" name="edad" value="mayor" required>
            No<input type="radio" name="edad" value="menor" required><br><br>

            <label for="cargo">Cargo</label><br><br>
            Si<input type="radio" name="cargo" value="con" required>
            No<input type="radio" name="cargo" value="sin" required><br><br>

            <input type="submit" name="Acceder" value="Acceder">
        </form>
    </body>
</html>