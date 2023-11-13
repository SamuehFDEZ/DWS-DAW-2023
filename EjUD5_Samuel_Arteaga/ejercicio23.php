
<!-- @author Samuel Arteaga López <samu.ar.lo.04@gmail.com>

23. Escribe un formulario de recogida de datos que conste de dos páginas: En la primera página
se solicitan los datos y se muestran errores tras validarlos. En la segunda página se muestra toda
la información introducida por el usuario si no hay errores errores. Los datos a recoger son datos
personales, nivel de estudios (desplegable), situación actual (selección múltiple: estudiando,
trabajando, buscando empleo, desempleado) y hobbies (marcar de varios mostrados y poner otro
con opción a introducir texto) -->
<?php 

    function validaRequerido($valor){ //Obliga a introducir datos en campos requeridos
        if(trim($valor) == ''){
            return false;
        }
        else{
            return true;
        }
    }


    //Guarda los valores de los campos en variables, siempre y cuando se haya enviado el formulario, si no guardará NULL
    $nombre = isset($_GET["nombre"]) ? $_GET["nombre"] : null;
    $apellidos = isset($_GET["apellidos"]) ? $_GET["apellidos"] : null;
    $estudios = isset($_GET["estudios"]) ? $_GET["estudios"] : null;
    $trabajo = isset($_GET["trabajo"]) ? $_GET["trabajo"] : [];
    $hobbies = isset($_GET["hobbies"]) ? $_GET["hobbies"] : [];
    $texto = isset($_GET["texto"]) ? $_GET["texto"] : null;
    $errores = array(); //Este array guardará los errores de validación que surjan.
    //Pregunta si está llegando una petición por POST, lo que significa que el usuario envió el formulario.
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
        if (!validaRequerido($estudios)) {
            $errores[] = "El campo estudios es incorrecto";
        }
        else{
            $link = $link."estudios=".$estudios."&";

        }
        if(isset($hobbies)){
            if(count($hobbies) > 0){
                foreach ($hobbies as $hobbie) {
                    echo "Hobbies/s: ". $hobbie. "<br>";
                }
            }
        }
        else{
            $link = $link."hobbies=".$hobbies."&";

        }

        if(!validaRequerido($texto)){
            $errores[] = "El campo texto es incorrecto";

        }
        else{
            $link = $link."texto=".$texto."&";

        }

        //Verifica si ha encontrado errores y de no haber redirige a la página con el mensaje de que pasó la validación.
        if(!$errores){
            header("Location: ejercicio23_procesa.php?".$link);
            exit;
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
    <form action="ejercicio23.php" method="get" enctype="multipart/form-data">
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
                <option value="primaria">Primaria</option>
                <option value="secundaria">Secundaria</option>
                <option value="bachillerato">Bachillerato</option>
                <option value="fp">Fp</option>
            </select>
            <br><br>
            Situación laboral:<select multiple name="trabajo[]" >
                    <option value="estudiando" name="trabajo[]">Estudiando</option>
                    <option value="trabajando" name="trabajo[]">Trabajando</option>
                    <option value="buscando empleo" name="trabajo[]">Buscando empleo</option>
                    <option value="desempleado" name="trabajo[]">Desempleado</option>
                </select>
        </fieldset>
        <br>
        <fieldset>
            <legend>Otros:</legend>
            Hobbies: <br><br> Videojuegos<input type="checkbox" name="hobbies[]" value="videojuegos"><br><br>
            Historia<input type="checkbox" name="hobbies[]" value="historia"><br><br>
            Ajedrez<input type="checkbox" name="hobbies[]" value="ajedrez"><br><br>
            Ver series<input type="checkbox" name="hobbies[]" value="ver series"> <br><br>

            <br><br>
            Notaciones
            <textarea name="texto" cols="50" rows="5" placeholder="También me gusta..."></textarea>
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