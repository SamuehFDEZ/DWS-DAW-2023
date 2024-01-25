<?php 
include_once "Ave.php";

class Pinguino extends Ave {
    private $nombre;

    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    public function getNombre() {
        return $this->nombre;
    }

    public function dormirse() {
        echo "Pinguino ". $this->getNombre() . ": Zzzzzzz\n";
    }

    public function morirse() {
        echo "Pinguino ". $this->getNombre() . ": Adiós!\n";
        Ave::$totalAves--;
        Animal::$totalAnimales--;
    }

    public function ponerHuevo() {
        echo "Pinguino ". $this->getNombre() . ": He puesto un huevo!\n";
    }



    public function programar() {
        echo "Pinguino ". $this->getNombre() . ": Soy un pingüino programador en PHP\n";
    }

    public function alimentarse() {
        echo "Pinguino ". $this->getNombre() . ": Estoy comiendo peces\n";
    }

    public function __construct(){
        $this->nombre = $this->getNombre();
        Ave::$totalAves++;
        Animal::$totalAnimales++;

    }

    public static function consSexo($sexo){
        $pinguino = new self(); 
        
        $pinguino->setSexo($sexo);

        return $pinguino;
    }

    public static function consFull($sexo, $nombre){
        $pinguino = new self(); 
       
        $pinguino->setSexo($sexo);
        $pinguino->setNombre($nombre);

        return $pinguino;
    }


    public function __toString() {
        $sexo = ($this->sexo === "H") ? "Hembra" : "Macho";
        return parent::__toString() . ", en concreto un Pingüino, con sexo " . strtoupper($sexo) . ", llamado " . $this->getNombre(). "\n";
    }
}

?>