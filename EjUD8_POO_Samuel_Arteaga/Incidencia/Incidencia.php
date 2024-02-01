<?php 

const USERNAME = "dwes";
const PASSWORD = "dbdwespass";

try {
    $pdo = new PDO('mysql:host=localhost:33006;dbname=INCIDENCIAS', USERNAME, PASSWORD);
    $resultado = $pdo->query("SELECT ESTADO FROM INCIDENCIA");
    $fila = $resultado->fetch(PDO::FETCH_ASSOC);
    echo "El ID de Cliente (pdo) es " . htmlentities($fila['ESTADO'] . "<br>\n");
} catch (PDOException $e) {
    print "No se ha podido realizar la conexión: " . $e->getMessage();
}

class Incidencia{
    static $codigoIncidencia = 0;
    static $contadorPendientes = 0;
    private $codigo; 
    private $numero;
    private $incidencia;
    private  $estado = "Pendiente"; 
    private $solucion;


   

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