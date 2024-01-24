<?php 
include_once "Animal.php";
class Lagarto extends Animal {
    private $nombre;

    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    public function getNombre() {
        return $this->nombre;
    }

    public function __construct(){
        $this->nombre = $this->getNombre();
    }

    public static function consSexo($sexo){
        $lagarto = new self(); 

        $lagarto->setSexo($sexo);

        return $lagarto;
    }

    public static function consFull($sexo, $nombre){
        $lagarto = new self(); 

        $lagarto->setSexo($sexo);
        $lagarto->setNombre($nombre);

        return $lagarto;
    }

    public function dormirse() {
        echo "Lagarto ".$this->getNombre() . ": Zzzzzzz\n";
    }

    public function tomarSol() {
        echo  "Lagarto ".$this->getNombre() . ": Estoy tomando el sol\n";
    }

    public function alimentarse() {
        echo "Lagarto ".$this->getNombre() . ": Estoy comiendo insectos\n";
    }

    public function morirse() {
        echo "Lagarto ".$this->getNombre() . ": Adiós!\n";
        Animal::$totalAnimales--;
        
    }

    public function __toString() {
        return parent::__toString() . ", en concreto un Lagarto, con sexo " . strtoupper(parent::getSexo()) . ", llamado " . $this->getNombre(). "\n";
    }
}

?>