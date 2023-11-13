
<!-- @author Samuel Arteaga López <samu.ar.lo.04@gmail.com>

25. Crea una Web para obtener los siguientes datos: Nombre completo, Contraseña (mínimo 6
caracteres), Nivel de Estudios(Sin estudios, Educación Secundaria Obligatoria, Bachillerato,
Formación Profesional, Estudios Universitarios), Nacionalidad (Española, Otra), Idiomas
(Español, Inglés, Francés, Alemán Italiano), Email, Adjuntar Foto (sólo extensiones jpg, gif y
png, tamaño máximo 50 KB). Además de las comprobaciones de validación, se debe comprobar
que sube fichero, que el fichero tiene extensión (puedes usar explode()) y ésta es válida, que hay
directorio donde guardarlo y que se genera con nombre único. Si todo ha ido bien, redirige al
usuario a una página donde se le indique que se ha procesado con éxito e incluye tu nombre y
grupo de clase.-->


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Samuel Arteaga</title>
</head>
<body>
<form action="ejercicio25_procesa.php" method="post" enctype="multipart/form-data">
        <fieldset>
            <legend>Datos Personales</legend>

            <label for="nombre">Nombre completo:</label><br><br>
            <input type="text" name="nombre" ><br><br>

            <label for="email">Correo:</label><br><br>
            <input type="email" name="email"><br><br>

            <label for="contrasenya">Contraseña:</label><br><br>
            <input type="password" name="contrasenya" minlength="6" ><br><br>

        </fieldset>
            <br>
        <fieldset>
            <legend>Estudios/Nacionalidad/Idiomas/Fichero:</legend>
           
            Nivel de estudios:<select name="estudios">
                <option value="Sin estudios">Sin estudios</option>
                <option value="Educación Secundaria Obligatoria">Educación Secundaria Obligatoria</option>
                <option value="Bachillerato">Bachillerato</option>
                <option value="Formación Profesional">Formación Profesional</option>
                <option value="Estudios Universitarios">Estudios Universitarios</option>
            </select>
            <br><br>
            Nacionalidad: <br><br>
            Española<input type="radio" name="nacionalidad" value="española">
            Otra<input type="radio" name="nacionalidad" value="otra">
            <br><br>
            Idiomas: <select multiple name="idiomas[]" >
                    <option value="Español" name="idiomas[]">Español</option>
                    <option value="Inglés" name="idiomas[]">Inglés</option>
                    <option value="Francés" name="idiomas[]"> Francés</option>
                    <option value="Alemán" name="idiomas[]">Alemán</option>
                    <option value="Italiano" name="idiomas[]">Italiano</option>
                </select>
            <br><br>
            Adjuntar fichero <br><br>
            <input type="hidden" name="MAX_FILE_SIZE" value='50000'>
            <input type="file" size="50000" name="adjunto" accept=".jpg, .gif, .png" required>

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