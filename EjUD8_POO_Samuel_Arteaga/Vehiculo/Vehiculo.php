<?php 
class Vehiculo {
    public static $vehiculosCreados = 0;
    public static $kilometrosTotales = 0;

    protected $kilometrosRecorridos = 0;

    public function avanza($kilometros) {
        self::$kilometrosRecorridos += $kilometros;
        self::$kilometrosTotales += $kilometros;
    }

    public function verKMRecorridos() {
        return "Kilómetros recorridos: {$this->kilometrosRecorridos} km \n";
    }

    public static function verKMTotales() {
        return "Kilómetros totales de todos los vehículos: " . self::$kilometrosTotales . " km \n";
    }

    public static function verVehiculosCreados() {
        return "Número de vehículos creados: " . self::$vehiculosCreados . " \n";
    }
}