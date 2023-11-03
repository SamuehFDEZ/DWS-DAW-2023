<?php 
/**
 * @author Samuel Arteaga López <samu.ar.lo.04@gmail.com>
 */
/*
3. Formulario 3
Crea una página web que contenga un formulario con los siguientes campos de información:
• El nombre, con un control de tipo texto. Tamaño máximo 50 caracteres
• Los apellidos, con un control de tipo texto. Tamaño máximo 200 caracteres
• El correo electrónico, con un control de tipo texto. Tamaño máximo 250 caracteres
• El usuario, con un control de tipo texto. Tamaño máximo 5 caracteres
• El password, con un control adecuado al contenido. Tamaño máximo 15 caracteres
• El sexo, con dos opciones excluyentes: hombre o mujer.
• Provincia: un desplegable con los valores Alicante, Castellón y Valencia y sólo se podrá
seleccionar uno de ellos
• Horario de contacto: un desplegable con los valores De 8 a 14 horas, De 14 a 18 horas y De 18
a 21 horas de modo que se podrá seleccionar uno o varios de ellos. Deberá mostrar 2 elementos
cada vez.
• ¿Cómo nos ha conocido? con checkbox para Un amigo, Web, Prensa y Otros
• Comentario: Deberá mostrar un área de texto para que el usuario pueda escribir lo que desee. Su
tamaño será de 6x60
• Una casilla de verificación con el texto "Deseo recibir información sobre novedades y ofertas".
Deberá estar activada por defecto
• Una casilla de verificación con el texto "Declaro haber leído y aceptar las condiciones generales
del programa y la normativa sobre protección de datos".
• Un botón de envío y otro de reset para limpiar el formulario.
Además, tienes que tener en cuenta los siguientes requisitos:
• El título de la página debe ser Alumnos - Formulario de registro 3
• Se debe incluir un título que coincidirá con el de la página.
• El método de envío del formulario debe ser GET.
• El destino del envío del formulario debe ser el mismo fichero.
• Cada campo tiene que llevar una etiqueta asociada para la descripción del mismo.
El formulario tendrá la apariencia que se muestra en la página siguiente. */

// Creamos una variable para cada get con el name="" del html e imprimimos con negrita y en mayuscula lo que almacenan los $get
$nombre = $_GET['nombre'];
    echo "<b>Nombre:</b>". strtoupper($nombre)."<br>";
    
$apellido = $_GET['apellido'];
    echo "<b>Apellido:</b>". strtoupper($apellido)."<br>";

$email = $_GET['email'];
    echo "<b>Email:</b>". strtoupper($email)."<br>";

$usuario = $_GET['usuario'];
    echo "<b>Usuario:</b>". strtoupper($usuario)."<br>";

$contrasenya = $_GET['contrasenya'];
    echo "<b>Contraseña:</b>". strtoupper($contrasenya)."<br>";

$sexo = $_GET['sexo'];
    echo "<b>Sexo:</b>". strtoupper($sexo)."<br>" ;
    
$provincia = $_GET['provincia'];
    echo "<b>Provincia:</b>". strtoupper($provincia) ."<br>";
   
$horarioContacto = $_GET['horarioContacto'];
    echo "<b>Horario de contacto:</b>". strtoupper($horarioContacto) ."<br>";

$caja = $_GET['caja'];
echo "<b>¿Cómo nos has conocido?</b> <br>";
    foreach ($caja as $cajas){ // iteramos con un foreach pues es un array
        echo strtoupper($cajas). "<br>";
    }

$comentario = $_GET['comentario'];
    echo "<b>Comentario:</b>". strtoupper($comentario) ."<br>";

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
    <title>Samuel Arteaga - Formulario de registro 3</title>
</head>
<body>
    <h1>Samuel Arteaga - Formulario de registro 3</h1>

    <form action="formulario3.php" method="get"><!-- en el form ponemos en el action el php a recibir, el metodo get  -->
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

        <label for="horarioContacto">Horario Contacto</label> 
        <SELECT  multiple size="3" name="horarioContacto">  <!-- con la etiqueta select podemos dar una serie de opciones, ademas de dar la opcion de que una ya esté seleccionada -->
            <option value="De 8 a 14 horas" >De 8 a 14 horas</option> 
            <option value="De 14 a 18 horas">De 14 a 18 horas</option> 
            <option value="De 18 a 22 horas"> De 18 a 22 horas</option> 
        </SELECT><br><br> 

        <label for="caja[]">¿Como nos ha conocido?</label><br> <br>
        <input type="checkbox" name="caja[]" value="Un amigo">Un amigo  <!--Al ser multiples valores lo tratamos como un array y le ponemos en el campo los claudatos [] -->
        <input type="checkbox" name="caja[]" value="Web">Web 
        <input type="checkbox" name="caja[]" value="Prensa">Prensa 
        <input type="checkbox" name="caja[]" value="Otros">Otros <br><br>

        <label for="comentario">Comentario:</label> 
        <textarea name="comentario" id="" cols="60" rows="6"></textarea><br><br>

        <input type="checkbox" name="info" checked>Deseo recibir información sobre novedades y ofertas <br><br> 
        <input type="checkbox" name="visto">Declaro haber leído y aceptar las condiciones generales del programa y la normativa sobre protección de datos <br><br> 
        <input type="reset" name="limpiar" value="Limpiar"> 
        <input type="submit" name="enviar" value="Enviar"> 
    </form>
</body>
</html>