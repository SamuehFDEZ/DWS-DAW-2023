<?php 

if (isset($_POST["enviar"])) {
    
    // $nombre = $_POST["nombre"];

    // echo "Nombre: ".strip_tags($nombre)."<br>";

    // $correo = $_POST["email"];

    // echo "Correo: $correo <br>";

    $nombreFichero = $_FILES["adjunto"]["name"];
    $rutaTemporal = $_FILES["adjunto"]["tmp_name"];
    $error = $_FILES["adjunto"]["error"];
    $size = $_FILES["adjunto"]["size"];
    $max_size = 50000;
    $tipoFichero = $_FILES["adjunto"]["type"];


    if ($error) {
        echo "ERROR!";
    }
    elseif ($size > $max_size) {
        echo "El tamaño supera el máximo permitido: 50kb";
    }
    else if ($tipoFichero != "image/jpeg" &&
    $tipoFichero != "image/gif" &&
    $tipoFichero != "image/png") {
    echo "Los tipos de archivos permitidos son jpg, gif y png";
}

    else{
        $ruta = "/ficheros".$nombreFichero;
        move_uploaded_file($rutaTemporal, $ruta);
        echo "El archivo ha sido guardado con éxito";
    }
}
?>