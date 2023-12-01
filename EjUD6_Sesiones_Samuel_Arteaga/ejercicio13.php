
<!-- @author Samuel Arteaga López <samu.ar.lo.04@gmail.com>

13. Aplica la sesión en el ejercicio 25 de la UD5 para poder pasar los datos en lugar de construir la
url para enviarlos (de la foto sólo enviaremos nombre, extensión, ruta y tamaño).
-->

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
    }

    if (
        empty($_SESSION["nombre"]) && empty($_SESSION["apellidos"]) && empty($_SESSION["password"])
        && empty($_SESSION["estudios"]) && empty($_SESSION["civil"]) && empty($_SESSION["email"]) 
    ) {
        $_SESSION["nombre"] = $_POST["nombre"];
        $_SESSION["apellidos"] = $_POST["apellidos"];
        $_SESSION["password"] = $_POST["password"];
        $_SESSION["estudios"] = $_POST["estudios"];
        $_SESSION["civil"] = $_POST["civil"];
        $_SESSION["email"] = $_POST["email"];
       

    } else {
        $_SESSION["nombreAntiguo"]  = $_SESSION["nombre"];
        $_SESSION["nombre"] = $_POST["nombre"];

        $_SESSION["apellidosAntiguo"]  = $_SESSION["apellidos"];
        $_SESSION["apellidos"] = $_POST["apellidos"];

        $_SESSION["passwordAntiguo"]  = $_SESSION["password"];
        $_SESSION["password"] = $_POST["password"];

        $_SESSION["estudiosAntiguo"]  = $_SESSION["estudios"];
        $_SESSION["estudios"] = $_POST["estudios"];

        $_SESSION["civilAntiguo"]  = $_SESSION["civil"];
        $_SESSION["civil"] = $_POST["civil"];

        $_SESSION["emailAntiguo"]  = $_SESSION["email"];
        $_SESSION["email"] = $_POST["email"];

        echo "Los datos anteriormente introducidos son: ", $_SESSION["nombreAntiguo"], ", ", $_SESSION["apellidosAntiguo"], ", ",
        $_SESSION["passwordAntiguo"]
        , ", ", $_SESSION["estudiosAntiguo"]
        , ", ", $_SESSION["civilAntiguo"]
        , ", ",$_SESSION["emailAntiguo"] 
        . "<br>";
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
<form action="ejercicio13.php" method="post">
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
        <label for="apellido">Email: </label><input type="email" name="email" required>
        <input type="file" name="foto" id="foto" required>
        <br>
        <input type="submit" name="enviar" id="enviar" value="enviar">Enviar</input>
        <input type="reset" name="reset" id="reset" value="Reset">Borrar</button>

    </form>
</body>
</html>