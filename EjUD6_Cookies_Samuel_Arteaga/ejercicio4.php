<?php 

/**
 * @author Samuel Arteaga López <samu.ar.lo.04@gmail.com>
 */

/**4. Usa el formulario (Ejercicio 3 UD5) del conversor euros a pesetas y viceversa de la cantidad
introducida por el usuario y guardar los datos en una Cookie. Se deben mostrar la cantidad,
moneda y conversión actual y la cantidad, moneda y conversión anterior (cookie). */

if (isset($_POST["boton"])) {

    $cookie_name = "miCookie";

    $euros = $_POST["euros"];
    echo "$euros <br>";

    $conversor = $_POST["conversor"];

    if ($conversor == "euro") {
        echo "Has elegido convertir la cantidad a euros <br>";
        $resultados = $euros/166.386;
        echo "La cantidad de pesetas a euros es ". round($resultados, 4). " euros <br>";
    }
    else{
        echo "Has elegido convertir la cantidad a pesetas <br>";
        $resultado = $euros*166.386;
        echo "La cantidad de euros a pesetas es ". round($resultado, 4). " pesetas <br>";
    }


    $cookie_value = $euros. ", ".$conversor;  

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
    <form action="ejercicio4.php" method="post">
        <label for="conversorEuros">Introduce la cantidad:</label><br><br>
        <input type="text" name="euros"><br><br>

        <input type="radio" name="conversor" value="euro" >Euros<br><br>
        <input type="radio" name="conversor" value="peseta" >Pesetas<br><br>


        <p>1€ equivale a 166.386 pesetas</p>
        <p>1pta equivale a 0.0060 euros</p>

        <input type="submit" name="boton" value="calcular"><br><br>
        <?php
            if (!isset($_COOKIE[$cookie_name])) {
                echo "El nombre de la cookie " . $cookie_name . " no está definida!";
            } 
            else {
                echo "Cookie " .  $cookie_name . " está definida!<br>";
                    
                echo "Los valores de la cookie son: " . $_COOKIE[$cookie_name];
            }
        ?>
    </form>
</body>
</html>