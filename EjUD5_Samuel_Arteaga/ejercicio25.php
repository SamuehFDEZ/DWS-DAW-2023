
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

<?php
// Declaramos enviar
// Si ha sido accionado
if (isset($_POST["enviar"])) {
    $redirect=true;
    // Declaramos el tipo de imagen permitido
    $allowed_image_extension = array(
        "png",
        "jpg",
        "gif"
    );
    // La extension del archivo
    $file_extension = pathinfo($_FILES["foto"]["name"], PATHINFO_EXTENSION);
    // Si la extensión del archivo no coincide mostramos un mensaje de error
    if (!in_array($file_extension, $allowed_image_extension)) {
        echo '<p style="color:red;">El tipo de fichero es invalido</br><p>';
        $redirect=false;
    }
    // Si el archivo es más grande de lo que pedimos mostramos el error
    if (($_FILES["foto"]["size"] > 1024*50)) {
        echo '<p style="color:red;">El archivo es demasiado grande</br><p>';
        $redirect=false;
    }
    //  Redireccionamos la imagen
    if ($redirect){
        $target = "image/" . basename($_FILES["foto"]["nombre"]).getdate()["year"].getdate()["mon"].getdate()["mday"].getdate()["hours"].getdate()["minutes"].getdate()["seconds"];
        move_uploaded_file($_FILES["foto"]["tmp_name"], $target);
        $cabecera = "Location:ejercicio25_procesa.php";
        header($cabecera);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UD5/Ejercicio25</title>
</head>
<body>
<form action="ejercicio25.php" method="Post" enctype="multipart/form-data">
        <label for="nombre">Indique su Nombre: </label><input type="text" name="nombre" required>
        <br>
        <label for="apellido">Indique sus Apellidos: </label><input type="text" name="apellidos" required>
        <br>
        <label for="password">Password: </label><input type="password" name="password" required>
        <br>
        <label for="estudios">Indique sus estudios: </label><select name="estudios" id="estudios" required>
            <option value="Sin Estudios">Sin Estudios</option>
            <option value="Eso">ESO</option>
            <option value="Bach">Bach</option>
            <option value="FP">FP</option>
            <option value="Universidad">Universidad</option>
        </select>
        <br>
        <label for="civil">Nacionalidad: </label><select name="civil" id="civil" required>
            <option value="Española">Española</option>
            <option value="Otro">Otro</option>
        </select>
        <br>
        <label for="civil">Idiomas: </label><select name="civil" id="civil" multiple required>
            <option value="Español">Español</option>
            <option value="Inglés">Inglés</option>
            <option value="Francés">Francés</option>
            <option value="Alemán">Alemán</option>
            <option value="Italiano">Italiano</option>
        </select>
        <label for="apellido">Email: </label><input type="email" name="surname" required>
        <input type="file" name="foto" id="foto" required>
        <br>
        <button type="submit" name="enviar" id="enviar" value="enviar">Enviar</button>
        <button type="reset" name="reset" id="reset" value="Reset">Borrar</button>

    </form>
</body>
</html>