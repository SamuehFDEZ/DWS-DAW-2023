<?php

/**
 * @author Samuel Arteaga López <samu.ar.lo.04@gmail.com>
 * Ejercicio 2. Consultas
 */
include_once "../traitDB.php";
include_once "./funciones.php";


// Verifica si se ha enviado el formulario
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $conn = new PDO('mysql:host=localhost:33006;dbname=EMPRESA', USERNAME, PASSWORD);

    // Determina el tipo de consulta

    switch ($_POST["tipoConsulta"]) {
        // Consultas de Clientes
        case 'ClientePorDni':
            //Listado de todos los clientes ordenados por dni de cliente
            $dni = $_POST['DNI'];
            $sql = "SELECT * 
                    FROM EMPRESA.CLIENTE 
                    WHERE DNI = '$dni'";
            $result = $conn->query($sql, PDO::FETCH_ASSOC);
            printTablaClientes($result);
            //return;
            break;

        case 'ListadoClientes':
            //Datos de Clientes de una Población seleccionada ordenados por dni de cliente
            $sql = "SELECT * 
                    FROM EMPRESA.CLIENTE 
                    ORDER BY DNI";
            $result = $conn->query($sql);
            printTablaClientes($result);
            break;

        case 'ClientesDadapoblacion':
            //Listado de Clientes de una población seleccionada ordenados por población

            $poblacion = $_POST['POBLACION'];
            $sql = "SELECT * 
                    FROM EMPRESA.CLIENTE 
                    WHERE POBLACION = '$poblacion' 
                    ORDER BY DNI";
            $result = $conn->query($sql);
            printTablaClientes($result);
            break;

        case 'ListadoClientesPorPoblacion':
            //Datos de Clientes que han realizado compras ordenados por dni de cliente

            $sql = "SELECT * 
                    FROM EMPRESA.CLIENTE 
                    GROUP BY POBLACION
                    ORDER BY DNI";
            $result = $conn->query($sql);
            printTablaClientes($result);
            break;

        case 'NumeroClientesPorPoblacion':
            //Datos de Clientes que no han realizado compras ordenados por dni de cliente
                $sql = "SELECT POBLACION, COUNT(*) AS NUMERO_CLIENTES 
                    FROM EMPRESA.CLIENTE 
                    GROUP BY POBLACION 
                    ORDER BY POBLACION";
                    $result = $conn->query($sql);
                    if(isset($_POST["aJson"])){
                    header('Content-Type:application/json; charset=UTF-8');
                    $vectorDeClientes = [];
                    // creamos un array vacio para alamcenar todos los datos de las consultas (dni nombre apellidos, etc)
                    //iteramos sobre en el parametro (result) y la variable clientes ya son los datos de verdad
                    foreach ($result as $clientes) {
                        //dentro del vector de clientes almacenamos la info de la query
                        $vectorDeClientes[] = $clientes;   
                    }
                    // imprimimos en formato json lo que vamos metiendo al array
                    echo json_encode($vectorDeClientes, JSON_UNESCAPED_UNICODE|JSON_PRETTY_PRINT);
                    return;

                }
                else{
                    echo "<table><tr><td>POBLACION</td><td>NUMERO_CLIENTES</td></tr>";
                    foreach ($result as $clientes) {
                        echo "<tr><td>$clientes[POBLACION]</td><td>$clientes[NUMERO_CLIENTES]</td><tr>";
                    }
                    echo "<table>";
                }
               
                break;
        
        case 'ListadoClientesConCompras':
            //Datos de Clientes que han realizado compras de una población seleccionada ordenados por dni de cliente
            $sql = "SELECT CL.DNI, CL.NOMBRE, CL.APELLIDOS 
                    FROM EMPRESA.CLIENTE CL 
                    INNER JOIN EMPRESA.COMPRA C ON CL.DNI = C.CLIENTE 
                    GROUP BY CL.DNI 
                    ORDER BY CL.DNI";
            $result = $conn->query($sql);
            if(isset($_POST["aJson"])){
                header('Content-Type:application/json; charset=UTF-8');
                $vectorDeClientes = [];
                // creamos un array vacio para alamcenar todos los datos de las consultas (dni nombre apellidos, etc)
                //iteramos sobre en el parametro (result) y la variable clientes ya son los datos de verdad
                foreach ($result as $clientes) {
                    //dentro del vector de clientes almacenamos la info de la query
                    $vectorDeClientes[] = $clientes;   
                }
                // imprimimos en formato json lo que vamos metiendo al array
                echo json_encode($vectorDeClientes, JSON_UNESCAPED_UNICODE|JSON_PRETTY_PRINT);
                return;

            }
            else{
                echo "<table><tr><td>DNI</td><td>NOMBRE</td><td>APELLIDOS</td></tr>";
                foreach ($result as $clientes) {
                    echo "<tr><td>$clientes[DNI]</td><td>$clientes[NOMBRE]</td><td>$clientes[APELLIDOS]</td><tr>";
                }
                echo "<table>";
            }
          
            break;

        case 'ListadoClientesSinCompras':
            //Datos de Clientes que no han realizado compras de una población seleccionada ordenados por dni de cliente

            $sql = "SELECT CL.DNI, CL.NOMBRE, CL.APELLIDOS 
                    FROM EMPRESA.CLIENTE CL 
                    LEFT JOIN EMPRESA.COMPRA C ON CL.DNI = C.CLIENTE 
                    WHERE CL.DNI IS NULL ORDER BY CL.DNI";
            $result = $conn->query($sql);
            if(isset($_POST["aJson"])){
                header('Content-Type:application/json; charset=UTF-8');
                $vectorDeClientes = [];
                // creamos un array vacio para alamcenar todos los datos de las consultas (dni nombre apellidos, etc)
                //iteramos sobre en el parametro (result) y la variable clientes ya son los datos de verdad
                foreach ($result as $clientes) {
                    //dentro del vector de clientes almacenamos la info de la query
                    $vectorDeClientes[] = $clientes;   
                }
                // imprimimos en formato json lo que vamos metiendo al array
                echo json_encode($vectorDeClientes, JSON_UNESCAPED_UNICODE|JSON_PRETTY_PRINT);
                return;

            }
            else{
                echo "<table><tr><td>DNI</td><td>NOMBRE</td><td>APELLIDOS</td></tr>";
                foreach ($result as $clientes) {
                    echo "<tr><td>$clientes[DNI]</td><td>$clientes[NOMBRE]</td><td>$clientes[APELLIDOS]</td><tr>";
                }
                echo "<table>";
            }
            
            break;

        case 'ListadoClientesConComprasDadaPoblacion':
            //Datos de Clientes que han realizado compras con algún cliente de la población de Valencia ordenados por dni de cliente
            $poblacion = $_POST['POBLACION'];
            $sql = "SELECT CL.DNI, CL.NOMBRE, CL.APELLIDOS 
                    FROM EMPRESA.CLIENTE CL 
                    INNER JOIN COMPRA C ON CL.DNI = C.CLIENTE 
                    WHERE CL.POBLACION = '$poblacion' 
                    GROUP BY CL.DNI 
                    ORDER BY CL.DNI";
            $result = $conn->query($sql);
            if(isset($_POST["aJson"])){
                header('Content-Type:application/json; charset=UTF-8');
                $vectorDeClientes = [];
                // creamos un array vacio para alamcenar todos los datos de las consultas (dni nombre apellidos, etc)
                //iteramos sobre en el parametro (result) y la variable clientes ya son los datos de verdad
                foreach ($result as $clientes) {
                    //dentro del vector de clientes almacenamos la info de la query
                    $vectorDeClientes[] = $clientes;   
                }
                // imprimimos en formato json lo que vamos metiendo al array
                echo json_encode($vectorDeClientes, JSON_UNESCAPED_UNICODE|JSON_PRETTY_PRINT);
                return;

            }
            else{
                echo "<table><tr><td>DNI</td><td>NOMBRE</td><td>APELLIDOS</td></tr>";
                foreach ($result as $clientes) {
                    echo "<tr><td>$clientes[DNI]</td><td>$clientes[NOMBRE]</td><td>$clientes[APELLIDOS]</td><tr>";
                }
                echo "<table>";
            }
           
            break;

        case 'ListadoClientesSinComprasDadaPoblacion':
            //Listado de clientes que han realizado 3 o más compras ordenados por dni de cliente
            $poblacion = $_POST['POBLACION'];
            $sql = "SELECT CL.DNI, CL.NOMBRE, CL.APELLIDOS 
                    FROM EMPRESA.CLIENTE CL 
                    LEFT JOIN COMPRA C ON CL.DNI = C.CLIENTE 
                    WHERE CL.POBLACION = '$poblacion' AND C.CLIENTE IS NULL 
                    ORDER BY CL.DNI";
            $result = $conn->query($sql);
            if(isset($_POST["aJson"])){
                header('Content-Type:application/json; charset=UTF-8');
                $vectorDeClientes = [];
                // creamos un array vacio para alamcenar todos los datos de las consultas (dni nombre apellidos, etc)
                //iteramos sobre en el parametro (result) y la variable clientes ya son los datos de verdad
                foreach ($result as $clientes) {
                    //dentro del vector de clientes almacenamos la info de la query
                    $vectorDeClientes[] = $clientes;   
                }
                // imprimimos en formato json lo que vamos metiendo al array
                echo json_encode($vectorDeClientes, JSON_UNESCAPED_UNICODE|JSON_PRETTY_PRINT);
                return;

            }
            else{
                echo "<table><tr><td>DNI</td><td>NOMBRE</td><td>APELLIDOS</td></tr>";
                foreach ($result as $clientes) {
                    echo "<tr><td>$clientes[DNI]</td><td>$clientes[NOMBRE]</td><td>$clientes[APELLIDOS]</td><tr>";
                }
                echo "<table>";
            }
           
            break;

        case 'ListadoClientesConComprasValencia':
            //Listado de clientes que han realizado 3 compras o más de una población seleccionada ordenados por dni de cliente
            $sql = "SELECT CL.DNI, CL.NOMBRE, CL.APELLIDOS 
                    FROM EMPRESA.CLIENTE CL 
                    INNER JOIN COMPRA C ON CL.DNI = C.CLIENTE 
                    WHERE CL.POBLACION = 'Valencia' 
                    GROUP BY C.CLIENTE 
                    ORDER BY C.CLIENTE";
            $result = $conn->query($sql);
            if(isset($_POST["aJson"])){
                header('Content-Type:application/json; charset=UTF-8');
                $vectorDeClientes = [];
                // creamos un array vacio para alamcenar todos los datos de las consultas (dni nombre apellidos, etc)
                //iteramos sobre en el parametro (result) y la variable clientes ya son los datos de verdad
                foreach ($result as $clientes) {
                    //dentro del vector de clientes almacenamos la info de la query
                    $vectorDeClientes[] = $clientes;   
                }
                // imprimimos en formato json lo que vamos metiendo al array
                echo json_encode($vectorDeClientes, JSON_UNESCAPED_UNICODE|JSON_PRETTY_PRINT);
                return;

            }
            else{
                echo "<table><tr><td>DNI</td><td>NOMBRE</td><td>APELLIDOS</td></tr>";
                foreach ($result as $clientes) {
                    echo "<tr><td>$clientes[DNI]</td><td>$clientes[NOMBRE]</td><td>$clientes[APELLIDOS]</td><tr>";
                }
                echo "<table>";
            }
           
            break;

        case 'ListadoClientesConTresOMasCompras':
            //Datos de proveedor por NIF

            $sql = "SELECT CL.DNI, CL.NOMBRE, CL.APELLIDOS 
                    FROM EMPRESA.CLIENTE CL 
                    INNER JOIN COMPRA C ON CL.DNI = C.CLIENTE 
                    GROUP BY C.CLIENTE 
                    HAVING COUNT(*) >= 3 
                    ORDER BY C.CLIENTE";
            $result = $conn->query($sql);
            if(isset($_POST["aJson"])){
                header('Content-Type:application/json; charset=UTF-8');
                $vectorDeClientes = [];
                // creamos un array vacio para alamcenar todos los datos de las consultas (dni nombre apellidos, etc)
                //iteramos sobre en el parametro (result) y la variable clientes ya son los datos de verdad
                foreach ($result as $clientes) {
                    //dentro del vector de clientes almacenamos la info de la query
                    $vectorDeClientes[] = $clientes;   
                }
                // imprimimos en formato json lo que vamos metiendo al array
                echo json_encode($vectorDeClientes, JSON_UNESCAPED_UNICODE|JSON_PRETTY_PRINT);
                return;

            }
            else{
                echo "<table><tr><td>DNI</td><td>NOMBRE</td><td>APELLIDOS</td></tr>";
                foreach ($result as $clientes) {
                    echo "<tr><td>$clientes[DNI]</td><td>$clientes[NOMBRE]</td><td>$clientes[APELLIDOS]</td><tr>";
                }
                echo "<table>";
            }
           
            break;

        case 'ListadoClientesConTresComprasOMasPorPoblacion':
            //Listado de todos los proveedores ordenados por nif de proveedor
            $poblacion = $_POST['POBLACION'];

            $sql = "SELECT CL.DNI, CL.NOMBRE, CL.APELLIDOS 
                    FROM EMPRESA.CLIENTE CL 
                    INNER JOIN COMPRA C ON CL.DNI = C.CLIENTE 
                    WHERE CL.POBLACION = '$poblacion' 
                    GROUP BY C.CLIENTE 
                    HAVING COUNT(*) >= 3 
                    ORDER BY C.CLIENTE";
            $result = $conn->query($sql);
            if(isset($_POST["aJson"])){
                header('Content-Type:application/json; charset=UTF-8');
                $vectorDeClientes = [];
                // creamos un array vacio para alamcenar todos los datos de las consultas (dni nombre apellidos, etc)
                //iteramos sobre en el parametro (result) y la variable clientes ya son los datos de verdad
                foreach ($result as $clientes) {
                    //dentro del vector de clientes almacenamos la info de la query
                    $vectorDeClientes[] = $clientes;   
                }
                // imprimimos en formato json lo que vamos metiendo al array
                echo json_encode($vectorDeClientes, JSON_UNESCAPED_UNICODE|JSON_PRETTY_PRINT);
                return;

            }
            else{
                echo "<table><tr><td>DNI</td><td>NOMBRE</td><td>APELLIDOS</td></tr>";
                foreach ($result as $clientes) {
                    echo "<tr><td>$clientes[DNI]</td><td>$clientes[NOMBRE]</td><td>$clientes[APELLIDOS]</td><tr>";
                }
                echo "<table>";
            }
           
            break;

        // Consultas con proveedores
        case 'ProveedorPorNif':
            //Datos de proveedores que empiezan por un texto seleccionado ordenados por nif de proveedor
            $nif = $_POST['PROVEEDOR'];
            $sql = "SELECT * 
                    FROM EMPRESA.PROVEEDOR 
                    WHERE NIF = '$nif'";
            $result = $conn->query($sql);
            printTablaProveedor($result);
            break;

        case 'ListadoProveedores':
            //Datos de proveedores con productos con precio mayor a 1000€ ordenados por nif de proveedor

            $sql = "SELECT * 
                    FROM EMPRESA.PROVEEDOR 
                    ORDER BY NIF";
            $result = $conn->query($sql);
            printTablaProveedor($result);
            break;

        case 'ProveedoresEmpiezanPorTexto':
            //Datos de producto por COD_PROD
            $texto = $_POST['PARAMETRO'];
            $sql = "SELECT NOMBRE 
                    FROM EMPRESA.PROVEEDOR 
                    WHERE NOMBRE LIKE '$texto%' 
                    ORDER BY NIF";
            $result = $conn->query($sql);
            if(isset($_POST["aJson"])){
                header('Content-Type:application/json; charset=UTF-8');
                $vectorDeClientes = [];
                // creamos un array vacio para alamcenar todos los datos de las consultas (dni nombre apellidos, etc)
                //iteramos sobre en el parametro (result) y la variable clientes ya son los datos de verdad
                foreach ($result as $clientes) {
                    //dentro del vector de clientes almacenamos la info de la query
                    $vectorDeClientes[] = $clientes;   
                }
                // imprimimos en formato json lo que vamos metiendo al array
                echo json_encode($vectorDeClientes, JSON_UNESCAPED_UNICODE|JSON_PRETTY_PRINT);
                return;

            }
            else{
                echo "<table><tr><td>NOMBRE</td></tr>";
                foreach ($result as $clientes) {
                    echo "<tr><td>$clientes[NOMBRE]</td><tr>";
                }
                echo "<table>";
            }
            break;

        case 'ProveedoresProductosPvpMayor1000':
            //Listado de todos los productos ordenados por codigo de producto

            $sql = "SELECT DISTINCT P.NIF, PR.NOMBRE 
                    FROM EMPRESA.PROVEEDOR P 
                    INNER JOIN PRODUCTO PR ON P.NIF = PR.PROVEEDOR 
                    WHERE PR.PVP > 1000 
                    ORDER BY P.NIF";
            $result = $conn->query($sql);
            if(isset($_POST["aJson"])){
                header('Content-Type:application/json; charset=UTF-8');
                $vectorDeClientes = [];
                // creamos un array vacio para alamcenar todos los datos de las consultas (dni nombre apellidos, etc)
                //iteramos sobre en el parametro (result) y la variable clientes ya son los datos de verdad
                foreach ($result as $clientes) {
                    //dentro del vector de clientes almacenamos la info de la query
                    $vectorDeClientes[] = $clientes;   
                }
                // imprimimos en formato json lo que vamos metiendo al array
                echo json_encode($vectorDeClientes, JSON_UNESCAPED_UNICODE|JSON_PRETTY_PRINT);
                return;

            }
            else{
                echo "<table><tr><td>NIF</td><td>NOMBRE</td></tr>";
                foreach ($result as $clientes) {
                    echo "<tr><td>$clientes[NIF]</td><td>$clientes[NOMBRE]</td><tr>";
                }
                echo "<table>";
            }
            break;

        // Consultas con productos
        case 'ProductoPorCodProd':
            $codProd = $_POST['PRODUCTO'];
            //Datos de productos con precio menor a 100 ordenados por codigo de producto

            $sql = "SELECT * 
                    FROM EMPRESA.PRODUCTO 
                    WHERE COD_PROD = '$codProd'";
            $result = $conn->query($sql);
            printTablaProductos($result);
            break;

        case 'ListadoProductos':
            //Productos con precio mayor al promedio ordenados por codigo de producto

            $sql = "SELECT * 
                    FROM EMPRESA.PRODUCTO 
                    ORDER BY COD_PROD";
            $result = $conn->query($sql);
            printTablaProductos($result);
            break;

        case 'ProductosPvpMenorOIgual100':
            //Datos de productos con precio menor a 100 ordenados por codigo de producto

            $sql = "SELECT * 
                    FROM EMPRESA.PRODUCTO 
                    WHERE PVP <= 100 
                    ORDER BY COD_PROD";
            $result = $conn->query($sql);
            printTablaProductos($result);
            break;

        case 'ProductosPVPMayorPromedio':
            //Productos con precio mayor al promedio ordenados por codigo de producto

            $sql = "SELECT * 
                    FROM EMPRESA.PRODUCTO 
                    WHERE PVP > (
                    SELECT AVG(PVP) 
                    FROM EMPRESA.PRODUCTO) 
                    ORDER BY COD_PROD";
            $result = $conn->query($sql);
            printTablaProductos($result);
            break;

        case 'PvpMaximoProductos':
            //PVP máximo de los productos

            $sql = "SELECT MAX(PVP) AS PVP_MAXIMO 
                    FROM EMPRESA.PRODUCTO";
            $result = $conn->query($sql);
            if(isset($_POST["aJson"])){
                header('Content-Type:application/json; charset=UTF-8');
                $vectorDeClientes = [];
                // creamos un array vacio para alamcenar todos los datos de las consultas (dni nombre apellidos, etc)
                //iteramos sobre en el parametro (result) y la variable clientes ya son los datos de verdad
                foreach ($result as $clientes) {
                    //dentro del vector de clientes almacenamos la info de la query
                    $vectorDeClientes[] = $clientes;   
                }
                // imprimimos en formato json lo que vamos metiendo al array
                echo json_encode($vectorDeClientes, JSON_UNESCAPED_UNICODE|JSON_PRETTY_PRINT);
                return;

            }
            else{
                echo "<table><tr><td>PVP_MAXIMO </td></tr>";
                foreach ($result as $clientes) {
                    echo "<tr><td>$clientes[PVP_MAXIMO]</td><tr>";
                }
                echo "<table>";
            }
            break;

        case 'PvpMinimoProductos':
            //PVP mínimo de los productos

            $sql = "SELECT MIN(PVP) AS PVP_MINIMO
                    FROM EMPRESA.PRODUCTO";
            $result = $conn->query($sql);
            if(isset($_POST["aJson"])){
                header('Content-Type:application/json; charset=UTF-8');
                $vectorDeClientes = [];
                // creamos un array vacio para alamcenar todos los datos de las consultas (dni nombre apellidos, etc)
                //iteramos sobre en el parametro (result) y la variable clientes ya son los datos de verdad
                foreach ($result as $clientes) {
                    //dentro del vector de clientes almacenamos la info de la query
                    $vectorDeClientes[] = $clientes;   
                }
                // imprimimos en formato json lo que vamos metiendo al array
                echo json_encode($vectorDeClientes, JSON_UNESCAPED_UNICODE|JSON_PRETTY_PRINT);
                return;

            }
            else{
                echo "<table><tr><td>PVP_MINIMO</td></tr>";
                foreach ($result as $clientes) {
                    echo "<tr><td>$clientes[PVP_MINIMO]</td><tr>";
                }
                echo "<table>";
            }
            break;

        case 'PvpPromedioProductos':
            //PVP promedio de los productos

            $sql = "SELECT AVG(PVP) AS PVP_PROMEDIO
                    FROM EMPRESA.PRODUCTO";
            $result = $conn->query($sql);
            if(isset($_POST["aJson"])){
                header('Content-Type:application/json; charset=UTF-8');
                $vectorDeClientes = [];
                // creamos un array vacio para alamcenar todos los datos de las consultas (dni nombre apellidos, etc)
                //iteramos sobre en el parametro (result) y la variable clientes ya son los datos de verdad
                foreach ($result as $clientes) {
                    //dentro del vector de clientes almacenamos la info de la query
                    $vectorDeClientes[] = $clientes;   
                }
                // imprimimos en formato json lo que vamos metiendo al array
                echo json_encode($vectorDeClientes, JSON_UNESCAPED_UNICODE|JSON_PRETTY_PRINT);
                return;
            }
            else{
                echo "<table><tr><td>PVP_PROMEDIO</td></tr>";
                foreach ($result as $clientes) {
                    echo "<tr><td>$clientes[PVP_PROMEDIO]</td><tr>";
                }
                echo "<table>";
            }
            break;

        case "ProductosNombreContieneTexto":
            //Productos cuyo nombre contiene un texto dado ordenados por codigo de producto

            $texto = $_POST['PARAMETRO'];
            $sql = "SELECT * 
                    FROM EMPRESA.PRODUCTO 
                    WHERE NOMBRE LIKE '%$texto%' 
                    ORDER BY COD_PROD";
            $result = $conn->query($sql);
            printTablaProductos($result);
            break;

        // Consultas con compras
        case 'ListadoCompras':
            //Listado de todas las compras mostrando nombre y apellidos de cliente, código y nombre de producto, nombre de proveedor, fecha y unidades ordenados por dni de cliente y código de producto

            $sql = "SELECT CL.NOMBRE AS NOMBRE_CLIENTE, CL.APELLIDOS AS APELLIDOS_CLIENTE, PR.COD_PROD, PR.NOMBRE AS NOMBRE_PRODUCTO, PV.NOMBRE AS NOMBRE_PROVEEDOR, C.FECHA, C.UDES 
                    FROM EMPRESA.COMPRA C
                    INNER JOIN CLIENTE CL ON C.CLIENTE = CL.DNI
                    INNER JOIN PRODUCTO PR ON C.PRODUCTO = PR.COD_PROD
                    INNER JOIN PROVEEDOR PV ON PR.PROVEEDOR = PV.NIF
                    ORDER BY CL.DNI, PR.COD_PROD";
            $result = $conn->query($sql);
            if(isset($_POST["aJson"])){
                header('Content-Type:application/json; charset=UTF-8');
                $vectorDeClientes = [];
                // creamos un array vacio para alamcenar todos los datos de las consultas (dni nombre apellidos, etc)
                //iteramos sobre en el parametro (result) y la variable clientes ya son los datos de verdad
                foreach ($result as $clientes) {
                    //dentro del vector de clientes almacenamos la info de la query
                    $vectorDeClientes[] = $clientes;   
                }
                // imprimimos en formato json lo que vamos metiendo al array
                echo json_encode($vectorDeClientes, JSON_UNESCAPED_UNICODE|JSON_PRETTY_PRINT);
                return;
            }
            else{
                echo "<table><td>NOMBRE_CLIENTE</td><td>APELLIDOS_CLIENTE</td><td>COD_PROD</td><td>NOMBRE_PRODUCTO</td><td>NOMBRE_PROVEEDOR</td><td>FECHA</td><td>UDES</td></tr>";
                foreach ($result as $clientes) {
                    echo "<tr>
                    <td>$clientes[NOMBRE_CLIENTE]</td>
                    <td>$clientes[APELLIDOS_CLIENTE]</td>
                    <td>$clientes[COD_PROD]</td>
                    <td>$clientes[NOMBRE_PRODUCTO]</td>
                    <td>$clientes[NOMBRE_PROVEEDOR]</td>
                    <td>$clientes[FECHA]</td>
                    <td>$clientes[UDES]</td>
                    <tr>";
                }
                echo "<table>";
            }
            break;

        case 'ComprasDeAnyo':
            //Datos de compras a partir de un año dado ordenados por fecha

            $anio = $_POST['PARAMETRO'];
            $sql = "SELECT * 
                    FROM COMPRA 
                    WHERE YEAR(FECHA) >= $anio 
                    ORDER BY FECHA";
            $result = $conn->query($sql);
            printTablaCompras($result);
            break;

        case 'ComprasDeCliente':
            $dniCliente = $_POST['DNI'];
            $sql = "SELECT * 
                    FROM EMPRESA.COMPRA 
                    WHERE CLIENTE = '$dniCliente' 
                    ORDER BY FECHA";
            $result = $conn->query($sql);
            printTablaCompras($result);
            break;

        case 'ComprasDeProducto':
            //Datos de compras de un cliente dado ordenados por dni de cliente

            $codProducto = $_POST['PRODUCTO'];
            $sql = "SELECT * 
                    FROM EMPRESA.COMPRA 
                    WHERE PRODUCTO = '$codProducto' 
                    ORDER BY CLIENTE";
            $result = $conn->query($sql);
            printTablaCompras($result);
            break;

        case 'ComprasDeProveedor':
            //Datos de compras de un proveedor dado ordenados por nif de proveedor
            $nifProveedor = $_POST['PROVEEDOR'];

            $sql = "SELECT P.COD_PROD, P.NOMBRE, P.PROVEEDOR, P.PVP
                    FROM EMPRESA.COMPRA C 
                    INNER JOIN PRODUCTO P ON C.PRODUCTO = P.COD_PROD 
                    WHERE P.PROVEEDOR = '$nifProveedor' 
                    ORDER BY C.FECHA";
            $result = $conn->query($sql);
            printTablaProductos($result);
            break;

        case 'ComprasDePoblacion':
            //Datos de compras de una población dada ordenados por población
            $poblacion = $_POST['PARAMETRO'];
            $sql = "SELECT C.* 
                    FROM EMPRESA.COMPRA C 
                    INNER JOIN CLIENTE CL ON C.CLIENTE = CL.DNI 
                    WHERE CL.POBLACION = '$poblacion' 
                    ORDER BY C.FECHA";
            $result = $conn->query($sql);
            printTablaCompras($result);
            break;

        case 'ComprasDeClientesValencia':
            //Datos de compras con algún cliente de la población de Valencia ordenados por dni de cliente   
            $poblacion = $_POST['POBLACION'];
            $sql = "SELECT C.* 
                    FROM EMPRESA.COMPRA C 
                    INNER JOIN CLIENTE CL ON C.CLIENTE = CL.DNI 
                    WHERE CL.POBLACION = '$poblacion' 
                    ORDER BY C.FECHA";
            $result = $conn->query($sql);
            printTablaCompras($result);
            break;

        case 'ComprasConIgualOMasDe2Unidades':
            //Datos de compras con igual o más de 2 unidades ordenados por dni de cliente

            $sql = "SELECT * 
            FROM EMPRESA.COMPRA WHERE UDES >= 2 ORDER BY CLIENTE";
            $result = $conn->query($sql);
            printTablaCompras($result);
            break;

        case 'ComprasConMasDe3productos':
            //Datos de compras con más de 3 productos ordenados por dni de cliente

            $sql = "SELECT CLIENTE, PRODUCTO, FECHA, UDES, COUNT(*) AS NUMERO_COMPRAS 
                    FROM EMPRESA.COMPRA 
                    GROUP BY CLIENTE 
                    HAVING COUNT(*) > 3 
                    ORDER BY CLIENTE";
            $result = $conn->query($sql);
            printTablaCompras($result);
            break;

        case 'ComprasMinimo10Unidades':
            //Datos de compras con un mínimo de 10 unidades ordenados por dni de cliente

            $sql = "SELECT c.CLIENTE, cl.NOMBRE, cl.APELLIDOS, c.PRODUCTO, p.NOMBRE AS NOMBRE_PRODUCTO, c.FECHA, c.UDES
                    FROM COMPRA c
                    INNER JOIN CLIENTE cl ON c.CLIENTE = cl.DNI
                    INNER JOIN PRODUCTO p ON c.PRODUCTO = p.COD_PROD
                    WHERE c.UDES >= 10
                    ORDER BY c.CLIENTE";
            $result = $conn->query($sql);
            printTablaCompras($result);
            break;

        default:
            echo "Consulta no reconocida";
            break;
    }
}

?>

<html>

<head>
    <meta charset="UTF-8">
    <title>Ejercicios Consulta</title>
</head>
<style>
        table{
            border: 1px solid black;
        }
        td{
            border: 1px solid black;
        }
        tr{
            border: 1px solid black;
        }
      
    </style>

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
            <option value="ListadoClientesConTresComprasOMasPorPoblacion">Clientes con 3 compras o más de una población</option>
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
        <label for="DNI">dni:</label>
        <select name="DNI" id="DNI">
            <?php
                // Obtiene los dnis de la base de datos
                $dnis = traitDB::execDB("SELECT DNI 
                                        FROM EMPRESA.CLIENTE");
                // Muestra los dnis en un select
                foreach ($dnis as $dni) {
                    echo "<option value='{$dni['DNI']}'>{$dni['DNI']}</option>";
                }
            ?>
        </select>
        <label for="POBLACION">población:</label>
        <select name="POBLACION" id="POBLACION">
            <?php
                // Conecta a la base de datos (ajusta los detalles de la conexión según tu configuración)
                $poblaciones = traitDB::execDB("SELECT POBLACION 
                                                FROM EMPRESA.CLIENTE");

                foreach ($poblaciones as $poblacion) {
                    echo "<option value='{$poblacion['POBLACION']}'>{$poblacion['POBLACION']}</option>";
                }
            ?>
        </select>
        <label for="PROVEEDOR">proveedor:</label>
        <select name="PROVEEDOR" id="PROVEEDOR">
            <?php
                // Conecta a la base de datos (ajusta los detalles de la conexión según tu configuración)
                $proveedores = traitDB::execDB("SELECT NIF 
                                                FROM EMPRESA.PROVEEDOR");
                // Obtiene los proveedores de la base de datos
                // Muestra los proveedors en un select
                foreach ($proveedores as $proveedor) {
                    echo "<option value='{$proveedor['NIF']}'>{$proveedor['NIF']}</option>";
                }
            ?>
        </select>
        <label for="PRODUCTO">producto:</label>
        <select name="PRODUCTO" id="PRODUCTO">
            <?php
                // Conecta a la base de datos (ajusta los detalles de la conexión según tu configuración)
                $productos = traitDB::execDB("SELECT COD_PROD 
                                            FROM EMPRESA.PRODUCTO");

                // Obtiene los productos de la base de datos
                
                // Muestra los productos en un select
                foreach ($productos as $producto) {
                    echo "<option value='{$producto['COD_PROD']}'>{$producto['COD_PROD']}</option>";
                }
            ?>
        </select>
        <label for="PARAMETRO">Parámetro de consulta:</label>
        <input type="text" name="PARAMETRO" id="PARAMETRO">
        <br>
        <input type="submit" value="Consultar">
        PASAR A JSON<input type="checkbox" name="aJson" id="aJson">
    </form>
</body>
</html>