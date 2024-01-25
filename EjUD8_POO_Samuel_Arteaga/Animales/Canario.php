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
        Animal::$totalAnimales++;
        Ave::$totalAves++;

    }

    public function alimentarse() {
        echo "Canario ". $this->getNombre() . ": Estoy comiendo alpiste\n";
    }

    public function ponerHuevo() {
        echo "Canario ". $this->getNombre() . ": He puesto un huevo!\n";
    }

    public function morirse() {
        echo "Canario ". $this->getNombre() . ": Adiós!\n";
        Ave::$totalAves--;
        Animal::$totalAnimales--;

    }

    public static function consSexo($sexo){
        $canario = new self(); 
        //Animal::$totalAnimales++;

        $canario->setSexo($sexo);

        return $canario;
    }

    public static function consFull($sexo, $nombre){
        $canario = new self(); 
        //Animal::$totalAnimales++;

        $canario->setSexo($sexo);
        $canario->setNombre($nombre);

        return $canario;
    }


    public function __toString() {
        $sexo = ($this->sexo === "H") ? "Hembra" : "Macho";
        return parent::__toString() . ", en concreto un Canario, con sexo " . strtoupper($sexo) . ", llamado " . $this->getNombre(). "\n";
    }
}


?>