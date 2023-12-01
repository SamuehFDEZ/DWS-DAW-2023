<?php

/**
 * @author Samuel Arteaga López <samu.ar.lo.04@gmail.com>
 */

/**9. Usa el formulario del ejercicio 9 de Cookies con selección de cálculo de media, mediana y
moda de modo que uses la sesión para mostrar los números, la media, mediana y/o moda
seleccionadas actualmente y además muestre los números, la media, mediana y moda de la
selección anterior.*/
session_start(); //iniciamos la sesión

if (isset($_POST["enviar"])) {
    $zonaHoraria = $_POST["zonaHoraria"];

    //almacenamos en un array los 19 paises y la capital
    $zonasHorarias = array("España", "Japón", "Irlanda", "Nueva York", "Antananarivo", 
    "Australia", "Brasil", "China", "Sudáfrica", "Canadá", "India", "Italia", "México", "Egipto", "Jamaica", "Rusia", "Singapur", "Turquía",
    "Argentina", "Noruega");

    //comprobamos i se incluye en el array los paises y creamos una matriz, 
    // a cada pais le asignamos su zona horaria
    if (in_array($zonaHoraria, $zonasHorarias)) {
        // Mapear zonas horarias
        $zonas = array(
            'España' => 'Europe/Madrid',
            'Japón' => 'Asia/Tokyo',
            'Irlanda' => 'Europe/Dublin',
            'Nueva York' => 'America/New_York',
            'Antananarivo' => 'Indian/Antananarivo',
            'Australia' => 'Australia/Sydney',
            'Brasil' => 'America/Sao_Paulo',
            'China' => 'Asia/Shanghai',
            'Sudáfrica' => 'Africa/Johannesburg',
            'Canadá' => 'America/Toronto',
            'India' => 'Asia/Kolkata',
            'Italia' => 'Europe/Rome',
            'México' => 'America/Mexico_City',
            'Egipto' => 'Africa/Cairo',
            'Jamaica' => 'America/Jamaica',
            'Rusia' => 'Europe/Moscow',
            'Singapur' => 'Asia/Singapore',
            'Turquía' => 'Europe/Istanbul',
            'Argentina' => 'America/Argentina/Buenos_Aires',
            'Noruega' => 'Europe/Oslo',

        );

        // dentro de una variable almacenamos la matriz creada = España[Europe/Madrid]
        $identificadorZonaHoraria = $zonas[$zonaHoraria];

        // para cada zona horaria la guardamos el el date_default
        date_default_timezone_set($identificadorZonaHoraria);

        //la hora actual
        $horaAntesCambio = date('H:i:s');

        $_SESSION["horaActual"] = $horaAntesCambio;

        // Mostrar la hora actual
        echo "La hora actual en la zona horaria {$zonaHoraria} es: {$horaAntesCambio} <br>";
    } else {
        echo "Zona horaria no válida. <br>";
    }

        
    if (empty($_SESSION["zonaHoraria"]) && empty($_SESSION["horaActual"])) {
        $_SESSION["zonaHoraria"] = $_POST["zonaHoraria"];
        $_SESSION["horaActual"] = $horaAntesCambio;

    } 
    else {
        $_SESSION["zonaHorariaAntiguo"]  = $_SESSION["zonaHoraria"];
        $_SESSION["zonaHoraria"] = $_POST["zonaHoraria"];

        $_SESSION["horaActualAntiguo"]  = $_SESSION["horaActual"];
        $_SESSION["horaActual"] = $horaAntesCambio;

        echo "Los datos anteriormente introducidos son: ", $_SESSION["zonaHorariaAntiguo"]," ", $_SESSION["horaActualAntiguo"]. "<br>";
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
    <form action="ejercicio9.php" method="post">
        <label for="zonaHoraria">Selecciona el lugar para saber su hora</label><br><br>
        <select name="zonaHoraria">
            <option value="España">España</option>
            <option value="Japón">Japón</option>
            <option value="Irlanda">Irlanda</option>
            <option value="Nueva York">Nueva York</option>
            <option value="Antananarivo">Antananarivo</option>
            <option value="Australia">Australia</option>
            <option value="Brasil">Brasil</option>
            <option value="China">China</option>
            <option value="Sudáfrica">Sudáfrica</option>
            <option value="Canadá">Canadá</option>
            <option value="India">India</option>
            <option value="Italia">Italia</option>
            <option value="México">México</option>
            <option value="Egipto">Egipto</option>
            <option value="Jamaica">Jamaica</option>
            <option value="Rusia">Rusia</option>
            <option value="Singapur">Singapur</option>
            <option value="Turquía">Turquía</option>
            <option value="Argentina">Argentina</option>
            <option value="Noruega">Noruega</option>
        </select><br><br>
        <input type="submit" name="enviar" value="Enviar"><br><br>
    </form>
</body>
</html>
