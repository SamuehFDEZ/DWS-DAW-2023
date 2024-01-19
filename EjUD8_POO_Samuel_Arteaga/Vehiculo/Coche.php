<?php

class Coche extends Vehiculo {
    public function quemaRueda() {
        echo "¡Quemando rueda con el coche! \n";
    }

    public function llenarDeposito() {
        return "Depósito del coche lleno. \n";
    }

    public function verKMRecorridos() {
        return "Kilómetros recorridos en coche: {$this->kilometrosRecorridos} km \n";
    }

    public function __construct() {
        parent::$vehiculosCreados++;
    }
}
