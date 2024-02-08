<?php

/**
 * @author Samuel Arteaga López <samu.ar.lo.04@gmail.com>
 * Ejercicio 2. Consultas
 */
include_once __DIR__ . '\..\..\db.php';


// Verifica si se ha enviado el formulario
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $conn = new PDO('mysql:host=localhost:3306;dbname=EMPRESA', USERNAME, PASSWORD);

    // Determina el tipo de consulta
    $consulta = null;

    switch ($consulta) {
            // Consultas de Clientes
        case 'ClientePorDni':
            //Listado de todos los clientes ordenados por dni de cliente
            $dni = $_POST['dni'];
            $sql = "SELECT * FROM CLIENTE WHERE DNI = '$dni'";
            break;

        case 'ListadoClientes':
            //Datos de Clientes de una Población seleccionada ordenados por dni de cliente
            $sql = "SELECT * FROM CLIENTE ORDER BY DNI";
            break;

        case 'ClientesDadapoblacion':
            //Listado de Clientes de una población seleccionada ordenados por población

            $poblacion = $_POST['poblacion'];
            $sql = "SELECT * FROM CLIENTE WHERE POBLACION = '$poblacion' ORDER BY DNI";
            break;

        case 'ListadoClientesPorPoblacion':
            //Datos de Clientes que han realizado compras ordenados por dni de cliente

            $sql = "SELECT * FROM CLIENTE ORDER BY POBLACION";
            break;

        case 'NumeroClientesPorPoblacion':
            //Datos de Clientes que no han realizado compras ordenados por dni de cliente

            $sql = "SELECT POBLACION, COUNT(*) AS NUMERO_CLIENTES FROM CLIENTE GROUP BY POBLACION ORDER BY POBLACION";
            break;

        case 'ListadoClientesConCompras':
            //Datos de Clientes que han realizado compras de una población seleccionada ordenados por dni de cliente

            $sql = "SELECT C.DNI, CL.NOMBRE, CL.APELLIDOS FROM CLIENTE CL INNER JOIN COMPRA C ON CL.DNI = C.CLIENTE GROUP BY C.DNI ORDER BY C.DNI";
            break;

        case 'ListadoClientesSinCompras':
            //Datos de Clientes que no han realizado compras de una población seleccionada ordenados por dni de cliente

            $sql = "SELECT CL.DNI, CL.NOMBRE, CL.APELLIDOS FROM CLIENTE CL LEFT JOIN COMPRA C ON CL.DNI = C.CLIENTE WHERE C.CLIENTE IS NULL ORDER BY CL.DNI";
            break;

        case 'ListadoClientesConComprasDadaPoblacion':
            //Datos de Clientes que han realizado compras con algún cliente de la población de Valencia ordenados por dni de cliente
            $poblacion = $_POST['poblacion'];
            $sql = "SELECT C.DNI, CL.NOMBRE, CL.APELLIDOS FROM CLIENTE CL INNER JOIN COMPRA C ON CL.DNI = C.CLIENTE WHERE CL.POBLACION = '$poblacion' GROUP BY C.DNI ORDER BY C.DNI";
            break;

        case 'ListadoClientesSinComprasDadaPoblacion':
            //Listado de clientes que han realizado 3 o más compras ordenados por dni de cliente
            $poblacion = $_POST['poblacion'];
            $sql = "SELECT CL.DNI, CL.NOMBRE, CL.APELLIDOS FROM CLIENTE CL LEFT JOIN COMPRA C ON CL.DNI = C.CLIENTE WHERE CL.POBLACION = '$poblacion' AND C.CLIENTE IS NULL ORDER BY CL.DNI";
            break;

        case 'ListadoClientesConComprasValencia':
            //Listado de clientes que han realizado 3 compras o más de una población seleccionada ordenados por dni de cliente
            $sql = "SELECT C.DNI, CL.NOMBRE, CL.APELLIDOS FROM CLIENTE CL INNER JOIN COMPRA C ON CL.DNI = C.CLIENTE WHERE CL.POBLACION = 'Valencia' GROUP BY C.DNI ORDER BY C.DNI";
            break;

        case 'ListadoClientesConTresOMasCompras':
            //Datos de proveedor por NIF

            $sql = "SELECT C.DNI, CL.NOMBRE, CL.APELLIDOS FROM CLIENTE CL INNER JOIN COMPRA C ON CL.DNI = C.CLIENTE GROUP BY C.DNI HAVING COUNT(*) >= 3 ORDER BY C.DNI";
            break;

        case 'ListadoClientesConTresComprasOMasPorPoblacion':
            //Listado de todos los proveedores ordenados por nif de proveedor

            $poblacion = $_POST['poblacion'];
            $sql = "SELECT C.DNI, CL.NOMBRE, CL.APELLIDOS FROM CLIENTE CL INNER JOIN COMPRA C ON CL.DNI = C.CLIENTE WHERE CL.POBLACION = '$poblacion' GROUP BY C.DNI HAVING COUNT(*) >= 3 ORDER BY C.DNI";
            break;

            // Consultas con proveedores
        case 'ProveedorPorNif':
            //Datos de proveedores que empiezan por un texto seleccionado ordenados por nif de proveedor

            $nif = $_POST['nif'];
            $sql = "SELECT * FROM PROVEEDOR WHERE NIF = '$nif'";
            break;

        case 'ListadoProveedores':
            //Datos de proveedores con productos con precio mayor a 1000€ ordenados por nif de proveedor

            $sql = "SELECT * FROM PROVEEDOR ORDER BY NIF";
            break;

        case 'ProveedoresEmpiezanPorTexto':
            //Datos de producto por COD_PROD
            $texto = $_POST['parametro'];
            $sql = "SELECT * FROM PROVEEDOR WHERE NOMBRE LIKE '$texto%' ORDER BY NIF";
            break;

        case 'ProveedoresProductosPvpMayor1000':
            //Listado de todos los productos ordenados por codigo de producto

            $sql = "SELECT DISTINCT P.NIF, PR.NOMBRE FROM PROVEEDOR P INNER JOIN PRODUCTO PR ON P.NIF = PR.PROVEEDOR WHERE PR.PVP > 1000 ORDER BY P.NIF";
            break;

            // Consultas con productos
        case 'ProductoPorCodProd':
            $codProd = $_POST['producto'];
            //Datos de productos con precio menor a 100 ordenados por codigo de producto

            $sql = "SELECT * FROM PRODUCTO WHERE COD_PROD = '$codProd'";
            break;

        case 'ListadoProductos':
            //Productos con precio mayor al promedio ordenados por codigo de producto

            $sql = "SELECT * FROM PRODUCTO ORDER BY COD_PROD";
            break;

        case 'ProductosPvpMenorOIgual100':
            //Datos de productos con precio menor a 100 ordenados por codigo de producto

            $sql = "SELECT * FROM PRODUCTO WHERE PVP <= 100 ORDER BY COD_PROD";
            break;

        case 'ProductosPVPMayorPromedio':
            //Productos con precio mayor al promedio ordenados por codigo de producto

            $sql = "SELECT * FROM PRODUCTO WHERE PVP > (SELECT AVG(PVP) FROM PRODUCTO) ORDER BY COD_PROD";
            break;

        case 'PvpMaximoProductos':
            //PVP máximo de los productos

            $sql = "SELECT MAX(PVP) AS PVP_MAXIMO FROM PRODUCTO";
            break;

        case 'PvpMinimoProductos':
            //PVP mínimo de los productos

            $sql = "SELECT MIN(PVP) AS PVP_MINIMO FROM PRODUCTO";
            break;

        case 'PvpPromedioProductos':
            //PVP promedio de los productos

            $sql = "SELECT AVG(PVP) AS PVP_PROMEDIO FROM PRODUCTO";
            break;

        case "ProductosNombreContieneTexto":
            //Productos cuyo nombre contiene un texto dado ordenados por codigo de producto

            $texto = $_POST['parametro'];
            $sql = "SELECT * FROM PRODUCTO WHERE NOMBRE LIKE '%$texto%' ORDER BY COD_PROD";
            break;

            // Consultas con compras
        case 'ListadoCompras':
            //Listado de todas las compras mostrando nombre y apellidos de cliente, código y nombre de producto, nombre de proveedor, fecha y unidades ordenados por dni de cliente y código de producto

            $sql = "SELECT CL.NOMBRE AS NOMBRE_CLIENTE, CL.APELLIDOS AS APELLIDOS_CLIENTE, PR.COD_PROD, PR.NOMBRE AS NOMBRE_PRODUCTO, PV.NOMBRE AS NOMBRE_PROVEEDOR, C.FECHA, C.UNIDADES 
                    FROM COMPRA C
                    INNER JOIN CLIENTE CL ON C.CLIENTE = CL.DNI
                    INNER JOIN PRODUCTO PR ON C.PRODUCTO = PR.COD_PROD
                    INNER JOIN PROVEEDOR PV ON PR.PROVEEDOR = PV.NIF
                    ORDER BY CL.DNI, PR.COD_PROD";
            break;

        case 'ComprasDeAnyo':
            //Datos de compras a partir de un año dado ordenados por fecha

            $anio = $_POST['parametro'];
            $sql = "SELECT * FROM COMPRA WHERE YEAR(FECHA) >= $anio ORDER BY FECHA";
            break;

        case 'ComprasDeCliente':
            $dniCliente = $_POST['dni'];
            $sql = "SELECT * FROM COMPRA WHERE CLIENTE = '$dniCliente' ORDER BY FECHA";
            break;

        case 'ComprasDeProducto':
            //Datos de compras de un cliente dado ordenados por dni de cliente

            $codProducto = $_POST['producto'];
            $sql = "SELECT * FROM COMPRA WHERE PRODUCTO = '$codProducto' ORDER BY FECHA";
            break;

        case 'ComprasDeProveedor':
            //Datos de compras de un proveedor dado ordenados por nif de proveedor

            $nifProveedor = $_POST['nif'];
            $sql = "SELECT C.* FROM COMPRA C INNER JOIN PRODUCTO P ON C.PRODUCTO = P.COD_PROD WHERE P.PROVEEDOR = '$nifProveedor' ORDER BY C.FECHA";
            break;

        case 'ComprasDePoblacion':
            //Datos de compras de una población dada ordenados por población

            $poblacion = $_POST['parametro'];
            $sql = "SELECT C.* FROM COMPRA C INNER JOIN CLIENTE CL ON C.CLIENTE = CL.DNI WHERE CL.POBLACION = '$poblacion' ORDER BY C.FECHA";
            break;

        case 'ComprasDeClientesValencia':
            //Datos de compras con algún cliente de la población de Valencia ordenados por dni de cliente   

            $sql = "SELECT C.* FROM COMPRA C INNER JOIN CLIENTE CL ON C.CLIENTE = CL.DNI WHERE CL.POBLACION = 'Valencia' ORDER BY C.FECHA";
            break;

        case 'ComprasConIgualOMasDe2Unidades':
            //Datos de compras con igual o más de 2 unidades ordenados por dni de cliente

            $sql = "SELECT * FROM COMPRA WHERE UNIDADES >= 2 ORDER BY CLIENTE";
            break;

        case 'ComprasConMasDe3productos':
            //Datos de compras con más de 3 productos ordenados por dni de cliente

            $sql = "SELECT CLIENTE, COUNT(*) AS NUMERO_COMPRAS FROM COMPRA GROUP BY CLIENTE HAVING COUNT(*) > 3 ORDER BY CLIENTE";
            break;

        case 'ComprasMinimo10Unidades':
            //Datos de compras con un mínimo de 10 unidades ordenados por dni de cliente

            $sql = "SELECT * FROM COMPRA WHERE UNIDADES >= 10 ORDER BY CLIENTE";
            break;

        default:
            echo "Consulta no reconocida";
            break;
    }
}

// Ejecuta la consulta si está definida
if (isset($sql)) {
    // Ejecutar la consulta y mostrar resultados
    $result = $conn->query($sql);
    if (self::$result->num_rows > 0) {
        // Inicializar un array para almacenar los resultados
        $resultados = array();

        // Recorrer los resultados y almacenarlos en el array
        while ($row = self::$result->fetch_assoc()) {
            $resultados[] = $row;
        }

        // Cerrar la conexión
        self::$conn->close();

        // Devolver los resultados como JSON
        echo json_encode($resultados);
    } else {
        echo "0 resultados";
    }
}

?>

<html>

<head>
    <meta charset="UTF-8">
    <title>Ejercicios Consulta</title>
</head>

<body>
    <h1>Consultas de la BD Empresa</h1>
    <form action="consultas.php" method="post">
        <label for="tipoConsulta">Tipo de consulta:</label>
        <select name="tipoConsulta" id="tipoConsulta">
            <option value="ClientePorDni">Cliente dado dni</option>
            <option value="ListadoClientes">Listado clientes</option>
            <option value="ClientesDadapoblacion">Clientes de una población</option>
            <option value="ListadoClientesPorPoblacion">Listado de clientes por población</option>
            <option value="NumeroClientesPorPoblacion">Número de clientes por población</option>
            <option value="ListadoClientesConCompras">Clientes con compras</option>
            <option value="ListadoClientesSinCompras">Clientes sin compras</option>
            <option value="ListadoClientesConComprasDadaPoblacion">Clientes con compras de una población</option>
            <option value="ListadoClientesSinComprasDadaPoblacion">Clientes sin compras de una población</option>
            <option value="ListadoClientesConComprasValencia">Clientes con compras de Valencia</option>
            <option value="ListadoClientesConTresOMasCompras">Clientes con 3 compras o más</option>
            <option value="ListadoClientesConTresComprasOMasPorPoblacion">Clientes con 3 compras o más de una población
            </option>
            <option value="ProveedorPorNif">Proveedor dado NIF</option>
            <option value="ListadoProveedores">Listado de proveedores</option>
            <option value="ProveedoresEmpiezanPorTexto">Proveedores que empiezan por un texto</option>
            <option value="ProveedoresProductosPvpMayor1000">Proveedores con productos con precio mayor a 1000€</option>
            <option value="ProductoPorCodProd">Producto dado codigo</option>
            <option value="ListadoProductos">Listado de productos</option>
            <option value="ProductosPvpMenorOIgual100">Productos con precio menor a 100</option>
            <option value="ProductosPVPMayorPromedio">Productos con precio mayor al promedio</option>
            <option value="PvpMaximoProductos">PVP máximo de los productos</option>
            <option value="PvpMinimoProductos">PVP mínimo de los productos</option>
            <option value="PvpPromedioProductos">PVP promedio de los productos</option>
            <option value="ProductosNombreContieneTexto">Productos cuyo nombre contiene un texto</option>
            <option value="ListadoCompras">Listado de compras</option>
            <option value="ComprasDeAnyo">Compras a partir de un año dado</option>
            <option value="ComprasDeCliente">Compras de un cliente dado</option>
            <option value="ComprasDeProducto">Compras de un producto dado</option>
            <option value="ComprasDeProveedor">Compras de un proveedor dado</option>
            <option value="ComprasDePoblacion">Compras de una población dada</option>
            <option value="ComprasDeClientesValencia">Compras con algún cliente de la población de Valencia</option>
            <option value="ComprasConIgualOMasDe2Unidades">Compras con 2 unidades o más</option>
            <option value="ComprasConMasDe3productos">Compras con más de 3 productos</option>
            <option value="ComprasMinimo10Unidades">Compras con un mínimo de 10 unidades</option>
        </select>
        </select>
        <label for="dni">dni:</label>
        <select name="dni" id="dni">
            <?php
            // Conecta a la base de datos (ajusta los detalles de la conexión según tu configuración)


            // Obtiene los dnis de la base de datos

            // Muestra los dnis en un select
            foreach ($dnis as $dni) {
                echo "<option value='{$dni['dni']}'>{$dni['dni']}</option>";
            }
            ?>
        </select>
        <label for="poblacion">población:</label>
        <select name="poblacion" id="poblacion">
            <?php
            // Conecta a la base de datos (ajusta los detalles de la conexión según tu configuración)


            // Obtiene los dnis de la base de datos


            // Muestra los dnis en un select
            foreach ($poblaciones as $poblacion) {
                echo "<option value='{$poblacion['poblacion']}'>{$poblacion['poblacion']}</option>";
            }
            ?>
        </select>
        <label for="proveedor">proveedor:</label>
        <select name="proveedor" id="proveedor">
            <?php
            // Conecta a la base de datos (ajusta los detalles de la conexión según tu configuración)


            // Obtiene los proveedores de la base de datos

            // Muestra los proveedors en un select
            foreach ($proveedores as $proveedor) {
                echo "<option value='{$proveedor['nif']}'>{$proveedor['nif']}</option>";
            }
            ?>
        </select>
        <label for="producto">producto:</label>
        <select name="producto" id="producto">
            <?php
            // Conecta a la base de datos (ajusta los detalles de la conexión según tu configuración)


            // Obtiene los productos de la base de datos

            // Muestra los productos en un select
            foreach ($productos as $producto) {
                echo "<option value='{$producto['cod_prod']}'>{$producto['cod_prod']}</option>";
            }
            ?>
        </select>
        <label for="parametro">Parámetro de consulta:</label>
        <input type="text" name="parametro" id="parametro">
        <br>
        <input type="submit" value="Consultar">

</body>

</html>