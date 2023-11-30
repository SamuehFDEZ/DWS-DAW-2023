<?php

/**
 * @author Samuel Arteaga López <samu.ar.lo.04@gmail.com>
 */

/**8. Usa el formulario (Ejercicio 18 UD5) de cálculo de media, mediana y moda donde se indiquen
varios números y pueda seleccionar una o todas las opciones de cálculo sobre esos números y
las muestre guardando estos datos en una Cookie. Se deben mostrar los números con los
cálculos seleccionados en el presente y los números y los cálculos realizados en la ocasión
anterior (cookie). */
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

    $cookie_name = "miCookie";

    $cookie_value = "Numeros: " . implode(", ",$numeros) . ", Media " . $media . ", Mediana " . $mediana. ", Moda: ". implode(", ",$moda);
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