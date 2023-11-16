<?php 

if($_SERVER["REQUEST_METHOD"] == "POST"){
    if (isset($_POST["enviar"])) {
        $redirect=true;
        // Declaramos el tipo de imagen permitido
        $allowed_image_extension = array(
            "jpg",
            "gif",
            "png"
        );
        // La extension del archivo
        $file_extension = pathinfo($_FILES["foto"]["name"], PATHINFO_EXTENSION);
        // Si la extensión del archivo no coincide mostramos un mensaje de error
        if (!in_array($file_extension, $allowed_image_extension)) {
            echo '<p style="color:red;">El tipo de fichero es invalido</br><p>';
            $redirect=false;
        }
        // Si el archivo es más grande de lo que pedimos mostramos el error
        if (($_FILES["foto"]["size"] > 1024*100)) {
            echo '<p style="color:red;">El archivo es demasiado grande</br><p>';
            $redirect=false;
        }
        //  Redireccionamos la imagen
        if ($redirect){
            $target = $_SERVER . basename($_FILES["foto"]["nombre"]);
            move_uploaded_file($_FILES["foto"]["tmp_name"], $target);
            $cabecera = "Location:Samuel_img.php";
            header($cabecera);
        }

        echo "Nombre del fichero: ". $_FILES["foto"]["name"]."<br>";

        echo "Tamaño del fichero: ". $_FILES["foto"]["size"]."<br>";

        echo "Tipo del fichero: ". $_FILES["foto"]["type"]."<br>";

        echo "Ruta temporal del fichero: ".  $_FILES["foto"]["tmp_name"]."<br>";

    }
}

?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Samuel Artega</title>
</head>
<body>
    <form action="Samuel_img.php" method="post" enctype="multipart/form-data">
        
        <label for="nombre">Nombre:</label><br><br>
        <input type="text" name="nombre"><br><br>

        <input type="file" name="foto" id="foto" required><br><br>

        <input type="submit" name="enviar" value="Enviar"><br><br>
    </form>
</body>
</html>