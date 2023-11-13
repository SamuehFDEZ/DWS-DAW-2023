
<!-- @author Samuel Arteaga López <samu.ar.lo.04@gmail.com>

24. Escribe un formulario de recogida de datos que conste de dos páginas: En la primera página
se solicitan los datos y se muestran errores tras validarlos. En la segunda página se muestra toda
la información introducida por el usuario si no hay errores errores. Los datos a introducir son:
Nombre, Apellidos, Edad, Peso (entre 10 y 150), Sexo, Estado Civil (Soltero, Casado, Viudo,
Divorciado, Otro) Aficiones: Cine, Deporte, Literatura, Música, Cómics, Series, Videojuegos.
Debe tener los botones de Enviar y Borrar -->


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="ejercicio24_procesa.php" method="post">
        <fieldset>
            <legend>Datos Personales</legend>

            <label for="nombre">Nombre:</label><br><br>
            <input type="text" name="nombre" ><br><br>

            <label for="apellidos">Apellidos:</label><br><br>
            <input type="text" name="apellidos" ><br><br>

            <label for="edad">Edad:</label><br><br>
            <input type="text" name="edad" ><br><br>

            <label for="peso">Peso:</label><br><br>
            <input type="text" name="peso" min="10" max="150"><br><br>
        </fieldset>
            <br>
        <fieldset>
            <legend>Género/Situación/Aficiones:</legend>
            Sexo <br>
            Hombre<input type="radio" name="sexo" value="hombre">&nbsp;&nbsp;&nbsp;
            Mujer<input type="radio" name="sexo" value="mujer">
            <br><br>
            Estado Civil:<select name="estadoCivil">
                <option value="soltero">Soltero</option>
                <option value="casado">Casado</option>
                <option value="viudo">Viudo</option>
                <option value="divorciado">Divorciado</option> 
                <option value="otro">Otro</option>
            </select>
            <br><br>
            Aficiones:<select multiple name="aficiones[]" >
                    <option value="cine" name="aficiones[]">Cine</option>
                    <option value="deporte" name="aficiones[]">Deporte</option>
                    <option value="literatura" name="aficiones[]"> Literatura</option>
                    <option value="música" name="aficiones[]">Música</option>
                    <option value="cómics" name="aficiones[]">Cómics</option>
                    <option value="series" name="aficiones[]">Series</option>
                    <option value="videojuegos" name="aficiones[]">Videojuegos</option>
                </select>
        </fieldset>
            <br>
        <fieldset>
            <legend>Enviar/Borrar</legend>
            <input type="submit" name="enviar" value="Enviar">&nbsp;
            <input type="reset" name="borrar" value="Borrar">
        </fieldset>
    </form>
</body>
</html>