<?php 
include_once "Mamifero.php";

class Gato extends Mamifero {
    private $nombre;
    private $raza;

    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    public function getNombre() {
        return $this->nombre;
    }

    public function setRaza($raza) {
        $this->raza = $raza;
    }

    public function getRaza() {
        return $this->raza;
    }

    public function maulla() {
        echo "Gato ". $this->getNombre() . ": Miauuuu\n";
    }

    public function alimentarse() {
        echo "Gato ". $this->getNombre() . ": Estoy comiendo pescado\n";
    }

    public function morirse() {
        echo "Gato ". $this->getNombre() . ": Adiós!\n";
        Mamifero::$totalMamiferos--;
        Animal::$totalAnimales--;
    }

    public function dormirse() {
        echo "Gato ". $this->getNombre() . ": Zzzzzzz\n";
    }

    public function amamantar() {
        echo "Gato ". $this->getNombre() . ": Amamantando a mis crías\n";
    }

    public function __construct($sexo = 'M'){
        parent::__construct($sexo);
        Mamifero::$totalMamiferos++;

    }

    public static function consSexoNombre($sexo, $nombre){
        $gato = new self(); 

        $gato->setSexo($sexo);
        $gato->setNombre($nombre);

        return $gato;
    }

    public static function consFull($sexo, $nombre, $raza){
        $gato = new self(); 

        $gato->setSexo($sexo);
        $gato->setNombre($nombre);
        $gato->setRaza($raza);

        return $gato;
    }
    public function __toString() {
        $sexo = ($this->sexo === "H") ? "Hembra" : "Macho";
        if ($this->nombre === null) {
            return parent::__toString() . ", en concreto un Gato, con sexo " . strtoupper($sexo) . ", raza " . $this->getRaza() . " y no tengo nombre \n";
        }
        return parent::__toString() . ", en concreto un Gato, con sexo " . strtoupper($sexo) . ", raza " . $this->getRaza() . " y mi nombre es " . $this->getNombre()."\n";
       
    }
}

?>