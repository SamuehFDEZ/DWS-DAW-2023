<?php 

if (isset($_POST["enviar"])) {
    echo "Nombre: ". $_POST["nombre"]. "<br>";

    echo "Apellidos: ". $_POST["apellidos"]. "<br>";

    echo "Estudios: ". $_POST["estudios"]. "<br>";

    $trabajos = $_POST["trabajo"];

    foreach ($trabajos as $trabajo) {
        echo "Trabajo/s: ". $trabajo. "<br>";
    }
    
    $hobbies = $_POST["hobbies"];

    foreach ($hobbies as $hobbie) {
        echo "Hobbie/s: ". $hobbie. "<br>";
    }

    $texto = $_POST["texto"];

    echo " $texto <br>";
}

?>