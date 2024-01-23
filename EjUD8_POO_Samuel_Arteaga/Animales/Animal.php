<?php 
abstract class Animal {
    private static $totalAnimales = 0;
    protected $sexo;

    public function __construct($sexo = "M") {
        $this->sexo = $sexo;
        self::$totalAnimales++;
    }

    public static function getTotalAnimales() {
        return "Hay un total de " . self::$totalAnimales . " animales\n";
    }

    public function dormirse() {
        echo $this . ": Zzzzzzz\n";
    }

    public function alimentarse() {
        echo $this . ": Estoy comiendo\n";
    }

    public function morirse() {
        echo $this . ": Adiós!\n";
        self::$totalAnimales--;
    }

    public function __toString() {
        return "Soy un Animal";
    }
}


?>