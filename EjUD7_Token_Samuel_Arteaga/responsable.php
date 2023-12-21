<?php
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

    echo "El ". $_SESSION["rol"] . " con nombre " .$_SESSION["nombre"] ." tiene acceso a ver la siguiente información:<br>";
    echo "Salario máximo:". salarioMaximo() . "<br>";
    echo "Salario mínimo:". salarioMinimo() . "<br>";

    if(isset($_POST["volver"])){        
        session_unset();
        header("Location: ejercicio1.php");
    }

    if (!isset($_SESSION["hidden"])) {
        print('No se ha encontrado token!');
    } 
    else {
        //Si existe, debemos comprobar que el token recibido en $_POST es
        //el que hemos almacenado en la variable de la sesión $_SESSION
        if (hash_equals($_SESSION["hidden"], $_SESSION['token']) === false) {
            print('El token no coincide!');
        } 
        else {
            //El token es correcto y continúa el procesamiento con seguridad
            print('El token es correcto y podemos ejecutar acciones');
            
        }
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
        <input type="hidden" name="token" value="<?php echo $_SESSION['token']; ?>">
        <input type="submit" name="volver" value="Cerrar Sesión">
        <input type="submit" value="Cambiar SID" name="nuevoToken"<?php $_SESSION["token"] = bin2hex(openssl_random_pseudo_bytes(24));?>>
    </form>
</body>
</html>