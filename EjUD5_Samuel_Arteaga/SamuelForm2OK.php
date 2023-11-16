<?php 
/**
 * @author Samuel Arteaga López <samu.ar.lo.04@gmail.com>
 */

$nombre = $_POST['nombre'];
    echo "Nombre:<b> <i> $nombre </i> </b> <br>";
    
$apellido = $_POST['apellido'];
    echo "Apellido: <b> <i>$apellido </i> </b>  <br>";

$email = $_POST['email'];
    echo "Email: <b><i>$email </i> </b>  <br>";

$usuario = $_POST['usuario'];
    echo "Usuario: <b><i>$usuario </i> </b>  <br>";

$contrasenya = $_POST['contrasenya'];
    echo "Contraseña: <b><i>$contrasenya </i> </b>  <br>";

$sexo = $_POST['sexo'];
    echo "Sexo: <b><i>$sexo </i> </b>  <br>" ;
    
$provincia = $_POST['provincia'];
    echo "Provincia: <b><i>$provincia </i>  </b>  <br>";
   
$situacion = $_POST['situacion'];
    echo "Situación: <b><i>$situacion </i>  </b>  <br>";

$comentario = $_POST['comentario'];
    echo "Comentario: <b><i>$comentario </i>  </b>  <br>";

$info = $_POST['info'];
    if(isset($info)){
        echo "Info:<b><i> Has seleccionado la opción </i> </b> <br>";
    }
    else{
        echo "Info: <b> <i>No has seleccionado la opción </i> </b><br>";

    }
    
$visto = $_POST['visto'];
    if(isset($visto)){
        echo "Visto: <b><i> Has seleccionado la opción </i></b> <br>";
    }
    else{
        echo "Visto: <b><i> No has seleccionado la opción</i> </b> <br>";

    }
?>