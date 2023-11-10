<?php 
/**
 * @author Samuel Arteaga López <samu.ar.lo.04@gmail.com>
 */

/**5. Ejercicio 1: Elabora un programa que dado un carácter introducido por el usuario y determine
si es:
1. una letra mayúscula 4. un carácter blanco
2. una letra minúscula 5. un carácter de puntuación
3. un carácter numérico 6. un carácter especial
Se debe usar funciones para la comprobación de datos */

$caracter = $_GET["caracter"];

if (isset($_GET["enviar"])) {

    if (ctype_upper($caracter)) { 
        echo "El caracter $caracter es mayúscula \n";
    }
    else if(ctype_lower($caracter)){
        echo "El caracter $caracter es minúscula \n";

    }                                                                              
    else if(ctype_digit($caracter)){
        echo "El caracter $caracter es númerico \n"; 
    }
    else if(ctype_space($caracter)){
        echo "El caracter $caracter es un espacio en blanco \n"; 

    }
    else if(ctype_punct($caracter)){
        echo "El caracter $caracter es un carácter de puntuación \n"; 

    }

    if(ctype_alnum($caracter)== false){
        echo "El caracter $caracter es un carácter especial \n"; 

    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Samuel Arteaga</title>
</head>
<body>
    <form action="ejercicio5.php" method="get">
        <label for="caracter">Comprobador de caracteres</label><br><br>
        <input type="text" name="caracter"><br><br>
        <input type="submit" name="enviar" value="Enviar">

    </form>
</body>
</html>