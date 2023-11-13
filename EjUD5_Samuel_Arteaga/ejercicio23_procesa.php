<?php 
        $nombre = $_REQUEST["nombre"];
        $apellidos = $_REQUEST["apellidos"];

        echo "Nombre: ". $nombre. "<br>";

        echo "Apellidos: ". $apellidos. "<br>";

        echo "Estudios: ". $_GET["estudios"]. "<br>";

        $trabajos = $_GET["trabajo"];

        foreach ($trabajos as $trabajo) {
            echo "Trabajo/s: ". $trabajo. "<br>";
        }
        
        $hobbies = $_GET["hobbies"];

        if (isset($hobbies)) {
            if(count($hobbies) > 0){
                foreach ($hobbies as $hobbie) {
                    echo "Hobbie/s: ". $hobbie. "<br>";
                }
            }
        }

        $texto = $_GET["texto"];

        echo "Notaciones: $texto <br>";
    
?>