<?php 
include_once "Animal.php";
class Lagarto extends Animal{

    private $nombre;

    public function getNombre(){
        return $this->nombre;
    }

    public function setNombre($nombre){
        $this->nombre = $nombre;
    }

    public function tomarSol(){

    }

    public static function consSexo($sexo){
        return parent::consSexo($sexo);
    }

    public static function consFull($sexo, $nombre){
       return parent::consFull($sexo, $nombre);
    }
}

?>