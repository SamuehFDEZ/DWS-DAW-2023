<?php

require_once __DIR__."/../db.php";
include_once "../EjUD8_POO_Samuel_Arteaga/Incidencia/Incidencia.php";

const USERNAME = "dwes";
const PASSWORD = "dbdwespass";

trait traitDB{
    public static function connectDB(){
        try {
            $conn = new PDO('mysql:host=localhost:33006;dbname=INCIDENCIAS', USERNAME, PASSWORD);

        } catch (PDOException $e) {
            die("Conexión fallida: " . $e->getMessage());
        }

        return $conn;
    }

    public function execDB($sql){
        try {
            $result = self::connectDB()->$sql->exec();
            return $result;
        } catch (PDOException $e) {
            die("Conexión fallida: " . $e->getMessage());
        }
        
    }

    public static function queryPreparadaDB($sql, $parametros){
        try {
            $conn = self::connectDB();
            $stmt = $conn->prepare($sql);
            $stmt->execute($parametros);
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        } catch (PDOException $e) {
            die("Conexión fallida: " . $e->getMessage());
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
                CODIGO INTEGER,
                ESTADO VARCHAR (100) NOT NULL,
                PUESTO VARCHAR (15),
                PROBLEMA VARCHAR(255),
                RESOLUCION VARCHAR(255),
                CONSTRAINT PK_CODIGO PRIMARY KEY(CODIGO)
            )";
            $conn->exec($sql);
        } catch (PDOException $e) {
            die("Conexión fallida: " . $e->getMessage());
        }
        
    }
}
