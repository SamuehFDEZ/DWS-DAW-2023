<?php 
/**
 * @author Samuel Arteaga López <samu.ar.lo.04@gmail.com>
 */
/**13. Formulario 1, petición por GET y mostrar en NombreAlumnoForm1OK.php los resultados
indicando el campo en cursiva y el contenido en negrita */


    
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

    <form action="SamuelForm1OK.php" method="get"><!-- en el form ponemos en el action el php a recibir, el metodo get  -->
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