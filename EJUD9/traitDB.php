<?php

require_once __DIR__ . "/../db.php";

const USERNAME = "dwes";
const PASSWORD = "dbdwespass";

trait traitDB{
    public static function connectDB(){
        try {
            $conn = new PDO('mysql:host=localhost:33006;dbname=EMPRESA', USERNAME, PASSWORD);

        } catch (PDOException $e) {
            die("Conexión fallida: " . $e->getMessage());
        }
        //devuelve la conexion creada
        return $conn;
    }

    public function execDB($sql){
        //usa la conexion, ejecuta la sentencia y devuelve el numero de filas afectadas
        
    }

    public static function queryPreparadaDB($sql, $parametros){
        //usa la conexion, prepara la sentencia, la ejecuta con los parametros y devuelve el resultado con todas las filas del conjunto

    }

    public static function resetearBD(){
        $conn = self::connectDB();
        $sql = "USE INCIDENCIAS";
        $conn->exec($sql);
        $sql = "DELETE FROM INCIDENCIA";
        $conn->exec($sql);
        $sql = "DROP TABLE INCIDENCIA IF EXISTS";
        $conn->exec($sql);
        $sql = "CREATE TABLE INCIDENCIA (
            CODIGO INTEGER,
            ESTADO VARCHAR (100) NOT NULL,
            PUESTO VARCHAR (15),
            PROBLEMA VARCHAR(255),
            RESOLUCION VARCHAR(255),
            CONSTRAINT PK_CODIGO PRIMARY KEY(CODIGO)
        )";
        $conn->exec($sql);
    }
}
