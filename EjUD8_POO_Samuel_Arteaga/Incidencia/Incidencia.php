<?php 
/**
 * @author Samuel Arteaga López <samu.ar.lo.04@gmail.com>
 */


class Incidencia{
    static $codigoIncidencia = 0;
    static $contadorPendientes = 0;
    private $codigo; 
    private $numero;
    private $incidencia;
    private  $estado = "Pendiente"; 
    private $solucion;

    public static function resetearBD(){
        
    }

    public static function creaIncidencia($num, $mensaje){

    }
   
    public static function leeIncidencia($objeto){

    }

    public static function leeTodasIncidencias(){

    }

    
    public function getCodigoIncidencia(){
        return self::$codigoIncidencia;
    }

    public function setCodigoIncidencia($codigoIncidencia){
        $this->codigoIncidencia = $codigoIncidencia;
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