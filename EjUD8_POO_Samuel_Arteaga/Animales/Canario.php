<?php 
include_once "Animal.php";

class Canario extends Ave{
    private $nombre;

    public function getNombre(){
        return $this->nombre;
    }

    public function setNombre($nombre){
        $this->nombre = $nombre;
    }

    public static function consSexo($sexo){
        return parent::consSexo($sexo);
    }

    public static function consFull($sexo, $nombre){
       return parent::consFull($sexo, $nombre);
    }

    public function pia(){
        
    }
}

?>