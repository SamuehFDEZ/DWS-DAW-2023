<?php 
        
     echo '<p style="color:blue;">Sus datos se han enviado correctamente - Samuel</p><br>';   

    foreach ($_GET as $tipo=>$dato){
            echo "<p> ".ucfirst($tipo).": <strong><i>". strtoupper($dato) ."<i/></strong> </p>";
    }

?>