<?php

/**
 * @author Samuel Arteaga López <samu.ar.lo.04@gmail.com>
 */

/**1. Crea un token de formulario para el formulario del ejercicio 1 de Roles (Gerente, Sindicalista y
Responsable de Nóminas) de modo que se pueda asegurar la sesión de cada usuario desde la
página del formulario a la página personalizada de cada uno. Debes comprobar el resultado
avisando en caso de que el token no coincida. Puedes añadir un botón cambiar SID que
generará un nuevo token en la sesión y así comprobar que detecta si la SID no coincide. */

session_start();
$_SESSION["token"] = bin2hex(openssl_random_pseudo_bytes(24));
function salarioMaximo($array){
    return max($array);
}

function salarioMinimo($array){
    return min($array);
}

function salarioMedio($array){
    return array_sum($array) / count($array);
}


if (isset($_POST["Acceder"])) {
    // Obtén los valores del formulario
    $nombre = $_POST["nombre"];
    $rol = $_POST["rol"];


    $_SESSION["nombre"] = $_POST["nombre"];
    $_SESSION["rol"] = $_POST["rol"];

    $array = array(
        "Samuel" => 1200,
        "Adrian" => 1300,
        "Ivan" => 1400,
        "Alejandro" => 1500,
        "Jose" => 1600,
        "Lucas" => 1700,
        "Sergio" => 1800
    );

    $_SESSION["array"] = $array;


    // Calcular los resultados
    $salarioMaximo = salarioMaximo($array);
    $salarioMinimo = salarioMinimo($array);
    $salarioMedio = salarioMedio($array);

    $_SESSION["salarioMaximo"] = $salarioMaximo;
    $_SESSION["salarioMinimo"] = $salarioMinimo;
    $_SESSION["salarioMedio"] = $salarioMedio;


    switch ($rol) {
        case "Gerente":
            header("Location: gerente.php");
            break;

        case "Sindicalista":
            header("Location: sindicalista.php");
            break;

        case "Responsable":
            header("Location: responsable.php");
            break;
    }

    if (!isset($_POST['token'])) {
        print('No se ha encontrado token!');
    } 
    else {
        //Si existe, debemos comprobar que el token recibido en $_POST es
        //el que hemos almacenado en la variable de la sesión $_SESSION
        if (hash_equals($_POST['token'], $_SESSION['token']) === false) {
            print('El token no coincide!');
        } 
        else {
            //El token es correcto y continúa el procesamiento con seguridad
            print('El token es correcto y podemos ejecutar acciones');
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
        <form action="ejercicio1.php" method="post">
            <input type="hidden" name="token" value="<?php echo $_SESSION['token']; ?>">
            Nombre: <input type="text" name="nombre">
            <p>
                Gerente <input type="radio" name="rol" value="Gerente">
                Sindicalista <input type="radio" name="rol" value="Sindicalista">
                Responsable de Nóminas <input type="radio" name="rol" value="Responsable">
            </p>
            <input type="submit" name="Acceder" value="Acceder">
        </form>
    </body>

</html>