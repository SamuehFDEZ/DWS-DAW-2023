<?php 
include_once "Animal.php";
class Ave extends Animal {
    static $totalAves = 0;

    public function __construct($sexo = "M") {
        parent::__construct($sexo);
    }

    public static function getTotalAves() {
        return "Hay un total de " . self::$totalAves . " aves\n";
    }

    public function ponerHuevo() {
        echo $this . ": He puesto un huevo!\n";
    }

    public function __toString() {
        return parent::__toString() . ", un Ave";
    }
}
?>