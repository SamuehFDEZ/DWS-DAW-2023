<?php 

        $nombre = $_GET["nombre"];
        $apellidos = $_GET["apellidos"];

        echo "Nombre: ". $nombre. "<br>";

        echo "Apellidos: ". $apellidos. "<br>";

        echo "Estudios: ". $_GET["estudios"]. "<br>";

        $trabajo = $_GET["trabajo"];

        echo "Situación laboral: $trabajo <br>";

        $hobbie = $_GET["hobbies"];

        echo "Hobbies: ". $hobbie. "<br>";
        
       
?>