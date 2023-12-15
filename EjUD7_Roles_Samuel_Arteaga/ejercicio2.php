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