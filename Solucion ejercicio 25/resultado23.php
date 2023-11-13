<!DOCTYPE>
<html>
    <head>
        <title> Resultado Ejercicio 23 UD5 </title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    </head>
    
    <body>
        <strong> Sus datos han sido enviados correctamente </strong>
        <?php
            
            foreach ($_GET as $tipo=>$dato){
                echo "<p> ".ucfirst($tipo)." tiene el valor <strong>".strtoupper($dato)."</strong> </p>";
            }

            ?>
            <br/>
    </body>
</html>