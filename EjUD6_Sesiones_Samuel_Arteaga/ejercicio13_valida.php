<?php 

     session_start(); //iniciamos la sesión

   foreach ($_SESSION["foto"] as $valor) {
        echo "<b> $valor </b>";
   }
?>