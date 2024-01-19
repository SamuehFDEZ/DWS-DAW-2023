<?php 
include_once "Animal.php";

abstract class Ave extends Animal{

    private $totalAves;

    public static function getTotalAves(){
        return self::$totalAves;
    }

    public function setTotalAves($totalAves){
        $this->totalAves = $totalAves;
    }

    public function __construct(){

    }

    public function ponerHuevo(){

    }


    public function __toString(){
        return "";
    }


}

?>