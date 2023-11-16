<?php 
/**
 * @author Samuel Arteaga López <samu.ar.lo.04@gmail.com>
 */
/**14. Formulario 2, petición por POST y mostrar en NombreAlumnoForm2OK.php los resultados
indicando el campo en cursiva y el contenido en negrita */

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Samuel Arteaga - Formulario de registro 2</title>
</head>
<body>
    <h1>Samuel Arteaga - Formulario de registro 2</h1>

    <form action="SamuelForm2OK.php" method="post"><!-- en el form ponemos en el action el php a recibir, el metodo post  -->
        <label for="nombre">Nombre:</label> <!-- en los labels ponemos a que input esta dedicado  -->
        <input type="text" name="nombre" maxlength="50"><br><br> <!-- en los input ponemos su tipo y el nombre a identificarlo, ademas de su maximo de caracteres -->
        
        <label for="apellido">Apellidos:</label> 
        <input type="text" name="apellido" maxlength="200"><br><br> 
        
        <label for="email">Correo:</label> 
        <input type="email" name="email" maxlength="250"><br><br> 
        
        <label for="usuario">Nombre de usuario:</label> 
        <input type="text" name="usuario" maxlength="250"><br><br> 
        
        <label for="contrasenya">Password:</label> 
        <input type="password" name="contrasenya" maxlength="250"><br><br> 
        
        <label for="sexo">Sexo:</label> 
        <input type="radio" name="sexo" value="H" checked>Hombre 
        <input type="radio" name="sexo" value="M">Mujer<br><br> 
    
        <label for="provincia">Provincia:</label> 
        <SELECT name="provincia">  <!-- con la etiqueta select podemos dar una serie de opciones, ademas de dar la opcion de que una ya esté seleccionada -->
            <option value="valencia" >VALENCIA</option> 
            <option value="castellon">CASTELLÓN</option> 
            <option value="alicante" SELECTED>ALICANTE</option> 
        </SELECT><br><br> 

        <label for="situacion">Situación actual:</label> 
        <SELECT  multiple size="2" name="situacion">  <!-- con la etiqueta select podemos dar una serie de opciones, ademas de dar la opcion de que una ya esté seleccionada -->
            <option value="estudiando" >Estudiando</option> 
            <option value="trabajando">Trabajando</option> 
            <option value="buscandoEmpleo"> Buscando empleo</option> 
            <option value="otro">Otro</option> 
        </SELECT><br><br> 

        <label for="comentario">Comentario:</label> 
        <textarea name="comentario" id="" cols="60" rows="6"></textarea><br><br>

        <input type="checkbox" name="info" checked>Deseo recibir información sobre novedades y ofertas <br><br> 
        <input type="checkbox" name="visto">Declaro haber leído y aceptar las condiciones generales del programa y la normativa sobre protección de datos <br><br> 
        <input type="reset" name="limpiar" value="Limpiar"> 
        <input type="submit" name="enviar" value="Enviar"> 
    </form>
</body>
</html>