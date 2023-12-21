<?php

/**
 * @author Samuel Arteaga López <samu.ar.lo.04@gmail.com>
 */

/**2. Crea un token de formulario para el formulario del ejercicio 2 de Roles (Delegado, Estudiante,
Profesor y Director) de modo que se pueda asegurar la sesión de cada usuario desde la página
del formulario a la página personalizada de cada uno. Debes comprobar el resultado avisando
en caso de que el token no coincida. Puedes añadir un botón cambiar SID que generará un
nuevo token en la sesión y así comprobar que detecta si la SID no coincide. */

session_start();

if(!isset($_SESSION["token"])){
    $_SESSION["token"] = bin2hex(openssl_random_pseudo_bytes(24));
}  

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
    $_SESSION["hidden"] = $_POST["token"];


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

    if (!isset($_POST["token"])) {
        print("No se ha encontrado token!");
    } 
    else {
        //Si existe, debemos comprobar que el token recibido en $_POST es
        //el que hemos almacenado en la variable de la sesión $_SESSION
        if (hash_equals($_POST["token"], $_SESSION["token"]) === false) {
            print("El token no coincide!");
        } 
        else {
            //El token es correcto y continúa el procesamiento con seguridad
            print("El token es correcto y podemos ejecutar acciones");
        }
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
            <input type="hidden" name="token" value="<?php echo $_SESSION["token"]; ?>">
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