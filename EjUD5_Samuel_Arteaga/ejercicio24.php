<?php 
    /*@author Samuel Arteaga López <samu.ar.lo.04@gmail.com>
24. Escribe un formulario de recogida de datos que conste de dos páginas: En la primera página
se solicitan los datos y se muestran errores tras validarlos. En la segunda página se muestra toda
la información introducida por el usuario si no hay errores errores. Los datos a introducir son:
Nombre, Apellidos, Edad, Peso (entre 10 y 150), Sexo, Estado Civil (Soltero, Casado, Viudo,
Divorciado, Otro) Aficiones: Cine, Deporte, Literatura, Música, Cómics, Series, Videojuegos.
Debe tener los botones de Enviar y Borrar  */

    require "ejercicio24_valida.php";
  
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

        if (!validaRequerido($nombre)) { //Valida que el campo nombre no esté vacío.
            $errores[] = "El campo nombre es incorrecto.";
        }
        else{
            $link = "nombre=".$nombre."&";
        }

        if (!validaRequerido($apellidos)) {
            $errores[] = "El campo apellido es incorrecto";
        }
        else{
            $link = $link."apellidos=".$apellidos."&";

        }

        if (!validaRequerido($edad)) {
            $errores[] = "El campo edad es incorrecto";
        }
        else{
            $link = $link."edad=".$edad."&";

        }

        if (!validaRequerido($peso)) {
            $errores[] = "El campo peso es incorrecto";
        }
        else{
            $link = $link."edad=".$peso."&";

        }

        $arrayEstadoCivil = ["soltero","casado","viudo","divorciado","otro"];

        if (!in_array($estadoCivil, $arrayEstadoCivil)) {
            $errores[] = "El campo estado civil es incorrecto";
        }
        else{
            $link = $link."estadoCivil=".$estadoCivil."&";

        }
        if (!validarCheckboxes($aficiones)) {
            $errores[] = "El campo de aficiones es incorrecto";
        }
        else{
            $link = $link."aficiones=". implode(", ", $aficiones) ."&";
            $link = $link."otro=". $otro;

        }
       
        //Verifica si ha encontrado errores y de no haber redirige a la página con el mensaje de que pasó la validación.
        if(!$errores){
            header("Location: ejercicio24_procesa.php?".$link);
            exit;
        }
    }
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php if ($errores): ?>
    <ul style="color: #f00;">
    <?php foreach ($errores as $error): ?>
    <li> <?php echo $error ?> </li>
    <?php endforeach; ?>
    </ul>
    <?php endif; ?>
    <form action="ejercicio24.php" method="post" enctype="multipart/form-data">
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