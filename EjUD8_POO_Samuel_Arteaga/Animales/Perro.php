<?php 
include_once "Mamifero.php";

class Perro extends Mamifero {
    private $nombre;
    private $raza;

    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    public function setRaza($raza) {
        $this->raza = $raza;
    }

    public function ladra() {
        echo $this . ": Guau guau \n";
    }

    public function alimentarse() {
        echo $this . ": Estoy comiendo carne\n";
    }

    public static function consSexoNombre($sexo, $nombre){
        self::$sexo = $sexo;
        self::$nombre = $nombre;
    }

    public static function consFull($sexo, $nombre){
        self::$sexo = $sexo;
        self::$nombre = $nombre;
    }


    public function __toString() {
        return parent::__toString() . ", en concreto un Perro, con sexo " . strtoupper($this->sexo) . ", raza " . $this->raza . " y mi nombre es " . $this->nombre;
    }
}
?>