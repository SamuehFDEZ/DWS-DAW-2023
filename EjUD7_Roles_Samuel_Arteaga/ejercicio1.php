<?php

/**
 * @author Samuel Arteaga López <samu.ar.lo.04@gmail.com>
 */

/**1. Crea un formulario de autenticación para visualizar resultados basándote en el Ejercicio 10 de la
UD5 de modo que, según el usuario que acceda (recoge un nombre y perfil (Gerente,
Sindicalista y Responsable de Nóminas, todos excluyentes entre sí) y crea el vector de
empleados en este formulario), sea redirigido a su página personalizada donde pueda ver los
datos a los que tiene permiso. Así pues, el Gerente podrá ver todos los resultados del salario
mínimo, máximo y promedio, el sindicalista sólo puede acceder al salario medio y la
responsable de Nóminas al salario mínimo y máximo. Añade un título a cada página indicando
el rol o si es el formulario de la empresa junto con tu nombre. En cada perfil, añade un botón
cerrar sesión que permita liberar la sesión y volver a la página del formulario */

session_start();

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