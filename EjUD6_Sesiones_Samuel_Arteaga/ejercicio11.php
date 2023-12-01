<?php
/*@author Samuel Arteaga López <samu.ar.lo.04@gmail.com>

11. Aplica la sesión en el ejercicio 23 de la UD5 para poder pasar los datos en lugar de construir la
url para enviarlos.
*/

function validaRequerido($valor){ //Obliga a introducir datos en campos requeridos
    if (trim($valor) == '') {
        return false;
    } else {
        return true;
    }
}

function validaEmail($valor){ //valida que se haya introducido un email user@ejemplo.com
    if (filter_var($valor, FILTER_VALIDATE_EMAIL) === FALSE) {
        return false;
    } else {
        return true;
    }
}

function validarCheckboxes($valor){
    // Verifica si el parámetro está definido y no está vacío
    return is_array($valor) && count($valor) > 0;
}

session_start(); //iniciamos la sesión

//Guarda los valores de los campos en variables, siempre y cuando se haya enviado el formulario, si no guardará NULL
$nombre = isset($_POST["nombre"]) ? $_POST["nombre"] : null;
$apellidos = isset($_POST["apellidos"]) ? $_POST["apellidos"] : null;
$estudios = isset($_POST["estudios"]) ? $_POST["estudios"] : null;
$trabajo = isset($_POST["trabajo"]) ? $_POST["trabajo"] : [];
$hobbies = isset($_POST["hobbies"]) ? $_POST["hobbies"] : [];
$otro = isset($_POST["otro"]) ? $_POST["otro"] : null;
$errores = array();

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (isset($_POST["enviar"])) {

        if (!validaRequerido($nombre)) { //Valida que el campo nombre no esté vacío.
            $errores[] = "El campo nombre es incorrecto.";
        }

        if (!validaRequerido($apellidos)) {
            $errores[] = "El campo apellido es incorrecto";
        }

        $arrayEstudios = ["primaria", "secundaria", "bachillerato", "fp"];

        if (!in_array($estudios, $arrayEstudios)) {
            $errores[] = "El campo estudios es incorrecto";
        }

        if (!validarCheckboxes($trabajo)) {
            $errores[] = "El campo de situación laboral es incorrecto";
        }

        /* IMPORTANTE!!!!
        Cuando tratemos con checkbox o selects multiples tendremos que tratarlos
        como arrays y hacer una funcion para cada caso: ver: function validarCheckboxes
        si falla hacemos lo mismo para todos, introducirlo en el array de errores
        sino,iteramos con un foreach e introduciremos en la url todo lo que hayamos
        seleccionado tanto en los checkbox como en los select */

        if (in_array("otro", $hobbies) && empty($otro)) {
            $errores[] = "Especifica el otro hobbie";
        } else if (!validarCheckboxes($hobbies)) {
            $errores[] = "Selecciona al menos un hobbie";
        }

        //Verifica si ha encontrado errores y de no haber redirige a la página con el mensaje de que pasó la validación.
        if (!$errores) {
            echo  implode(", ",$errores) ;
        }

        if (
            empty($_SESSION["nombre"]) && empty($_SESSION["apellidos"]) && empty($_SESSION["estudios"])
            && empty($_SESSION["trabajo"]) && empty($_SESSION["hobbies"]) && empty($_SESSION["otro"])
        ) {
            $_SESSION["nombre"] = $_POST["nombre"];
            $_SESSION["apellidos"] = $_POST["apellidos"];
            $_SESSION["estudios"] = $_POST["estudios"];
            $_SESSION["trabajo"] = $_POST["trabajo"];
            $_SESSION["hobbies"] = $_POST["hobbies"];
            $_SESSION["otro"] = $_POST["otro"];
        } else {
            $_SESSION["nombreAntiguo"]  = $_SESSION["nombre"];
            $_SESSION["nombre"] = $_POST["nombre"];

            $_SESSION["apellidosAntiguo"]  = $_SESSION["apellidos"];
            $_SESSION["apellidos"] = $_POST["apellidos"];

            $_SESSION["estudiosAntiguo"]  = $_SESSION["estudios"];
            $_SESSION["estudios"] = $_POST["estudios"];

            $_SESSION["trabajoAntiguo"]  = $_SESSION["trabajo"];
            $_SESSION["trabajo"] = $_POST["trabajo"];

            $_SESSION["hobbiesAntiguo"]  = $_SESSION["hobbies"];
            $_SESSION["hobbies"] = $_POST["hobbies"];

            $_SESSION["otroAntiguo"]  = $_SESSION["otro"];
            $_SESSION["otro"] = $_POST["otro"];

            echo "Los datos anteriormente introducidos son: ", $_SESSION["nombreAntiguo"], ", ", $_SESSION["apellidosAntiguo"], ", ",
            $_SESSION["estudiosAntiguo"], ", ", $_SESSION["trabajoAntiguo"], ", ", implode(", ",$_SESSION["hobbiesAntiguo"]) , ", ",$_SESSION["otroAntiguo"]  . "<br>";
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
    <?php if ($errores) : ?>
        <ul style="color: #f00;">
            <?php foreach ($errores as $error) : ?>
                <li> <?php echo $error ?> </li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>
    <form action="ejercicio11.php" method="post">
        <fieldset>
            <legend>Datos Personales</legend>

            <label for="nombre">Nombre:</label><br><br>
            <input type="text" name="nombre"><br><br>

            <label for="apellidos">Apellidos:</label><br><br>
            <input type="text" name="apellidos"><br><br>
        </fieldset>
        <br>
        <fieldset>
            <legend>Situación académica/laboral</legend>
            Nivel de estudios:<select name="estudios">
                <option value="primaria" <?php echo ($estudios == "primaria") ? "selected" : "" ?>>Primaria</option>
                <option value="secundaria" <?php echo ($estudios == "secundaria") ? "selected" : "" ?>>Secundaria</option>
                <option value="bachillerato" <?php echo ($estudios == "bachillerato") ? "selected" : "" ?>>Bachillerato</option>
                <option value="fp" <?php echo ($estudios == "fp") ? "selected" : "" ?>>Fp</option>
            </select>
            <br><br>
            Situación laboral:<select multiple name="trabajo[]">
                <option value="estudiando" <?php echo in_array("estudiando", $trabajo) ? "selected" : "" ?>>Estudiando</option>
                <option value="trabajando" <?php echo in_array("trabajando", $trabajo) ? "selected" : "" ?>>Trabajando</option>
                <option value="buscando empleo" <?php echo in_array("buscando empleo", $trabajo) ? "selected" : "" ?>>Buscando empleo</option>
                <option value="desempleado" <?php echo in_array("desempleado", $trabajo) ? "selected" : "" ?>>Desempleado</option>
            </select>
        </fieldset>
        <br>
        <fieldset>
            <legend>Otros:</legend>
            Hobbies: <br><br> Videojuegos<input type="checkbox" name="hobbies[]" value="videojuegos" <?php echo in_array("videojuegos", $hobbies) ? "selected" : "" ?>><br><br>
            Historia<input type="checkbox" name="hobbies[]" value="historia" <?php echo in_array("historia", $hobbies) ? "selected" : "" ?>><br><br>
            Ajedrez<input type="checkbox" name="hobbies[]" value="ajedrez" <?php echo in_array("ajedrez", $hobbies) ? "selected" : "" ?>><br><br>
            Ver series<input type="checkbox" name="hobbies[]" value="ver series" <?php echo in_array("ver series", $hobbies) ? "selected" : "" ?>> <br><br>
            Otro:<input type="checkbox" name="hobbies[]" value="otro" <?php echo in_array("otro", $hobbies) ? "selected" : "" ?>>
            <input type="text" name="otro" <?php echo $otro; ?>>&nbsp;<br><br>
            <br><br>
        </fieldset>
        <br>
        <fieldset>
            <legend>Enviar/Borrar</legend>
            <input type="submit" name="enviar" value="Enviar">&nbsp;
            <input type="reset" name="borrar" value="Borrar">
        </fieldset>
    </form>
</body>

</html>