<?php 

    function printTablaClientes($datos){
        if(isset($_POST["aJson"])){
            header('Content-Type:application/json; charset=UTF-8');
            $vectorDeClientes = [];
            // creamos un array vacio para alamcenar todos los datos de las consultas (dni nombre apellidos, etc)
            //iteramos sobre en el parametro (result) y la variable clientes ya son los datos de verdad
            foreach ($datos as $clientes) {
                //dentro del vector de clientes almacenamos la info de la query
                $vectorDeClientes[] = $clientes;   
            }
            // imprimimos en formato json lo que vamos metiendo al array
            // JSON_UNESCAPED_UNICODE par que no se eliminen los acentos 
            // sin JSON_UNESCAPED_UNICODE (é) -> (\u00e9) con eso, se mantiene correcto
            echo json_encode($vectorDeClientes, JSON_UNESCAPED_UNICODE|JSON_PRETTY_PRINT);
            return;
        }
        else{
            echo "<table><tr><td>DNI</td><td>NOMBRE</td><td>APELLIDOS</td><td>DIRECCION</td><td>POBLACION</td><td>TELEFONO</td><td>FECHA_NAC</td></tr>";
            foreach ($datos as $clientes) {
                echo "<tr><td>$clientes[DNI]</td><td>$clientes[NOMBRE]</td><td>$clientes[APELLIDOS]</td><td>$clientes[DIRECCION]</td><td>$clientes[POBLACION]</td><td>$clientes[TELEFONO]</td><td>$clientes[FECHA_NAC]</td><tr>";
            }
            echo "<table>";
        }
    }

    function printTablaProveedor($datos){
        if(isset($_POST["aJson"])){
            header('Content-Type:application/json; charset=UTF-8');
            $vectorDeClientes = [];
            // creamos un array vacio para alamcenar todos los datos de las consultas (dni nombre apellidos, etc)
            //iteramos sobre en el parametro (result) y la variable clientes ya son los datos de verdad
            foreach ($datos as $clientes) {
                //dentro del vector de clientes almacenamos la info de la query
                $vectorDeClientes[] = $clientes;   
            }
            // imprimimos en formato json lo que vamos metiendo al array
            echo json_encode($vectorDeClientes, JSON_UNESCAPED_UNICODE|JSON_PRETTY_PRINT);
            return;

        }
        else{
            echo "<table><tr><td>NIF</td><td>NOMBRE</td><td>DIRECCION</td></tr>";
            foreach ($datos as $clientes) {
                echo "<tr><td>$clientes[NIF]</td><td>$clientes[NOMBRE]</td><td>$clientes[DIRECCION]</td><tr>";
            }
            echo "<table>";
        }
        
    }

    function printTablaProductos($datos){
        if(isset($_POST["aJson"])){
            header('Content-Type:application/json; charset=UTF-8');
            $vectorDeClientes = [];
            // creamos un array vacio para alamcenar todos los datos de las consultas (dni nombre apellidos, etc)
            //iteramos sobre en el parametro (result) y la variable clientes ya son los datos de verdad
            foreach ($datos as $clientes) {
                //dentro del vector de clientes almacenamos la info de la query
                $vectorDeClientes[] = $clientes;   
            }
            // imprimimos en formato json lo que vamos metiendo al array
            echo json_encode($vectorDeClientes, JSON_UNESCAPED_UNICODE|JSON_PRETTY_PRINT);
            return;

        }
        else{
            echo "<table><tr><td>COD_PROD</td><td>NOMBRE</td><td>PROVEEDOR</td><td>PVP</td></tr>";
            foreach ($datos as $clientes) {
                echo "<tr><td>$clientes[COD_PROD]</td>
                <td>$clientes[NOMBRE]</td>
                <td>$clientes[PROVEEDOR]</td>
                <td>$clientes[PVP]</td><tr>";
            }
            echo "<table>";
        }
       
    }

    function printTablaCompras($datos){
        if(isset($_POST["aJson"])){
            header('Content-Type:application/json; charset=UTF-8');
            $vectorDeClientes = [];
            // creamos un array vacio para alamcenar todos los datos de las consultas (dni nombre apellidos, etc)
            //iteramos sobre en el parametro (result) y la variable clientes ya son los datos de verdad
            foreach ($datos as $clientes) {
                //dentro del vector de clientes almacenamos la info de la query
                $vectorDeClientes[] = $clientes;   
            }
            // imprimimos en formato json lo que vamos metiendo al array
            echo json_encode($vectorDeClientes, JSON_UNESCAPED_UNICODE|JSON_PRETTY_PRINT);
            return;

        }
        else{
            echo "<table><tr><td>CLIENTE</td><td>PRODUCTO</td><td>FECHA</td><td>UDES</td></tr>";
            foreach ($datos as $clientes) {
                echo "<tr><td>$clientes[CLIENTE]</td>
                <td>$clientes[PRODUCTO]</td>
                <td>$clientes[FECHA]</td>
                <td>$clientes[UDES]</td>
                <tr>";
            }
            echo "<table>";
        }
       
    }

    function printTablaComprasClientes($datos){
        if(isset($_POST["aJson"])){
            header('Content-Type:application/json; charset=UTF-8');
            $vectorDeClientes = [];
            // creamos un array vacio para alamcenar todos los datos de las consultas (dni nombre apellidos, etc)
            //iteramos sobre en el parametro (result) y la variable clientes ya son los datos de verdad
            foreach ($datos as $clientes) {
                //dentro del vector de clientes almacenamos la info de la query
                $vectorDeClientes[] = $clientes;   
            }
            // imprimimos en formato json lo que vamos metiendo al array
            echo json_encode($vectorDeClientes, JSON_UNESCAPED_UNICODE|JSON_PRETTY_PRINT);
            return;
        }
        else{
            echo "<table><td>DNI</td><td>NOMBRE</td><td>APELLIDOS</td><td>COD_PROD</td><td>NOMBRE</td><td>NOMBRE</td><td>FECHA</td><td>UDES</td></tr>";
            foreach ($datos as $clientes) {
                echo "<tr><td>$clientes[DNI]</td>
                <td>$clientes[NOMBRE]</td>
                <td>$clientes[APELLIDOS]</td>
                <td>$clientes[COD_PROD]</td>
                <td>$clientes[NOMBRE]</td>
                <td>$clientes[NOMBRE]</td>
                <td>$clientes[FECHA]</td>
                <td>$clientes[UDES]</td>
                <tr>";
            }
            echo "<table>";
        }
        
    }
?>