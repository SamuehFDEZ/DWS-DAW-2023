<?php 

    include "Terminal.php";

    class Movil extends Terminal{
        private $numeroMovil;
        private $tarifa;
        private $minutos = 0;
        private $segundos = 0;
        private $euros = 0;

        public function getNumeroMovil(){
            return $this->numeroMovil;
        }

        public function setNumeroMovil($numeroMovil){
            $this->numeroMovil = $numeroMovil;
        }
        
        public function getTarifa(){
            return $this->tarifa;
        }

        public function setTarifa($tarifa){
            $this->tarifa = $tarifa;
        }

        public function getMinutos(){
            return $this->minutos;
        }

        public function setMinutos($minutos){
            $this->minutos = $minutos;
        }

        public function getSegundos(){
            return $this->segundos;
        }

        public function setSegundos($segundos){
            $this->segundos = $segundos;
        }

        public function getEuros(){
            return $this->euros;
        }

        public function setEuros($euros){
            $this->euros = $euros;
        }

        public function __construct($numeroMovil, $tarifa) {
            $this->numeroMovil = $numeroMovil;
            $this->tarifa = $tarifa;
        }

        public function __toString(){
            return "Nº ". $this->numeroMovil ." - ".$this->minutos." m y ". $this->segundos." s de conversación en total - tarificados". $this->minutos ." m y ". $this->segundos ."s por un importe de ". $this->euros ." euros \n";
        }
    }
?>