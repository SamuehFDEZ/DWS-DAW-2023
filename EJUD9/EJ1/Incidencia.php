<?php 
/**
 * @author Samuel Arteaga López <samu.ar.lo.04@gmail.com>
 */
include_once __DIR__. "/../traitDB.php";
class Incidencia{
    use traitDB;
    static $codigoIncidencia = 0;
    static $contadorPendientes = 1;
    private $codigo; 
    private $numero;
    private $incidencia;
    private  $estado = "Pendiente"; 
    private $solucion;

    public static function resetearBD(){
        try {
            $conn = traitDB::connectDB();
    
            $sql = "DROP DATABASE IF EXISTS INCIDENCIAS";
            $conn->exec($sql);
    
            $sql = "CREATE DATABASE INCIDENCIAS";
            $conn->exec($sql);
    
            $sql = "USE INCIDENCIAS";
            $conn->exec($sql);
    
            $sql = "CREATE TABLE IF NOT EXISTS INCIDENCIA (
                CODIGO INTEGER PRIMARY KEY,
                ESTADO VARCHAR (100) NOT NULL,
                PUESTO VARCHAR (15),
                PROBLEMA VARCHAR(255),
                RESOLUCION VARCHAR(255)
            )";
            $conn->exec($sql);
    
    
        } catch (PDOException $e) {
            die("Error al resetear la base de datos: " . $e->getMessage());
        }
    }
    
    
    public static function creaIncidencia($num, $mensaje) {
        $self = new self($num, $mensaje);
        
        $sql = "INSERT INTO INCIDENCIA (CODIGO, ESTADO, PUESTO, PROBLEMA, RESOLUCION) VALUES 
        (?, ?, ?, ?, ?)";
        
        $parametros = array(self::$contadorPendientes, $self->estado, $self->numero, $self->incidencia, $self->solucion);
    
        try {
            $stmt = self::queryPreparadaDB($sql, $parametros);
    
            if ($stmt->rowCount() > 0) {
                echo "Incidencia con código " . self::$contadorPendientes . " creada correctamente\n";
                self::$contadorPendientes++; 
                return $self; 
            } 
            else {
                echo "No se ha podido crear la incidencia.\n";
                return null;
            }
        } catch (PDOException $e) {
            die("Error al crear la incidencia: " . $e->getMessage());
        }
    }
    
    
    public static function leeIncidencia($codigo){
        $sql = "SELECT * 
                FROM INCIDENCIA 
                WHERE CODIGO = :codigo";
        $stmt = traitDB::queryPreparadaDB($sql, [':codigo' => $codigo]);
        // Pasar el código como un array
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    
    public static function leeTodasIncidencias(){
        $sql = "SELECT * 
                FROM INCIDENCIA";
        $result = self::connectDB()->query($sql);
        return $result;
    }

    public function actualizaIncidencia($estado, $puesto, $problema, $solucion){
               
        $sql = "UPDATE INCIDENCIAS.INCIDENCIA 
                SET ESTADO = '".$estado."', PUESTO = '".$puesto."', PROBLEMA = '".$problema."', RESOLUCION = '".$solucion."' 
                WHERE CODIGO = ".$this->getCodigo()."";
        $result = self::execDB($sql);
       
        if($result){
            echo "Incidencia ". $this->getCodigo() ." - Puesto: $this->numero - $puesto - ". $this->getEstado()." - ". $this->solucion." \n";
        }
        else{
            print "No se ha podido actualizar\n";
        }
    }
    

    public function borraIncidencia(){
        $sql = "DELETE FROM INCIDENCIA 
                WHERE CODIGO = ".$this->getCodigo()."";
        $stmt = self::execDB($sql);

        return $stmt;
    }

    
    public function getCodigoIncidencia(){
        return self::$codigoIncidencia;
    }

    public function setCodigoIncidencia($codigoIncidencia){
        $this->codigoIncidencia = $codigoIncidencia;
    }


    public function getCodigo(){
        return $this->codigo;
    }


    public function getNumero(){
        return $this->numero;
    }

    public function setNumero($numero){
        $this->$numero = $numero;
    }

    public function getIncidencia(){
        return $this->incidencia;
    }

    public function setIncidencia($incidencia){
        $this->incidencia = $incidencia;
    }

    public function getEstado(){
        return $this->estado;
    }

    public function setEstado($estado){
        $this->estado = $estado;
    }

    public function __construct($numero, $incidencia) {
        self::$codigoIncidencia++;
        $this->codigo = self::$codigoIncidencia;
        $this->numero = $numero;
        $this->incidencia = $incidencia;
    }

    public function resuelve($solucion){
        $this->solucion = $solucion;
        $this->estado = "Resuelto";
        self::$contadorPendientes--; // Decrementar el contador de incidencias pendientes
    }
    
    public static function getPendientes(){
        return self::$codigoIncidencia. "\n";
        
    }

    public function __toString(){
        return "Incidencia ". $this->codigo ." - Puesto: $this->numero - $this->incidencia - ". $this->getEstado()." - ". $this->solucion." \n";
    }
}
?>