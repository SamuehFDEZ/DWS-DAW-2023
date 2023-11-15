<?php 
    /*@author Samuel Arteaga López <samu.ar.lo.04@gmail.com>

23. Escribe un formulario de recogida de datos que conste de dos páginas: En la primera página
se solicitan los datos y se muestran errores tras validarlos. En la segunda página se muestra toda
la información introducida por el usuario si no hay errores errores. Los datos a recoger son datos
personales, nivel de estudios (desplegable), situación actual (selección múltiple: estudiando,
trabajando, buscando empleo, desempleado) y hobbies (marcar de varios mostrados y poner otro
con opción a introducir texto) */
    require "ejercicio23_valida.php";
  
    //Guarda los valores de los campos en variables, siempre y cuando se haya enviado el formulario, si no guardará NULL
    $nombre = isset($_POST["nombre"]) ? $_POST["nombre"] : null;
    $apellidos = isset($_POST["apellidos"]) ? $_POST["apellidos"] : null;
    $estudios = isset($_POST["estudios"]) ? $_POST["estudios"] : null;
    $trabajo = isset($_POST["trabajo"]) ? $_POST["trabajo"] : [];
    $hobbies = isset($_POST["hobbies"]) ? $_POST["hobbies"] : [];
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
        $arrayEstudios = ["primaria","secundaria","bachillerato","fp"];

        if (!in_array($estudios, $arrayEstudios)) {
            $errores[] = "El campo estudios es incorrecto";
        }
        else{
            $link = $link."estudios=".$estudios."&";

        }
        if (!validarCheckboxes($trabajo)) {
            $errores[] = "El campo de situación laboral es incorrecto";
        }
        else{
            $link = $link."trabajo=". implode(", ", $trabajo) ."&";
        }
        /* IMPORTANTE!!!!
        Cuando tratemos con checkbox o selects multiples tendremos que tratarlos
        como arrays y hacer una funcion para cada caso: ver: function validarCheckboxes
        si falla hacemos lo mismo para todos, introducirlo en el array de errores
        sino,iteramos con un foreach e introduciremos en la url todo lo que hayamos
        seleccionado tanto en los checkbox como en los select */

        if(in_array("otro", $hobbies) && empty($otro)){
            $errores[] = "Especifica el otro hobbie";

        }
        else if(!validarCheckboxes($hobbies)){
            $errores[] = "Selecciona al menos un hobbie";

        }
        else{
            $link = $link."hobbie=". implode(", ", $hobbies). "&";
            $link = $link."otro=". $otro;
        }
        
        //Verifica si ha encontrado errores y de no haber redirige a la página con el mensaje de que pasó la validación.
        if(!$errores){
            header("Location: ejercicio23_procesa.php?".$link);
            exit;
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
    <form action="ejercicio23.php" method="post" enctype="multipart/form-data">
        <fieldset>
            <legend>Datos Personales</legend>

            <label for="nombre">Nombre:</label><br><br>
            <input type="text" name="nombre" ><br><br>

            <label for="apellidos">Apellidos:</label><br><br>
            <input type="text" name="apellidos" ><br><br>
        </fieldset>
        <br>
        <fieldset>
            <legend>Situación académica/laboral</legend>
            Nivel de estudios:<select name="estudios">
                <option value="primaria" <?php echo ($estudios == "primaria") ? "selected" : ""?> >Primaria</option>
                <option value="secundaria" <?php echo ($estudios == "secundaria") ? "selected" : ""?>>Secundaria</option>
                <option value="bachillerato" <?php echo ($estudios == "bachillerato") ? "selected" : ""?>>Bachillerato</option>
                <option value="fp" <?php echo ($estudios == "fp") ? "selected" : ""?>>Fp</option>
            </select>
            <br><br>
            Situación laboral:<select multiple name="trabajo[]" >
                    <option value="estudiando" <?php echo in_array("estudiando", $trabajo) ? "selected" : ""?>>Estudiando</option>
                    <option value="trabajando" <?php echo in_array("trabajando",$trabajo) ? "selected" : ""?>>Trabajando</option>
                    <option value="buscando empleo" <?php echo in_array("buscando empleo",$trabajo) ? "selected" : ""?>>Buscando empleo</option>
                    <option value="desempleado" <?php echo in_array("desempleado",$trabajo) ? "selected" : ""?>>Desempleado</option>
                </select>
        </fieldset>
        <br>
        <fieldset>
            <legend>Otros:</legend>
            Hobbies: <br><br> Videojuegos<input type="checkbox" name="hobbies[]" value="videojuegos" <?php echo in_array("videojuegos", $hobbies) ? "selected" : ""?>><br><br>
            Historia<input type="checkbox" name="hobbies[]" value="historia"<?php echo in_array("historia", $hobbies) ? "selected" : ""?>><br><br>
            Ajedrez<input type="checkbox" name="hobbies[]" value="ajedrez"<?php echo in_array("ajedrez", $hobbies) ? "selected" : ""?>><br><br>
            Ver series<input type="checkbox" name="hobbies[]" value="ver series"<?php echo in_array("ver series", $hobbies) ? "selected" : ""?>> <br><br>
            Otro:<input type="checkbox" name="hobbies[]" value="otro"<?php echo in_array("otro", $hobbies) ? "selected" : ""?>>
            <input type="text" name="otro" <?php echo $otro;?> >&nbsp;<br><br>
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