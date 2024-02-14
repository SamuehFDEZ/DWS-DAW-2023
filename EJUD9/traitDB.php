<?php

include_once "EJ1/Incidencia.php";

const USERNAME = "dwes";
const PASSWORD = "dbdwespass";

trait traitDB{
    public static function connectDB() {
        try {
            $conn = new PDO('mysql:host=localhost:33006;dbname=INCIDENCIAS', USERNAME, PASSWORD);
            return $conn;
        } catch (PDOException $e) {
            die("Conexión fallida: " . $e->getMessage());
        }
    }

    public static function execDB($sql){
        try {
            return self::connectDB()->query($sql);
        } catch (PDOException $e) {
            die("Conexión fallida: " . $e->getMessage());
        }
    }
    
    public static function queryPreparadaDB($sql, $parametros){
        try {
            $conn = self::connectDB();
            $stmt = $conn->prepare($sql);
            $stmt->execute($parametros);
            return $stmt; // devuelve el objeto PDOStatement
        } catch (PDOException $e) {
            die("Error executing prepared query: " . $e->getMessage());
        }
    }
    

    public static function resetearBD(){
        try {
            $conn = self::connectDB();
            $sql = "USE INCIDENCIAS";
            $conn->exec($sql);
            $sql = "DELETE FROM INCIDENCIA";
            $conn->exec($sql);
            $sql = "DROP TABLE INCIDENCIA IF EXISTS";
            $conn->exec($sql);
            $sql = "CREATE TABLE INCIDENCIA (
                CODIGO INTEGER PRIMARY KEY,
                ESTADO VARCHAR (100) NOT NULL,
                PUESTO VARCHAR (15),
                PROBLEMA VARCHAR(255),
                RESOLUCION VARCHAR(255)
            )";
            $conn->exec($sql);
        } catch (PDOException $e) {
            die("Conexión fallida: " . $e->getMessage());
        }
        
    }
}
?>