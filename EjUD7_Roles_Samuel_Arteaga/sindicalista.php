<?php 
/*Del ejercicio 1 de roles */

    session_start();

    function salarioMaximo(){
        return max($_SESSION["array"]);
    }
    
    function salarioMinimo(){
        return min($_SESSION["array"]);
    }
    
    function salarioMedio(){
        return array_sum($_SESSION["array"]) / count($_SESSION["array"]);
    }

    echo "El ". $_SESSION["rol"] ." con nombre " .$_SESSION["nombre"] ." tiene acceso a ver la siguiente información:<br>";
    echo "Salario medio:". salarioMedio() . "<br>";


    if(isset($_POST["volver"])){
        session_unset();
        header("Location: ejercicio1.php");
    }
?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Samuel Arteaga</title>
</head>
<body>
    <form action="ejercicio1.php" method="post">
        <input type="submit" name="volver" value="Cerrar Sesión">
    </form>
</body>
</html>