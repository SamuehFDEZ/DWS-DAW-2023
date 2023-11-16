<?php
// Definir opciones de cursos
$cursos = array(
    'DAW' => 'DAW',
    'DAM' => 'DAM',
    'ASIR' => 'ASIR'
);

// Definir opciones de módulos
$modulos = array(
    'DWS' => 'DWS',
    'Kotlin' => 'Kotlin',
    'Seguridad' => 'Seguridad'
);

// Definir opciones de horas
$horas = array('14:10', '15:05', '16:00', '16:55', '17:15', '18:10', '19:05', '20:00', '20:55');

// Inicializar variables
$cursoSeleccionado = '';
$moduloSeleccionado = '';
$horasSeleccionadas = array();

// Procesar formulario cuando se envíe
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Obtener datos del formulario
    $cursoSeleccionado = $_POST['curso'];
    $moduloSeleccionado = $_POST['modulo'];
    $horasSeleccionadas = isset($_POST['horas']) ? $_POST['horas'] : array();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Generador de Horario</title>
</head>
<body>
    <h1>Generador de Horario</h1>
    <form action="ejercicio19.php" method="post">
        <label for="curso">Seleccione un curso:</label>
        <?php foreach ($cursos as $clave => $valor) : ?>
            <input type="radio" name="curso" value="<?php echo $clave; ?>" <?php echo ($cursoSeleccionado == $clave) ? 'checked' : ''; ?>><?php echo $valor; ?>
        <?php endforeach; ?>
        <br><br>

        <label for="modulo">Seleccione un módulo:</label>
        <select name="modulo" id="modulo">
            <?php foreach ($modulos as $clave => $valor) : ?>
                <option value="<?php echo $clave; ?>" <?php echo ($moduloSeleccionado == $clave) ? 'selected' : ''; ?>><?php echo $valor; ?></option>
            <?php endforeach; ?>
        </select>
        <br><br>

        <label>Seleccione horas:</label>
        <?php foreach ($horas as $hora) : ?>
            <input type="checkbox" name="horas[]" value="<?php echo $hora; ?>" <?php echo (in_array($hora, $horasSeleccionadas)) ? 'checked' : ''; ?>><?php echo $hora; ?>
        <?php endforeach; ?>
        <br><br>

        <input type="submit" value="Generar Horario">
    </form>

    <?php
    // Mostrar el horario generado
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        echo '<h2>Horario Generado</h2>';
        echo '<table border="1">';
        echo '<tr><th>Hora</th><th>Módulo</th></tr>';

        foreach ($horasSeleccionadas as $hora) {
            echo '<tr>';
            echo '<td>' . $hora . '</td>';
            echo '<td>' . $modulos[$moduloSeleccionado] . '</td>';
            echo '</tr>';
        }

        echo '</table>';
    }
    ?>
</body>
</html>
