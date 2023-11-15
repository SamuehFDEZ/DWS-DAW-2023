<!DOCTYPE html>
<html>
<head>
    <title>Formulario Validado</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<body>
    <strong>Sus datos han sido enviados correctamente</strong>
    <br><br>

    <?php
    // Obtener parámetros de la URL
    $nombre = isset($_GET['nombre']) ? $_GET['nombre'] : '';
    $correo = isset($_GET['correo']) ? $_GET['correo'] : '';
    $estudios = isset($_GET['estudios']) ? $_GET['estudios'] : '';
    $nacionalidad = isset($_GET['nacionalidad']) ? $_GET['nacionalidad'] : '';
    $idiomas = isset($_GET['idiomas']) ? explode(',', $_GET['idiomas']) : array();
    $imagen = isset($_GET['imagen']) ? $_GET['imagen'] : '';

    // Mostrar la información del usuario
    echo '<strong>Nombre:</strong> ' . htmlspecialchars($nombre) . '<br>';
    echo '<strong>Correo:</strong> ' . htmlspecialchars($correo) . '<br>';
    echo '<strong>Estudios:</strong> ' . htmlspecialchars($estudios) . '<br>';
    echo '<strong>Nacionalidad:</strong> ' . htmlspecialchars($nacionalidad) . '<br>';

    // Mostrar idiomas seleccionados
    if (!empty($idiomas)) {
        echo '<strong>Idiomas:</strong> ' . implode(', ', array_map('htmlspecialchars', $idiomas)) . '<br>';
    }

    // Mostrar la imagen subida
    if (!empty($imagen)) {
        echo '<strong>Imagen:</strong> ' . htmlspecialchars($imagen) . '<br>';
    }
    ?>
</body>
</html>