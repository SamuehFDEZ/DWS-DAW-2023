<?php 
/**
 * @author Samuel Arteaga López <samu.ar.lo.04@gmail.com>
 */
include_once "../traitDB.php";
class Incidencia{
    use traitDB;
    static $codigoIncidencia = 0;
    static $contadorPendientes = 0;
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
                CODIGO INTEGER,
                ESTADO VARCHAR (100) NOT NULL,
                PUESTO VARCHAR (15),
                PROBLEMA VARCHAR(255),
                RESOLUCION VARCHAR(255),
                CONSTRAINT PK_CODIGO PRIMARY KEY(CODIGO)
            )";
            $conn->exec($sql);
    
        } catch (PDOException $e) {
            die("Error resetting database: " . $e->getMessage());
        }
    }
    
    public static function creaIncidencia($num, $mensaje){
        $self = new self($num, $mensaje);
        
        $conn = traitDB::connectDB();
        $sql = "INSERT INTO INCIDENCIA (CODIGO, ESTADO, PUESTO, PROBLEMA, RESOLUCION) VALUES (?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$self->codigo, $self->estado, $self->numero, $self->incidencia, $self->solucion]);
    
        return $self;
    }
    
   
    public static function leeIncidencia($codigo){
        $conn = traitDB::connectDB();
        $sql = "SELECT * FROM INCIDENCIA WHERE CODIGO = ?";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$codigo]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        
        return $result;
    }
    

    public static function leeTodasIncidencias(){
        $conn = traitDB::connectDB();
        $sql = "SELECT * FROM INCIDENCIA";
        $stmt = $conn->query($sql);
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
        return $result;
    }
    

    public function actualizaIncidencia($estado, $puesto, $problema, $solucion){
        $this->estado = $estado;
        $this->numero = $puesto;
        $this->incidencia = $problema;
        $this->solucion = $solucion;
        
        $conn = traitDB::connectDB();
        $sql = "UPDATE INCIDENCIA SET ESTADO = ?, PUESTO = ?, PROBLEMA = ?, RESOLUCION = ? WHERE CODIGO = ?";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$this->estado, $this->numero, $this->incidencia, $this->solucion, $this->codigo]);
    }
    

    public function borraIncidencia(){
        $conn = traitDB::connectDB();
        $sql = "DELETE FROM INCIDENCIA WHERE CODIGO = ".$this->getCodigo()."";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        
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
        self::$codigoIncidencia--;
    }
    

    public static function getPendientes(){
        return self::$codigoIncidencia;
        
    }

    public function __toString(){
        return "Incidencia ". $this->codigo ." - Puesto: $this->numero - $this->incidencia - ". $this->getEstado()." - ". $this->solucion." \n";
    }
}
?>