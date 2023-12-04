<?php 

    session_start(); //iniciamos la sesión

   foreach ($_SESSION["foto"] as $key => $value) {
        echo "El dato introducido es $key => $value";
   }

?>