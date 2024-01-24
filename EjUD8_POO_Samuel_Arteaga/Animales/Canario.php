<?php 
include_once "Ave.php";
class Canario extends Ave {
    private $nombre;

    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    public function getNombre() {
        return $this->nombre;
    }

    public function pia() {
        echo "Canario ". $this->getNombre() . ": Pio pio pio\n";
    }
    public function __construct(){
        $this->nombre = $this->getNombre();
    }

    public function alimentarse() {
        echo "Canario ". $this->getNombre() . ": Estoy comiendo alpiste\n";
    }

    public function ponerHuevo() {
        echo "Canario ". $this->getNombre() . ": He puesto un huevo!\n";
    }

    public function morirse() {
        echo "Canario ". $this->getNombre() . ": Adiós!\n";
        Animal::$totalAnimales--;
    }

    public static function consSexo($sexo){
        $canario = new self(); 

        $canario->setSexo($sexo);

        return $canario;
    }

    public static function consFull($sexo, $nombre){
        $canario = new self(); 

        $canario->setSexo($sexo);
        $canario->setNombre($nombre);

        return $canario;
    }


    public function __toString() {
        return parent::__toString() . ", en concreto un Canario, con sexo " . strtoupper($this->getSexo()) . ", llamado " . $this->getNombre(). "\n";
    }
}


?>