<?php 
include_once "Animal.php";

class Mamifero extends Animal {
    static $totalMamiferos = 0;

    public function __construct($sexo = "M") {
        parent::__construct($sexo);
    }

    public static function getTotalMamiferos() {
        return "Hay un total de " . self::$totalMamiferos . " mamíferos\n";
    }

    public function amamantar() {
        echo $this . ": Amamantando a mis crías\n";
    }

    public function __toString() {
        return parent::__toString() . ", un Mamífero";
    }
}

?>