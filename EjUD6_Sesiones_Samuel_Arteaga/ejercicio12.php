<?php 
    /*@author Samuel Arteaga López <samu.ar.lo.04@gmail.com>
12. Aplica la sesión en el ejercicio 24 de la UD5 para poder pasar los datos en lugar de construir la
url para enviarlos. */

function validaRequerido($valor){ //Obliga a introducir datos en campos requeridos
    if(trim($valor) == ''){
        return false;
    }
    else{
        return true;
    }
}

function validaEmail($valor){ //valida que se haya introducido un email user@ejemplo.com
    if(filter_var($valor, FILTER_VALIDATE_EMAIL) === FALSE){
        return false;
    }
    else{
        return true;
    }
}

function validarCheckboxes($valor) {
    // Verifica si el parámetro está definido y no está vacío
      return is_array($valor) && count($valor) > 0;
}

session_start(); //iniciamos la sesión

  
    //Guarda los valores de los campos en variables, siempre y cuando se haya enviado el formulario, si no guardará NULL
    $nombre = isset($_POST["nombre"]) ? $_POST["nombre"] : null; 
    $apellidos = isset($_POST["apellidos"]) ? $_POST["apellidos"] : null; 
    $edad = isset($_POST["edad"]) ? $_POST["edad"] : null; 
    $peso = isset($_POST["peso"]) ? $_POST["peso"] : null; 
    $sexo = isset($_POST["sexo"]) ? $_POST["sexo"] : null; 
    $estadoCivil = isset($_POST["estadoCivil"]) ? $_POST["estadoCivil"] : null; 
    $aficiones = isset($_POST["aficiones"]) ? $_POST["aficiones"] : null; 
    $otro = isset($_POST["otro"]) ? $_POST["otro"] : null; 
    $errores = array();  
         
    if($_SERVER["REQUEST_METHOD"] == "POST"){

        if (isset($_POST["enviar"])) {

            if (!validaRequerido($nombre)) { //Valida que el campo nombre no esté vacío.
                $errores[] = "El campo nombre es incorrecto.";
            }
            

            if (!validaRequerido($apellidos)) {
                $errores[] = "El campo apellido es incorrecto";
            }
           

            if (!validaRequerido($edad)) {
                $errores[] = "El campo edad es incorrecto";
            }
           

            if (!validaRequerido($peso)) {
                $errores[] = "El campo peso es incorrecto";
            }
           

            $arrayEstadoCivil = ["soltero","casado","viudo","divorciado","otro"];

            if (!in_array($estadoCivil, $arrayEstadoCivil)) {
                $errores[] = "El campo estado civil es incorrecto";
            }
           
            if (!validarCheckboxes($aficiones)) {
                $errores[] = "El campo de aficiones es incorrecto";
            }
           
            //Verifica si ha encontrado errores y de no haber redirige a la página con el mensaje de que pasó la validación.
            if (!$errores) {
                echo  implode(", ",$errores) ;
            }

            if (
                empty($_SESSION["nombre"]) && empty($_SESSION["apellidos"]) && empty($_SESSION["edad"])
                && empty($_SESSION["peso"]) && empty($_SESSION["sexo"]) && empty($_SESSION["estadoCivil"]) && empty($_SESSION["aficiones"]) 
                && empty($_SESSION["otro"]) 
            ) {
                $_SESSION["nombre"] = $_POST["nombre"];
                $_SESSION["apellidos"] = $_POST["apellidos"];
                $_SESSION["edad"] = $_POST["edad"];
                $_SESSION["peso"] = $_POST["peso"];
                $_SESSION["sexo"] = $_POST["sexo"];
                $_SESSION["estadoCivil"] = $_POST["estadoCivil"];
                $_SESSION["aficiones"] = $_POST["aficiones"];
                $_SESSION["otro"] = $_POST["otro"];

            } else {
                $_SESSION["nombreAntiguo"]  = $_SESSION["nombre"];
                $_SESSION["nombre"] = $_POST["nombre"];
    
                $_SESSION["apellidosAntiguo"]  = $_SESSION["apellidos"];
                $_SESSION["apellidos"] = $_POST["apellidos"];
    
                $_SESSION["edadAntiguo"]  = $_SESSION["edad"];
                $_SESSION["edad"] = $_POST["edad"];
    
                $_SESSION["pesoAntiguo"]  = $_SESSION["peso"];
                $_SESSION["peso"] = $_POST["peso"];
    
                $_SESSION["sexoAntiguo"]  = $_SESSION["sexo"];
                $_SESSION["sexo"] = $_POST["sexo"];

                $_SESSION["estadoCivilAntiguo"]  = $_SESSION["estadoCivil"];
                $_SESSION["estadoCivil"] = $_POST["estadoCivil"];

                $_SESSION["aficionesAntiguo"]  = $_SESSION["aficiones"];
                $_SESSION["aficiones"] = $_POST["aficiones"];
    
                $_SESSION["otroAntiguo"]  = $_SESSION["otro"];
                $_SESSION["otro"] = $_POST["otro"];
    
               
            }


        }
        if(isset($_POST["enviar"])){
            header("Location: ejercicio12_valida.php");
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
    <?php if ($errores): ?>
    <ul style="color: #f00;">
    <?php foreach ($errores as $error): ?>
    <li> <?php echo $error ?> </li>
    <?php endforeach; ?>
    </ul>
    <?php endif; ?>
    <form action="ejercicio12.php" method="post">
        <fieldset>
            <legend>Datos Personales</legend>

            <label for="nombre">Nombre:</label><br><br>
            <input type="text" name="nombre" ><br><br>

            <label for="apellidos">Apellidos:</label><br><br>
            <input type="text" name="apellidos" ><br><br>

            <label for="edad">Edad:</label><br><br>
            <input type="text" name="edad" ><br><br>

            <label for="peso">Peso:</label><br><br>
            <input type="text" name="peso" min="10" max="150"><br><br>
        </fieldset>
            <br>
        <fieldset>
            <legend>Género/Situación/Aficiones:</legend>
            Sexo <br>
            Hombre<input type="radio" name="sexo" value="hombre">&nbsp;&nbsp;&nbsp;
            Mujer<input type="radio" name="sexo" value="mujer">
            <br><br>
            Estado Civil:<select name="estadoCivil">
                <option value="soltero" <?php echo ($estadoCivil == "soltero") ? "selected" : ""?> >Soltero</option>
                <option value="casado" <?php echo ($estadoCivil == "casado") ? "selected" : ""?> >Casado</option>
                <option value="viudo" <?php echo ($estadoCivil == "viudo") ? "selected" : ""?> >Viudo</option>
                <option value="divorciado" <?php echo ($estadoCivil == "divorciado") ? "selected" : ""?> >Divorciado</option> 
                <option value="otro" <?php echo ($estadoCivil == "otro") ? "selected" : ""?> >Otro</option>
                <input type="text" name="otro" <?php echo $otro;?> >&nbsp;<br><br>

            </select>
            <br><br>
            Aficiones:<select multiple name="aficiones[]" >
                    <option value="cine" <?php echo ($aficiones == "cine") ? "selected" : ""?> >Cine</option>
                    <option value="deporte" <?php echo ($aficiones == "deporte") ? "selected" : ""?> >Deporte</option>
                    <option value="literatura" <?php echo ($aficiones == "literatura") ? "selected" : ""?> > Literatura</option>
                    <option value="música" <?php echo ($aficiones == "música") ? "selected" : ""?> >Música</option>
                    <option value="cómics" <?php echo ($aficiones == "cómics") ? "selected" : ""?> >Cómics</option>
                    <option value="series" <?php echo ($aficiones == "series") ? "selected" : ""?> >Series</option>
                    <option value="videojuegos" <?php echo ($aficiones == "videojuegos") ? "selected" : ""?> >Videojuegos</option>
                </select>
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