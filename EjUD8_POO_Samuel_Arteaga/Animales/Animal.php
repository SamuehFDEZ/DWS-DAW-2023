<?php 
abstract class Animal {
    static $totalAnimales = 0;
    protected $sexo;

    public function getSexo() {
        return $this->sexo;
    }

    public function setSexo($sexo) {
        $this->sexo = $sexo;
    }

    public function __construct($sexo) {
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