<?php 
include_once "Ave.php";

class Pinguino extends Ave {
    private $nombre;

    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    public function programar() {
        echo $this . ": Soy un pingüino programador en PHP\n";
    }

    public function alimentarse() {
        echo $this . ": Estoy comiendo peces\n";
    }

    public static function consSexo($sexo){
        self::$sexo = $sexo;
    }

    public static function consFull($sexo, $nombre){
        self::$sexo = $sexo;
        self::$nombre = $nombre;
    }


    public function __toString() {
        return parent::__toString() . ", en concreto un Pingüino, con sexo " . strtoupper($this->sexo) . ", llamado " . $this->nombre;
    }
}

?>