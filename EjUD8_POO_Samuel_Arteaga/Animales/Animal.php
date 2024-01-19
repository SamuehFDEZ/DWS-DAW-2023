<?php 

abstract class Animal{
    private $sexo = "M";
    private static $totalAnimales;


    public function getSexo(){
        return $this->sexo;
    }

    public function setSexo($sexo){
        $this->sexo = $sexo;
    }

    public static function getTotalAnimales(){
        return self::$totalAnimales;
    }

    public function setTotalAnimales($totalAnimales){
        $this->totalAnimales = $totalAnimales;
    }


    public function dormirse(){

    }

    public function alimentarse(){

    }

    public function morirse(){

    }

    public function __construct(){
        self::$totalAnimales++;
    }

    public static function consSexo($sexo){
        $self = new static();
        $self->sexo = $sexo;
        self::$totalAnimales++;
        return $self;
    }

    public static function consFull($sexo, $nombre){
        $self = new static();
        $self->sexo = $sexo;
        $self->$nombre = $nombre;
        self::$totalAnimales++;
        return $self;
    }

    public function __toString(){
        return "";
    }
}

?>