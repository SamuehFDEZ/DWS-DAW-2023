<?php 

$nombre = $_GET['nombre'];
echo "Nombre: <b><i> $nombre </b></i> <br>";
    
$apellido = $_GET['apellido'];
    echo "Apellido: <b><i> $apellido </b></i> <br>";

$sexo = $_GET['sexo'];
    echo "Sexo: <b><i> $sexo </b></i> <br>" ;

$email = $_GET['email'];
    echo "Email: <b><i> $email </b></i> <br>";
    
$provincia = $_GET['provincia'];
    echo "Provincia: <b><i> $provincia </b></i> <br>";

$info = $_GET['info'];
    if(isset($info)){
        echo "Info: <b><i>  Has seleccionado la opción </b></i> <br>";
    }
    else{
        echo "Info: <b><i>  No has seleccionado la opción </b></i> <br>";

    }

$visto = $_GET['visto'];
    if(isset($visto)){
        echo "Visto: <b><i>  Has seleccionado la opción </b></i> <br>";
    }
    else{
        echo "Visto: <b><i>  No has seleccionado la opción </b></i> <br>";

    }

?>