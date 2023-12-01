<?php 

/**
 * @author Samuel Arteaga López <samu.ar.lo.04@gmail.com>
 */

/**7. Usa el formulario del ejercicio 7 de Cookies de caja fuerte de modo que uses la sesión para
mostrar la contraseña introducida y el número de intentos actuales y además muestre el las
contraseñas introducidas de la ejecución anterior. Si abre la caja o llega al máximo de intentos, a
los datos anteriores se añadirá la contraseña correcta y un mensaje de éxito o no conseguido. */

if (isset($_POST["enviar"])) {

    $numRand = isset($_POST["numRand"]) ? $_POST["numRand"] : mt_rand(1000, 9999); // Obtener o generar número aleatorio de 4 cifras
    $oportunidades = isset($_POST["oportunidades"]) ? $_POST["oportunidades"] : 4; // Obtener o establecer el número de oportunidades

    echo $numRand;

    $numeroAdivinar = $_POST["numeroAdivinar"];
    $oportunidades--;

    if ($numeroAdivinar == $numRand) {
        // Combinación correcta
        echo "<p style='color:green;'>La caja fuerte se ha abierto satisfactoriamente</p>";
        // Puedes realizar acciones adicionales aquí si es necesario
    } else {
        // Combinación incorrecta
        echo "<p style='color:red;'>Lo siento, esa no es la combinación</p>";

        // Mostrar el número de oportunidades restantes
        if ($oportunidades > 0) {
            echo "<p>Te quedan $oportunidades oportunidades.</p>";
        } else {
            echo "<p>Te has quedado sin oportunidades. La combinación era $numRand.</p>";
            // Puedes realizar acciones adicionales aquí si es necesario
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
    <form action="ejercicio7.php" method="post">
        <input type="hidden" name="numRand" value="<?php echo $numRand; ?>">
        <input type="hidden" name="oportunidades" value="<?php echo $oportunidades; ?>">

        <label for="numeroAdivinar">Introduce el número de 4 cifras</label><br><br>
        <input type="text" name="numeroAdivinar"><br><br>
        <input type="submit" name="enviar" value="Enviar">
    </form>
    <?php
        session_start(); //iniciamos la sesión
        
        if (empty($_SESSION["numRand"]) && empty($_SESSION["oportunidades"]) && empty($_SESSION["numeroAdivinar"])) {
            $_SESSION["numero"] = $_POST["numero"];
            $_SESSION["oportunidades"] = $_POST["oportunidades"];
            $_SESSION["numeroAdivinar"] = $_POST["numeroAdivinar"];
        } 
        else {
            $_SESSION["numeroAntiguo"]  = $_SESSION["numero"];
            $_SESSION["numero"] = $_POST["numero"];

            $_SESSION["oportunidadesAntiguo"]  = $_SESSION["oportunidades"];
            $_SESSION["oportunidades"] = $_POST["oportunidades"];

            $_SESSION["numeroAdivinarAntiguo"]  = $_SESSION["numeroAdivinar"];
            $_SESSION["numeroAdivinar"] = $_POST["numeroAdivinar"];

            echo "Los datos anteriormente introducidos son: ",  $_SESSION["numeroAntiguo"],  $_SESSION["oportunidadesAntiguo"],  $_SESSION["numeroAdivinarAntiguo"];
        }
    ?>
</body>
</html>
