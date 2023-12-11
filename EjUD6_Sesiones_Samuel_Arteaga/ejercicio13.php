<!-- @author Samuel Arteaga López <samu.ar.lo.04@gmail.com>

13. Aplica la sesión en el ejercicio 25 de la UD5 para poder pasar los datos en lugar de construir la
url para enviarlos (de la foto sólo enviaremos nombre, extensión, ruta y tamaño).
-->

<?php
session_start(); //iniciamos la sesión
// Declaramos enviar
// Si ha sido accionado
if (isset($_POST["enviar"])) {
    $redirect = true;
    // Declaramos el tipo de imagen permitido
    $allowed_image_extension = array(
        "png",
        "jpg",
        "gif"
    );
    // La extension del archivo
    $file_extension = pathinfo($_FILES["foto"]["name"], PATHINFO_EXTENSION);

    // Si el archivo es más grande de lo que pedimos mostramos el error
    if (($_FILES["foto"]["size"] > 1024 * 50)) {
        echo '<p style="color:red;">El archivo es demasiado grande</br><p>';
        $redirect = false;
    }
        //Esto debería de ir en form24valida
        if (is_uploaded_file($_FILES['foto']['tmp_name'])) {
            $nombreDirectorio = "image/";

            // Obtener información sobre el archivo
            $infoArchivo = pathinfo($_FILES['foto']['name']);
                      
            $tamanyofoto = $_FILES['foto']['size'];
            // Verificar que el directorio de destino exista y sea escribible
            if (is_dir($nombreDirectorio) && is_writable($nombreDirectorio)) {
                $idUnico = time();
                $nombreFichero = $infoArchivo['filename'] . '.' . $infoArchivo['extension'];
                $nombreCompleto = $nombreDirectorio . $nombreFichero;
    
                move_uploaded_file($_FILES['foto']['tmp_name'], $nombreCompleto);
    
                $_SESSION['foto'] = array(
                    'nombre' => "Nombre: ", $infoArchivo['filename'],"<br>",
                    'extension' => "Extensión: ", $infoArchivo['extension'],"<br>",
                    'ruta' => "Ruta: ", $nombreDirectorio,"<br>",
                    'size' => "Tamaño: ", $_FILES['foto']['size']."kb"
                );
            } 
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
    }
    
    header("Location: ejercicio13_valida.php");
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
    <form action="ejercicio13.php" method="post" enctype="multipart/form-data">
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
        <label for="email">Email: </label><input type="email" name="email" required>
        <input type="file" name="foto" id="foto" required>
        <br>
        <input type="submit" name="enviar" id="enviar" value="enviar">Enviar</input>
        <input type="reset" name="reset" id="reset" value="Reset">Borrar</button>

    </form>
</body>

</html>