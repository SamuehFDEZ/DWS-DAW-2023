<?php 
include_once "Animal.php";
class Lagarto extends Animal {
    private $nombre;

    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    public static function consSexo($sexo){
        self::$sexo = $sexo;
    }

    public static function consFull($sexo, $nombre){
        self::$sexo = $sexo;
        self::$nombre = $nombre;
    }


    public function tomarSol() {
        echo $this . ": Estoy tomando el sol\n";
    }

    public function alimentarse() {
        echo $this . ": Estoy comiendo insectos\n";
    }

    public function __toString() {
        return parent::__toString() . ", en concreto un Lagarto, con sexo " . strtoupper($this->sexo) . ", llamado " . $this->nombre;
    }
}

?>