<?php 

$email = $_GET["correo"];

if(filter_var($email, FILTER_VALIDATE_EMAIL)){
    echo $email."<br>";
}

if (isset($_GET["publicidad"])) {
    echo "Ha aceptado recibir publicidad <br>";
}
else{
    echo "No ha aceptado recibir publicidad <br>";
}

?>



