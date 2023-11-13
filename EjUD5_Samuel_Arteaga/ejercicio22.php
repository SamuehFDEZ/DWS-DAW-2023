
<!-- /**
 * @author Samuel Arteaga López <samu.ar.lo.04@gmail.com>
 */

 /**22. Escribe un formulario que solicite una dirección de correo y que la confirme e indique si
acepta recibir publicidad. Añade botón Enviar y Borrar. Cuando enviemos, iremos a otra página
donde se le indique el email y si ha aceptado recibir publicidad o no. El botón borrar se
mantendrá en el mismo formulario inicial pero limpiará todos los campos.*/ -->


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Samuel Arteaga</title>
</head>
<body>
    <form action="ejercicio22_procesa.php" method="get">
        <label for="correo">Introduce tu correo:</label><br><br>
        <input type="email" name="correo"><br><br>
        Acepto recibir publicidad<input type="checkbox" name="publicidad"><br><br>
        <input type="submit" name="enviar" value="Enviar">&nbsp;
        <input type="reset" name="borrar" value="Borrar">
    </form>
</body>
</html>