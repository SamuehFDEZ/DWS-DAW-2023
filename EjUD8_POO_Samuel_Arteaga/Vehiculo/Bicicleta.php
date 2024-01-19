<?php

class Bicicleta extends Vehiculo {
    public function hacerCaballito() {
        echo "¡Haciendo el caballito con la bicicleta! \n";
    }

    public function ponerCadena() {
        echo "Poniendo cadena a la bicicleta. \n";
    }
    

    public function verKMRecorridos() {
        return "Kilómetros recorridos en bicicleta: {$this->kilometrosRecorridos} km \n";
    }

    public function __construct() {
        parent::$vehiculosCreados++;
    }
}