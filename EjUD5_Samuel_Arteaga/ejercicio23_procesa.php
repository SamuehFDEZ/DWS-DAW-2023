<?php 

        $nombre = $_REQUEST["nombre"];
        $apellidos = $_REQUEST["apellidos"];

        echo "Nombre: ". $nombre. "<br>";

        echo "Apellidos: ". $apellidos. "<br>";

        echo "Estudios: ". $_GET["estudios"]. "<br>";

        $trabajo = $_GET["trabajo"];

        foreach ($trabajo as $trabajos) {
                echo "Situación laboral: $trabajos <br>";
        }

        $hobbies = $_GET["hobbies"];

        foreach ($hobbies as $hobbie) {
                echo "Hobbies: ". $hobbie. "<br>";
        }

        $texto = $_GET["texto"];

        echo "Notaciones: $texto <br>";
       

        
    
?>