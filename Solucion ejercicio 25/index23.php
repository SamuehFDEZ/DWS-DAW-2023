<?php 
    include_once 'validaciones.php'; //Importamos el archivo con las validaciones (requerido, y lo carga una vez).
    
    //usaremos una variable para ir creando la url de parámetros con sus valores 
    //y pasarla en el header para indicar lo que se ha validado
    $urlparam=array();

    //Guarda los valores de los campos en variables, siempre y cuando se haya enviado el formulario, si no guardará NULL
    if (isset($_POST['usuario'])){
        $usuario=$_POST['usuario'];
        $urlparam['usuario']=$usuario;
    } else{
        $usuario=null;
    }

    if (isset($_POST['password'])){
        $password=$_POST['password'];
        $urlparam['password']=$password;
    } else{
        $password=null;
    }

    if (isset($_POST['nombre'])){
        $nombre=$_POST['nombre'];
        $urlparam['nombre']=$nombre;
    } else{
        $nombre=null;
    }

    if (isset($_POST['email'])){
        $email=$_POST['email'];
        $urlparam['email']=$email;
    } else{
        $email=null;
    }

    if (isset($_POST['sexo'])){
        $sexo=$_POST['sexo'];
        //$urlparam['sexo']=$sexo;
    } else{
        $sexo=null;
    }

    if (isset($_POST['acepta'])){
        $acepta=$_POST['acepta'];
        //$urlparam['acepta']=$acepta;
    } else{
        $acepta=null;
    }

    if (isset($_POST['estudios'])){
        $estudios=$_POST['estudios'];
        $urlparam['estudios']=$estudios;
    } else{
        $estudios=null;
    }

    if (array_key_exists('situación',$_POST)){
        $situación='';
        foreach ($_POST['situación'] as $actual){
            if ($situación===''){
                $situación=$actual;
            } else{
                $situación=$situación."+".$actual;
            }
            
        }
        
        $urlparam['situación']=$situación;
    } else{
        $situación=null;
    }

    if (array_key_exists('hobbies',$_POST)){
        $hobbies='';
        foreach ($_POST['hobbies'] as $hobbie){
            if ($hobbies===''){
                $hobbies=$hobbie;
            } else {
                $hobbies=$hobbies."+".$hobbie;
            }
            
        }
        $urlparam['hobbies']=$hobbies;
    } else{
        $hobbies=null;
    }

       
    //comprobación de los errores para mostrarlos

    $errores = array(); //Este  array guardará los errores de validación que surjan.

    //Pregunta si está llegando una petición por POST, lo que significa que el usuario envió el formulario.
    if ($_SERVER['REQUEST_METHOD'] == 'POST') { 
         
        //Si se envía el formulario vamos a comprobar si hay errores ya que o bien no hay o debe validarlos
        if (!validaRequerido($nombre)) { //Valida que el campo nombre no esté vacío.
            $errores[] = 'No se ha introducido nombre.';
        } else if (!validaAlfabeto($nombre)) { //Valida que el campo nombre sea correcto.
            $errores[] = 'El campo nombre es incorrecto.';
        }

        if (!validaRequerido($usuario)) { //Valida que el campo usuario no esté vacío.
            $errores[] = 'No se ha introducido usuario.';
        } else if (!validaAlfanum($usuario)) { //Valida que el campo usuario sea correcto.
            $errores[] = 'El campo usuario es incorrecto.';
        }

        if (!validaRequerido($password)) { //Valida que el campo password no esté vacío.
            $errores[] = 'No se ha introducido password.';
        } else if (!validaAlfanum($password)) { //Valida que el campo passsword sea correcto.
            $errores[] = 'El campo password es incorrecto.';
        } else if (strlen($password)<6) { //Valida que el campo password sea al menos de 6 caracteres sea correcto.
            $errores[] = 'El campo password contiene menos de 6 caracteres.';
        }
   
        if (!validaRequerido($email)) { //Valida que el campo email no esté vacío.
            $errores[] = 'No se ha introducido email.';
        } else if (!validaEmail($email)) { //Valida que el campo email sea correcto.
            $errores[] = 'El campo email es incorrecto.';
        }

              
        if ($_POST['validar']=="Validar"){            
            //Se ha pulsado el botón VALIDAR
           
            //Si no hay errores mostramos el mensaje, si los hay se mostrarán como lista en html
            if(!$errores){
                echo "<h3 style='color:#0f0'>El formulario se ha validado correctamente</h3>";
            } 

        } ///Fin de le ha dado al botón de validar
    

        if ($_POST['enviar']=="Enviar"){
            //Se ha pulsado el botón ENVIAR

            $url='';
            //Verifica si ha encontrado errores y de no haber redirige a la página con el mensaje de que pasó la validación.
            
            //generamos la url con parámetros
            foreach ($urlparam as $key=>$param){
                if ($url<>''){
                    $url=$url."&";
                }
                if ($param<>''){
                $url=$url.$key."=".$param;
                }
            
            } 

            //Si ha validado y hay datos, redirigimos a la página resultado
            if(!$errores && ($url!='')){
                header('Location: resultado23.php?'.$url);
                exit;
            } else {
                echo "<h3 style='color:#f00'>Debe validar el formulario antes de enviar los datos<h3>";
            }
        } 
    }

?>

<!DOCTYPE>
<html>
    <head>
        <title> Formulario Ejer 23 UD5 </title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    </head>
    <body>
        <h1>Formulario Ejercicio 23 UD5</h1>
        <!-- Mostramos los errores que pueda haber en el formulario -->
        <?php 
            
            if ($errores):?>
            <ul style="color: #f00;">
                <?php foreach ($errores as $error): ?>
                <li> <?php echo $error ?> </li>
                <?php endforeach; ?>
            </ul>
        <?php endif; ?>

        <!-- Ya mostramos los controles del formulario -->
        <form method="POST" action="index23.php">
            <p>
            <label> Nombre </label>
            <input type="text" name="nombre" value="<?php echo $nombre ?>" /><br />
            </p>
            <p>
            <label> Email </label>
            <input type="text" name="email" value="<?php echo $email ?>" /><br />
            </p>
            <p>
            <label> Usuario </label>
            <input type="text" name="usuario" value="<?php echo $usuario ?>" /><br />
            </p>
            <p>
            <label> Password </label>
            <input type="password" name="password" value="<?php echo $password ?>" /><br />
            </p>
            <p>
            <label> Sexo </label>
            <input type="radio" name="sexo" value="H" <?php if ($sexo=='H') echo "CHECKED" ?> />Hombre
            <input type="radio" name="sexo" value="M" <?php if ($sexo=='M') echo "CHECKED" ?> />Mujer<br />
            </p>
            <p>
            <label> Indica tu Nivel de Estudios</label><br />
            <Select name="estudios" size="4">
            <option value="Sin estudios" <?php if ($estudios==='Sin estudios') echo "SELECTED" ?>>Sin estudios</option>
            <option value="Educación Secundaria Obligatoria" <?php if ($estudios==='Educación Secundaria Obligatoria') echo "SELECTED" ?> >Educación Secundaria Obligatoria</option>
            <option value="Bachillerato" <?php if ($estudios==='Bachillerato') echo "SELECTED" ?> >Bachillerato</option>
            <option value="Formación Profesional" <?php if ($estudios==='Formación Profesional') echo "SELECTED" ?> >Formación Profesional</option>
            <option value="EStudios Universitarios" <?php if ($estudios==='EStudios Universitarios') echo "SELECTED" ?> >EStudios Universitarios</option>
            </select><br/><br/>
            </p>
            <p>
            <label> Indica tu situación actual </label><br />
            <Select multiple name="situación[]" size="3">
            <option value="Estudiando" <?php if (strpos($situación,'Estudiando')===0) echo "SELECTED" ?>>Estudiando</option>
            <option value="Trabajando" <?php if (strpos($situación,'Trabajando')) echo "SELECTED" ?> >Trabajando</option>
            <option value="Buscando empleo" <?php if (strpos($situación,'Buscando empleo')) echo "SELECTED" ?> >Buscando empleo</option>
            <option value="Desempleado" <?php if (strpos($situación,'Desempleado')) echo "SELECTED" ?> >Desempleado</option>
            </select><br/><br/>
            </p>

            <p>
            <label> Indica tus hobbies </label><br/>
            Cine<input type="checkbox" name="hobbies[]" value="Cine" <?php if (strpos($hobbies,'Cine')===0) echo "CHECKED" ?> /><br />
            Deporte<input type="checkbox" name="hobbies[]" value="Deporte" <?php if (strpos($hobbies,'Deporte')) echo "CHECKED" ?> /><br />
            Literatura<input type="checkbox" name="hobbies[]" value="Literatura" <?php if (strpos($hobbies,'Literatura')) echo "CHECKED" ?> /><br />
            Música<input type="checkbox" name="hobbies[]" value="Música" <?php if (strpos($hobbies,'Música')) echo "CHECKED" ?> /><br />
            Cómics<input type="checkbox" name="hobbies[]" value="Cómics" <?php if (strpos($hobbies,'Cómics')) echo "CHECKED" ?> /><br />
            Series<input type="checkbox" name="hobbies[]" value="Series" <?php if (strpos($hobbies,'Series')) echo "CHECKED" ?> /><br />
            Videojuegos<input type="checkbox" name="hobbies[]" value="Videojuegos" <?php if (strpos($hobbies,'Videojuegos')) echo "CHECKED" ?> /><br />
            </p>
            
           
            <input type="submit" name="validar" value="Validar" />
            <input type="reset" name="borrar" value="Limpiar datos" />
            <input type="submit" name="enviar" value="Enviar" />
            <br/>
        </form>
    </body>
</html>