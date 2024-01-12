<?php
   class Terminal {
    private $numero;
    private $tiempoConversacion;
    private $segundos;

    private $tiempoTarificado;

    public function __construct($id) {
        $this->numero = $id;
    }

    public function getId() {
        return $this->numero;
    }

    public function getSegundos() {
        return $this->segundos;
    }

    public function setSegundos($segundos) {
        $this->segundos = $segundos;
    }

    public function getTiempoConversacion() {
        $minutos=number_format($this->tiempoConversacion/60,0);
        $segundos= $this->tiempoConversacion % 60;
        $tiempo = $minutos ."m y ". $segundos ."s ";
        return $tiempo;
    }

    public function setTiempoConversacion($tiempoConversacion) {
        $this->tiempoConversacion = $tiempoConversacion;
    }

    public function getTiempoTarificado() {
        $minutos = number_format($this->tiempoTarificado / 60, 0);
        $segundos = $this->tiempoTarificado % 60;
        return $minutos . "m y " . $segundos . "s ";
    }

    public function setTiempoTarificado($tiempoTarificado) {
        $this->tiempoTarificado = $tiempoTarificado;
    }

    public function llama($objeto, $segundosDeLlamada) {
        $this->tiempoConversacion += $segundosDeLlamada;
        $this->segundos += $segundosDeLlamada;
        $objeto->setTiempoConversacion($objeto->getTiempoConversacion() + $segundosDeLlamada);
    }

    public function __toString() {
        return "Nº " . $this->getId() . " - " . $this->getTiempoConversacion() . " de conversación en total - tarificados " . $this->getTiempoTarificado() . "por un importe de ";
        
    }
}
?>