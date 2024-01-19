<?php 
include_once "Animal.php";

abstract class Mamifero extends Animal{

    private $totalMamiferos;

    public static function getTotalMamiferos(){
        return self::$totalMamiferos;
    }

    public function setTotalMamiferos($totalMamiferos){
        $this->totalMamiferos = $totalMamiferos;
    }

    public function __construct(){

    }

    public function amamantar(){

    }

    public function __toString(){
        return "";
    }



}



?>