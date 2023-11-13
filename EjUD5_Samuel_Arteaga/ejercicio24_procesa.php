<?php 

if (isset($_POST["enviar"])) {
    echo "Nombre: ". $_POST["nombre"]. "<br>";

    echo "Apellidos: ". $_POST["apellidos"]. "<br>";

    echo "Edad: ". $_POST["edad"]. "<br>";

    echo "Peso: ". $_POST["peso"]. "<br>";

    if (isset($_POST["sexo"])) {
        echo "Sexo: ". $_POST["sexo"]. "<br>";
    }

    $estadoCivil = $_POST["estadoCivil"];

    echo "Estado civil: ". $estadoCivil. "<br>";
    
    
    $aficiones = $_POST["aficiones"];

    foreach ($aficiones as $aficion) {
        echo "Aficiones/s: ". $aficion. "<br>";
    }
}


?>