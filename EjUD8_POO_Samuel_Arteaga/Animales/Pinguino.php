<?php 

class Pinguino extends Ave{
    private $nombre;

    public function getNombre(){
        return $this->nombre;
    }

    public function setNombre($nombre){
        $this->nombre = $nombre;
    }
}

?>