<?php 
include_once "Ave.php";
class Canario extends Ave {
    private $nombre;

    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    public function pia() {
        echo $this . ": Pio pio pio\n";
    }

    public function __construct(){
        $this->nombre = $nombre;
    }

    public function alimentarse() {
        echo $this . ": Estoy comiendo alpiste\n";
    }

    public static function consSexo($sexo){
        self::$sexo = $sexo;
    }

    public static function consFull($sexo, $nombre){
        self::$sexo = $sexo;
        self::$nombre = $nombre;
    }


    public function __toString() {
        return parent::__toString() . ", en concreto un Canario, con sexo " . strtoupper($this->sexo) . ", llamado " . $this->nombre;
    }
}


?>