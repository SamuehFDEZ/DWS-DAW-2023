<?php

/**
 * @author Samuel Arteaga López <samu.ar.lo.04@gmail.com>
 */

/**9. Usa el formulario (Ejercicio 21 UD5) de zona horaria donde se indique la zona horaria y
muestre la hora y la zona elegidas guardando estos datos en una Cookie. Se deben mostrar la
hora y la zona actual y la hora y la zona anterior (cookie).*/

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
        $horaActual = date('H:i:s');

        // Mostrar la hora actual
        echo "La hora actual en la zona horaria {$zonaHoraria} es: {$horaActual}";
    } else {
        echo "Zona horaria no válida.";
    }

    $cookie_name = "miCookie";

    $cookie_value = "Zona horaria: " . $zonaHoraria . ", Hora Actual " . $horaActual;
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
    <?php
    /**Con este php embebido en html damos lugar con un if si se ha establecido o no, si lo ha hecho
         * imprimimos todos los valores
         */
        if (!isset($_COOKIE[$cookie_name])) {
            echo "El nombre de la cookie " . $cookie_name . " no está definida!";
        } else {
            echo "Cookie " .  $cookie_name . " está definida!<br>";

            echo "Los valores de la cookie son: " . $_COOKIE[$cookie_name];
        }
    ?>
</body>
</html>
