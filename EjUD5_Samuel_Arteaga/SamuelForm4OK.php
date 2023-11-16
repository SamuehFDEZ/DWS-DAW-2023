<?php 
    $nombre = $_POST['nombre'];
    echo "Nombre: <b> <i> $nombre </i> </b><br>";

    $apellido = $_POST['apellido'];
    echo "Apellidos: <b> <i> $apellido </i> </b><br>";

    $email = $_POST['email'];
    echo "Email:<b> <i>  $email </i> </b><br>";

    $usuario = $_POST['usuario'];
    echo "Usuario:<b> <i>  $usuario </i> </b><br>";

    $contrasenya = $_POST['contrasenya'];
    echo "Contraseña: <b> <i>$contrasenya </i> </b><br>";

    $sexo = $_POST['sexo'];
    echo "Sexo:<b> <i>  $sexo </i> </b><br>" ;

    $provincia = $_POST['provincia'];
    echo "Provincia: <b> <i> $provincia </i> </b> <br>";

    $horarioContacto = $_POST['horarioContacto'];
    echo "Horario de contacto: <br>";
    foreach ($horarioContacto as $horarioContactos){ // iteramos con un foreach pues es un array
        echo " <b> <i>$horarioContactos </i> </b> <br>";
    }

    $caja = $_POST['caja'];
    echo "¿Cómo nos has conocido? <br>";
    foreach ($caja as $cajas){ // iteramos con un foreach pues es un array
        echo "<b> <i>$cajas </i> </b> <br>";
    }

    $tipoTelefono = $_POST['tipoTelefono'];
    echo "Tipo de teléfono:  <b> <i> $tipoTelefono  </i> </b> <br>";

    $incidencia = $_POST['incidencia'];
    echo "Incidencia: <b> <i> $incidencia </i> </b><br>";
?>