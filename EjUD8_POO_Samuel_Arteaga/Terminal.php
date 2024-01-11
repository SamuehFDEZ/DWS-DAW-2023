<?php
    class Terminal{
    /*subclase de Terminal (con atributos número y tiempo de
    conversación y el método llama($terminal,$segundosDeLlamada) donde se pasa el terminal al
    que se llama y se debe actualizar el tiempo de conversación para el terminal que llama y el
    llamado). Cada móvil lleva asociada una tarifa que puede ser “rata”, “mono” o “bisonte”. El
    coste por minuto es de 6, 12 y 30 céntimos respectivamente. Se tarifican los segundos exactos.
    Obviamente, cuando un móvil llama a otro, se le cobra al que llama, no al que recibe la llamada.
    A continuación, se proporciona el contenido del main y el resultado que debe aparecer por
    pantalla. */

        private $numero;
        private $tiempoConversacion;

        public function getNumero(){
            return $this->numero;
        }

        public function setNumero($numero){
            $this->$numero = $numero;
        }

        public function getTiempoConversacion(){
            return $this->tiempoConversacion;
        }

        public function setTiempoConversacion($tiempoConversacion){
            $this->tiempoConversacion = $tiempoConversacion;
        }

        public function llama($objeto, $segundosDeLlamada){
            $this->$objeto = $objeto;
            $this->$segundosDeLlamada = round($segundosDeLlamada/60);
        }

        public function __construct(){
            
        }
    }
?>