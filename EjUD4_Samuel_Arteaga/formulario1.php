<?php 
/**
 * @author Samuel Arteaga López <samu.ar.lo.04@gmail.com>
 */
/**1. Formulario 1
Crea una página web que contenga un formulario con los siguientes campos de información:
• El nombre, con un control de tipo texto. Tamaño máximo 50 caracteres
• Los apellidos, con un control de tipo texto. Tamaño máximo 200 caracteres
• El sexo, con dos opciones excluyentes: hombre o mujer.
• El correo electrónico, con un control de tipo texto. Tamaño máximo 250 caracteres
• Provincia: un desplegable con los valores Alicante, Castellón y Valencia y sólo se podrá
seleccionar uno de ellos
• Una casilla de verificación con el texto "Deseo recibir información sobre novedades y ofertas".
Deberá estar activada por defecto
• Una casilla de verificación con el texto "Declaro haber leído y aceptar las condiciones generales
del programa y la normativa sobre protección de datos".
• Un botón de envío.
Además, tienes que tener en cuenta los siguientes requisitos:
• El título de la página debe ser Alumnos - Formulario de registro.
• Incluir un título con el mismo texto que el título de la página
• El método de envío del formulario debe ser GET.
• El destino del envío del formulario debe ser el mismo fichero.
• Cada campo tiene que llevar una etiqueta asociada para la descripción del mismo. */

// Creamos una variable para cada get con el name="" del html e imprimimos con negrita y en mayuscula lo que almacenan los $get
$nombre = $_GET['nombre'];
    echo "<b>Nombre:</b>". strtoupper($nombre)."<br>";
    
$apellido = $_GET['apellido'];
    echo "<b>Apellido:</b>". strtoupper($apellido)."<br>";
    
$sexo = $_GET['sexo'];
    echo "<b>Sexo:</b>". strtoupper($sexo)."<br>" ;
    
$email = $_GET['email'];
    echo "<b>Email:</b>". strtoupper($email)."<br>";
     
$provincia = $_GET['provincia'];
    echo "<b>Provincia:</b>". strtoupper($provincia) ."<br>";
    
$info = $_GET['info'];
    if(isset($info)){
        echo "<b>Info:</b> Has seleccionado la opción <br>";
    }
    else{
        echo "<b>Info:</b> No has seleccionado la opción <br>";

    }
    
$visto = $_GET['visto'];
    if(isset($visto)){
        echo "<b>Visto:</b> Has seleccionado la opción <br>";
    }
    else{
        echo "<b>Visto:</b> No has seleccionado la opción <br>";

    }
    
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Samuel Arteaga - Formulario de registro</title>
</head>
<body>
    <h1>Samuel Arteaga - Formulario de registro</h1>

    <form action="formulario1.php" method="get"><!-- en el form ponemos en el action el php a recibir, el metodo get  -->
        <label for="nombre">Nombre:</label> <!-- en los labels ponemos a que input esta dedicado  -->
        <input type="text" name="nombre" maxlength="50"><br><br> <!-- en los input ponemos su tipo y el nombre a identificarlo, ademas de su maximo de caracteres -->
        <label for="apellido">Apellidos:</label> 
        <input type="text" name="apellido" maxlength="200"><br><br> 
        <label for="sexo">Sexo:</label> 
        <input type="radio" name="sexo" value="H" checked>Hombre 
        <input type="radio" name="sexo" value="M">Mujer<br><br> 
        <label for="email">Correo:</label> 
        <input type="email" name="email" maxlength="250"><br><br> 
        <label for="provincia">Provincia:</label> 
        <SELECT name="provincia">  <!-- con la etiqueta select podemos dar una serie de opciones, ademas de dar la opcion de que una ya esté seleccionada -->
            <option value="valencia" SELECTED>VALENCIA</option> 
            <option value="castellon">CASTELLÓN</option> 
            <option value="alicante">ALICANTE</option> 
        </SELECT><br><br> 
        <input type="checkbox" name="info" checked>Deseo recibir información sobre novedades y ofertas <br><br> 
        <input type="checkbox" name="visto">Declaro haber leído y aceptar las condiciones generales del programa y la normativa sobre protección de datos <br><br> 
        <input type="submit" name="enviar" value="Enviar"> 
    </form>
</body>
</html>