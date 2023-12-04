<?php 

    session_start(); //iniciamos la sesión

    echo "<b>Los datos anteriormente introducidos son:</b><br><br>";

    echo "<b>Nombre:</b>". $_SESSION["nombreAntiguo"]. "<br>";

    echo "<b>Apellidos:</b>". $_SESSION["apellidosAntiguo"]. "<br>";

    echo "<b>Estudios:</b>". $_SESSION["estudiosAntiguo"]. "<br>";


    foreach ($_SESSION["trabajoAntiguo"] as $tipo=>$dato){
        $tipo = "Trabajo";
        echo "<p> ".ucfirst($tipo)."  <strong>". $dato ."</strong> </p><br>";
    }

    foreach ($_SESSION["hobbiesAntiguo"] as $tipo=>$dato){
        $tipo = "Hobbies";
        echo "<p> ".ucfirst($tipo)."  <strong>". $dato ."</strong> </p><br>";
    }

    foreach ($_SESSION["otroAntiguo"] as $tipo=>$dato){
        $tipo = "Otro";
        echo "<p> ".ucfirst($tipo)."  <strong>". $dato ."</strong> </p><br>";
    }

?>