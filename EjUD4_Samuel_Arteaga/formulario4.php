<?php 
/**
 * @author Samuel Arteaga López <samu.ar.lo.04@gmail.com>
 */
/*
4. Formulario 4
Crea una página web que contenga un formulario con los siguientes campos de información:
Bloque Datos Personales
• El nombre, con un control de tipo texto. Tamaño máximo 50 caracteres
• Los apellidos, con un control de tipo texto. Tamaño máximo 200 caracteres
• El correo electrónico, con un control de tipo texto. Tamaño máximo 250 caracteres
• El usuario, con un control de tipo texto. Tamaño máximo 5 caracteres
• El password, con un control adecuado al contenido. Tamaño máximo 15 caracteres
• El sexo, con dos opciones excluyentes: hombre o mujer. Se seleccionará hombre por defecto
Bloque Datos de contacto
• Provincia: un desplegable con los valores Alicante, Castellón y Valencia y sólo se podrá
seleccionar uno de ellos
• Horario de contacto: un desplegable con los valores De 8 a 14 horas, De 14 a 18 horas y De 18
a 21 horas de modo que se podrá seleccionar uno o varios de ellos. Deberá mostrar 3 elementos
cada vez.
• ¿Cómo nos ha conocido? con checkbox para Un amigo, Web, Prensa y Otros
Bloque Datos de la incidencia
• Un desplegable Tipo de incidencia con los valores Teléfono fijo, Teléfono móvil, Internet y
Televisión de los cuales sólo se podrá elegir un único valor
• Descripción de la incidencia: Deberá mostrar un área de texto para que el usuario pueda escribir
lo que desee. Su tamaño será de 4x40
Botones
• Un botón de envío y otro de reset para limpiar el formulario.
Además, tienes que tener en cuenta los siguientes requisitos:
• El título de la página debe ser Alumno - Formulario de registro 4
• Se debe incluir un título que coincidirá con el de la página.
• El método de envío del formulario debe ser GET.
• El destino del envío del formulario debe ser el mismo fichero.
• Cada campo tiene que llevar una etiqueta asociada para la descripción del mismo.
• Se debe introducir el atributo placeholder (ayuda textual) en los campos Nombre, Apellidos,
Email, Nombre de usuario, Password y Descripción de la incidencia
El formulario tendrá la apariencia que se muestra en la página siguiente. */

// Creamos una variable para cada get con el name="" del html e imprimimos con negrita y en mayuscula lo que almacenan los $get
$nombre = $_GET['nombre'];
    echo "<b>Nombre:</b> ". strtoupper($nombre)."<br>";
    
$apellido = $_GET['apellido'];
    echo "<b>Apellidos:</b> ". strtoupper($apellido)."<br>";

$email = $_GET['email'];
    echo "<b>Email:</b> ". strtoupper($email)."<br>";

$usuario = $_GET['usuario'];
    echo "<b>Usuario:</b> ". strtoupper($usuario)."<br>";

$contrasenya = $_GET['contrasenya'];
    echo "<b>Contraseña:</b> ". strtoupper($contrasenya)."<br>";

$sexo = $_GET['sexo'];
    echo "<b>Sexo:</b> ". strtoupper($sexo)."<br>" ;
    
$provincia = $_GET['provincia'];
    echo "<b>Provincia:</b> ". strtoupper($provincia) ."<br>";
   
$horarioContacto = $_GET['horarioContacto'];
echo "<b>Horario de contacto:</b> <br>";
foreach ($horarioContacto as $horarioContactos){ // iteramos con un foreach pues es un array
    echo strtoupper($horarioContactos). "<br>";
}

$caja = $_GET['caja'];
echo "<b>¿Cómo nos has conocido?</b> <br>";
    foreach ($caja as $cajas){ // iteramos con un foreach pues es un array
        echo strtoupper($cajas). "<br>";
    }

$tipoTelefono = $_GET['tipoTelefono'];
echo "<b>Tipo de teléfono: </b> ". strtoupper($tipoTelefono) . "<br>";

$incidencia = $_GET['incidencia'];
    echo "<b>Incidencia:</b> ". strtoupper($incidencia) ."<br>";
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

    <form action="formulario4.php" method="get"><!-- en el form ponemos en el action el php a recibir, el metodo get  -->
       

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