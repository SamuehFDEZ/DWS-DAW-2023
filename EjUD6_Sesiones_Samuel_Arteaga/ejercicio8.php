<?php

/**
 * @author Samuel Arteaga López <samu.ar.lo.04@gmail.com>
 */

/**8. Usa el formulario del ejercicio 8 de Cookies con selección de zona horaria para mostrar la hora
y zona elegidas de modo que uses la sesión para mostrar la zona horaria y hora actuales y
además muestre la zona horaria y hora de la selección anterior. */

// Función para calcular la moda de un conjunto de números
function calcularModa($numeros){
    $frecuencias = array_count_values($numeros);
    $moda = array_keys($frecuencias, max($frecuencias));
    return $moda;
}

// Función para calcular la mediana de un conjunto de números
function calcularMediana($numeros){
    sort($numeros);
    $count = count($numeros);
    $mid = floor(($count - 1) / 2);

    if ($count % 2) {
        // Si el número de elementos es impar, la mediana es el valor en el medio
        return $numeros[$mid];
    } else {
        // Si el número de elementos es par, la mediana es el promedio de los dos valores centrales
        return ($numeros[$mid] + $numeros[$mid + 1]) / 2;
    }
}

if (isset($_POST["enviar"])) {

    // Verificar si se enviaron números
    if (isset($_POST['numeros']) && !empty($_POST['numeros'])) {
        $numeros = explode(',', $_POST['numeros']);
        $numeros = array_map('intval', $numeros); // Convierte los valores a enteros

        // Verificar si se seleccionaron opciones de cálculo
        if (isset($_POST['calculo'])) {
            $resultados = array();

            // Calcular la media
            if (in_array('media', $_POST['calculo'])) {
                $media = array_sum($numeros) / count($numeros);
                $resultados['media'] = $media;
            }

            // Calcular la moda
            if (in_array('moda', $_POST['calculo'])) {
                $moda = calcularModa($numeros);

                echo '<li>Moda: ';

                if (is_array($moda)) {
                    echo implode(', ', $moda);
                } else {
                    echo $moda;
                }

                echo '</li>';
            }

            // Calcular la mediana
            if (in_array('mediana', $_POST['calculo'])) {
                $mediana = calcularMediana($numeros);
                $resultados['mediana'] = $mediana;
            }

            // Mostrar resultados
            echo '<ul>';
            foreach ($resultados as $key => $value) {
                echo '<li>' . ucfirst($key) . ': ' . $value . '</li>';
            }
            echo '</ul>';
        } else {
            echo '<p>No se seleccionaron opciones de cálculo.</p>';
        }
    } else {
        echo '<p>No se ingresaron números.</p>';
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
    <form action="ejercicio8.php" method="post">
        <label for="numeros">Ingrese números (separados por comas):</label>
        <input type="text" name="numeros" id="numeros" required>
        <br><br>

        <label>Opciones de cálculo:</label>
        <input type="checkbox" name="calculo[]" value="media"> Media
        <input type="checkbox" name="calculo[]" value="moda"> Moda
        <input type="checkbox" name="calculo[]" value="mediana"> Mediana
        <br><br>
        <input type="submit" name="enviar" value="Calcular">
    </form>
    <?php
        session_start(); //iniciamos la sesión
        
        if (empty($_SESSION["numeros"]) && empty($_SESSION["calculo"])) {
            $_SESSION["numeros"] = $_POST["numeros"];
            $_SESSION["calculo"] = $_POST["calculo"];
        } 
        else {
            $_SESSION["numerosAntiguo"]  = $_SESSION["numeros"];
            $_SESSION["numeros"] = $_POST["numeros"];

            $_SESSION["calculoAntiguo"]  = $_SESSION["calculo"];
            $_SESSION["calculo"] = $_POST["calculo"];

            echo "Los datos anteriormente introducidos son: ",  $_SESSION["numerosAntiguo"],  implode(", ",$_SESSION["calculoAntiguo"]);
        }
    ?>
</body>

</html>