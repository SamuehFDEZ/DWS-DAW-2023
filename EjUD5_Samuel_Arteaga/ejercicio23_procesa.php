<?php 
        
        foreach ($_GET as $tipo=>$dato){
                echo "<p> ".ucfirst($tipo)." tiene el valor <strong>". $dato ."</strong> </p>";
        }

?>