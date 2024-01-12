<?php 
    include "Terminal.php";

    class Movil extends Terminal {
        private $tarifa;

        public function __construct($id, $tarifa) {
            parent::__construct($id);
            $this->tarifa = $tarifa;
            $this->setSegundos(0); 
        }

        public function getCoste() {
            $coste = 0;
            switch ($this->tarifa) {
                case "rata":
                    $coste = 0.06;
                    break;
                case "mono":
                    $coste = 0.12;
                    break;
                case "bisonte":
                    $coste = 0.3;
                    break;
                default:
                    echo "error!";
            }
    
            $costeTotal = $coste * ($this->getSegundos() / 60);
            $this->setTiempoTarificado($costeTotal * 60); // Convert cost back to seconds for tarification time
            return number_format($costeTotal, 2) . " euros";
        }
        public function __toString() {
            return parent::__toString() . " - tarificados " . $this->getTiempoConversacion() . " por un importe de " . $this->getCoste() . "<br>\n";
        }
    }
?>