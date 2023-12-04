<?php 

    session_start(); //iniciamos la sesión

    echo "<b>Los datos anteriormente introducidos son:</b><br><br>";

    echo "<b>Nombre:</b> ". $_SESSION["nombreAntiguo"]. "<br>";

    echo "<b>Apellidos:</b> ". $_SESSION["apellidosAntiguo"]. "<br>";

    echo "<b>Edad:</b> ". $_SESSION["edadAntiguo"]. "<br>";

    echo "<b>Peso:</b> ". $_SESSION["pesoAntiguo"]. "<br>";

    echo "<b>Sexo:</b> ". $_SESSION["sexoAntiguo"]. "<br>";

    echo "<b>Estado Civil:</b> ". $_SESSION["estadoCivilAntiguo"]. "<br>";



    foreach ($_SESSION["aficionesAntiguo"] as $tipo=>$dato){
        $tipo = "Aficiones ";
        echo " <p> ".ucfirst($tipo)."  <strong>". $dato ."</strong> </p><br>";
    }

    echo "<b>Otro:</b> ". $_SESSION["otroAntiguo"]. "<br>";

?>