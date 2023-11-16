<?php 
/**
 * @author Samuel Arteaga López <samu.ar.lo.04@gmail.com>
 */
/*16. Formulario 4, petición por POST y mostrar en NombreAlumnoForm1OK.php los resultados
indicando el campo en cursiva y el contenido en negrita */


?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Samuel Arteaga - Formulario de registro 4</title>
</head>
<body>
    <h1>Samuel Arteaga - Formulario de registro 4</h1>

    <form action="SamuelForm4OK.php" method="post"><!-- en el form ponemos en el action el php a recibir, el metodo post  -->
       

    <fieldset>
        <legend>Datos Personales</legend>

        <label for="nombre">Nombre:</label> <!-- en los labels ponemos a que input esta dedicado  -->
        <input type="text" name="nombre" maxlength="50" placeholder="Escriba su Nombre"><br><br> <!-- en los input ponemos su tipo y el nombre a identificarlo, ademas de su maximo de caracteres -->
        
        <label for="apellido">Apellidos:</label> 
        <input type="text" name="apellido" maxlength="200" placeholder="Escriba sus Apellidos"><br><br> 
        
        <label for="email">Correo:</label> 
        <input type="email" name="email" maxlength="250" placeholder="usuario@empresa.com"><br><br> 
        
        <label for="usuario">Nombre de usuario:</label> 
        <input type="text" name="usuario" maxlength="250" placeholder="Escriba su nombre de usuario"><br><br> 
        
        <label for="contrasenya">Password:</label> 
        <input type="password" name="contrasenya" maxlength="15" placeholder="Escriba su password"><br><br> 
        
        <label for="sexo">Sexo:</label> 
        <input type="radio" name="sexo" value="H" checked>Hombre 
        <input type="radio" name="sexo" value="M">Mujer<br><br> 
    </fieldset>
    <br>
    <fieldset>
        <legend>Datos de Contacto</legend>

        <label for="provincia">Provincia:</label> 
        <SELECT name="provincia">  <!-- con la etiqueta select podemos dar una serie de opciones, ademas de dar la opcion de que una ya esté seleccionada -->
            <option value="valencia" >VALENCIA</option> 
            <option value="castellon">CASTELLÓN</option> 
            <option value="alicante" SELECTED>ALICANTE</option> 
        </SELECT><br><br> 

        <label for="horarioContacto[]">Horario Contacto</label> 
        <SELECT  multiple size="3" name="horarioContacto[]">  <!-- con la etiqueta select podemos dar una serie de opciones, ademas de dar la opcion de que una ya esté seleccionada -->
            <option value="De 8 a 14 horas" name="horarioContacto[]">De 8 a 14 horas</option> 
            <option value="De 14 a 18 horas" name="horarioContacto[]">De 14 a 18 horas</option> 
            <option value="De 18 a 22 horas" name="horarioContacto[]"> De 18 a 22 horas</option> 
        </SELECT><br><br> 

        <label for="caja[]">¿Como nos ha conocido?</label><br> <br>
        <input type="checkbox" name="caja[]" value="Un amigo">Un amigo  <!--Al ser multiples valores lo tratamos como un array y le ponemos en el campo los claudatos [] -->
        <input type="checkbox" name="caja[]" value="Web">Web 
        <input type="checkbox" name="caja[]" value="Prensa">Prensa 
        <input type="checkbox" name="caja[]" value="Otros">Otros <br><br>
    </fieldset>
    <br>
    <fieldset>
        <legend>Datos de la incidencia</legend>
        <label for="tipoTelefono">Tipo:</label> 
        <SELECT name="tipoTelefono">  <!-- con la etiqueta select podemos dar una serie de opciones, ademas de dar la opcion de que una ya esté seleccionada -->
            <option value="Teléfono fijo" >Teléfono fijo</option> 
            <option value="Teléfono móvil">Teléfono móvil</option> 
            <option value="Internet"> Internet</option> 
            <option value="Televisión"> Televisión</option> 
        </SELECT><br><br> 

        <label for="incidencia">Descripción de la incidencia:</label> 
        <textarea name="incidencia" id="" cols="60" rows="6" placeholder="Describa la incidencia..."></textarea><br><br>
    </fieldset>
    <br>
    <fieldset>
        <input type="reset" name="limpiar" value="Limpiar"> 
        <input type="submit" name="enviar" value="Enviar"> 
    </fieldset>

    </form>
</body>
</html>