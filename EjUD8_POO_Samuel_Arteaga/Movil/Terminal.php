<?php
class Terminal{
    public $numero;
    public $tiempoConversacion;
    public $minutosTotales = 0;
    public $segundosTotales = 0;

    public function setNumero($numero){
        $this->numero = $numero;
    }
    public function getNumero(){
        return $this->numero;
    }
    public function setTiempoConversacion($tiempoConversacion){
        $this->tiempoConversacion = $tiempoConversacion;
    }
    public function getTiempoConversacion(){
        return $this->tiempoConversacion;
    }
    public function setMinutosTotales($minutosTotales){
        $this->minutosTotales = $minutosTotales;
    }
    public function getMinutosTotales(){
        return $this->minutosTotales;
    }
    public function setSegundosTotales($segundosTotales){
        $this->segundosTotales = $segundosTotales;
    }
    public function getSegundosTotales(){
        return $this->segundosTotales;
    }
    public function llama($objeto, $segundosTarifa){
        $objeto->setTiempoConversacion($objeto->getTiempoConversacion()+$segundosTarifa);
        $this->tiempoConversacion = $this->tiempoConversacion+$segundosTarifa;
    
    }
}
