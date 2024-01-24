<?php 
include_once "Mamifero.php";

class Perro extends Mamifero {
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

    public function ladra() {
        echo "Perro ". $this->getNombre() . ": Guau guau \n";
    }

    public function alimentarse() {
        echo "Perro ". $this->getNombre() . ": Estoy comiendo carne\n";
    }

    public function amamantar() {
        echo "Perro ". $this->getNombre() . ": Amamantando a mis crías\n";
    }

    public function morirse() {
        echo "Perro ". $this->getNombre() . ": Adiós!\n";
        Animal::$totalAnimales--;
    }

    public function dormirse() {
        echo "Perro ". $this->getNombre() . ": Zzzzzzz\n";
    }


    public static function consSexoNombre($sexo, $nombre){
        $perro = new self(); 

        $perro->setSexo($sexo);
        $perro->setNombre($nombre);

        return $perro;
    }

    public static function consFull($sexo, $nombre, $raza){
        $perro = new self(); 

        $perro->setSexo($sexo);
        $perro->setNombre($nombre);
        $perro->setRaza($raza);

        return $perro;
    }


    public function __toString() {
        return parent::__toString() . ", en concreto un Perro, con sexo " . strtoupper($this->getSexo()) . ", raza " . $this->getRaza() . " y mi nombre es " . $this->getNombre() ."\n";
    }
}
?>