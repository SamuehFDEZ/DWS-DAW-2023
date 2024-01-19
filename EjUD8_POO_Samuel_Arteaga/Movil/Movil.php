<?php
include "Terminal.php";
class Movil extends Terminal {
    public $telefono;
    public $tarifa;
    public $minutosTarifa = 0;
    public $segundosTarifa = 0;
    public $precio = 0;
    public function llama($objeto, $segundosTarifa){
        parent::llama($objeto, $segundosTarifa);
        switch($this->tarifa){
            case "rata";
                $this->precio += $segundosTarifa/60 * 0.06;
                $this->segundosTarifa += $segundosTarifa;
                break;
            case "mono";
                $this->precio += $segundosTarifa/60 * 0.12;
                $this->segundosTarifa += $segundosTarifa;
                break;
            case "bisonte";
                $this->precio += $segundosTarifa/60 * 0.30;
                $this->segundosTarifa += $segundosTarifa;
                break;
        }
    }
    public function setTelefono($telefono){
        $this->telefono = $telefono;
    }
    public function getTelefono(){
        return $this->telefono;
    }
    public function setNombre($tarifa){
        $this->tarifa = $tarifa;
    }
    public function getNombre(){
        return $this->tarifa;
    }
    public function setMinutosTarifa($minutosTarifa){
        $this->minutosTarifa = $minutosTarifa;
    }
    public function getMinutosTarifa(){
        return $this->minutosTarifa;
    }
    public function setPrecio($precio){
        $this->precio = $precio;
    }
    public function getPrecio(){
        return $this->precio;
    }
    public function setSegundosTarifa($segundosTarifa){
        $this->segundosTarifa = $segundosTarifa;
    }
    public function getSegundosTarifa(){
        return $this->segundosTarifa;
    }
    public function __construct($telefono, $tarifa){
        $this->telefono = $telefono;
        $this->tarifa = $tarifa;
    }
    public function __toString(){
        return "Nº ".$this->getTelefono()." - ".floor($this->getTiempoConversacion()/60)." m y ".round($this->getTiempoConversacion()%60)." s de conversación total - tarificados ".floor($this->getSegundosTarifa()/60)." m y ".round($this->getSegundosTarifa()%60)." s por un importe de ".$this->getPrecio()." euros\n";
    }
}

?>