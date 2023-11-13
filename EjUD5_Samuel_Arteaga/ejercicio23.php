
<!-- @author Samuel Arteaga López <samu.ar.lo.04@gmail.com>

23. Escribe un formulario de recogida de datos que conste de dos páginas: En la primera página
se solicitan los datos y se muestran errores tras validarlos. En la segunda página se muestra toda
la información introducida por el usuario si no hay errores errores. Los datos a recoger son datos
personales, nivel de estudios (desplegable), situación actual (selección múltiple: estudiando,
trabajando, buscando empleo, desempleado) y hobbies (marcar de varios mostrados y poner otro
con opción a introducir texto) -->


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Samuel Arteaga</title>
</head>
<body>
    <form action="ejercicio23_procesa.php" method="post">
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
            Hobbies:<select multiple name="hobbies[]">
                <option value="videojuegos" name="hobbies[]" >Videojuegos</option>
                <option value="historia" name="hobbies[]">Historia</option>
                <option value="ajedrez" name="hobbies[]">Ajedrez</option>
                <option value="ver series" name="hobbies[]">Ver series</option>
            </select>
            <br><br>
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