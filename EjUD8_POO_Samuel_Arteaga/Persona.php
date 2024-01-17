<?php 

include "traitDNI.php";
class Persona{
    use traitDNI;
    public $nombre;
    public $edad;
    public $DNI;
    public $sexo = "H";
    public $peso;
    public $altura;
    const INFRAPESO = -1;
    const PESO_IDEAL = 0;
    const SOBREPESO = 1;

    public function getNombre() {
        return $this->nombre;
    }

    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    public function getEdad() {
        return $this->edad;
    }

    public function setEdad($edad) {
        $this->edad = $edad;
    }

    public function getDNI() {
        return $this->DNI;
    }

    public function setDNI($DNI) {
        $this->DNI = $DNI;
    }

    public function getPeso() {
        return $this->peso;
    }

    public function setPeso($peso) {
        $this->peso = $peso;
    }

    public function getSexo() {
        return $this->sexo;
    }

    public function setSexo($sexo) {
        $this->sexo = $this->comprobarSexo($sexo);
    }
    
    public function getAltura() {
        return $this->altura;
    }

    public function setAltura($altura) {
        $this->altura = $altura;
    }

    public function __construct(){
        $this->nombre = "";
        $this->edad = 0;
        $this->sexo = "H";
        $this->DNI = "";
        $this->peso = 0;
        $this->altura = 0; 
    }

    public static function consFull($nombre, $edad, $sexo, $peso, $altura){
        $persona = new self();

        $persona->generarDNI();
        $persona->setNombre($nombre);
        $persona->setEdad($edad);
        $persona->setSexo($sexo);
        $persona->setPeso($peso);
        $persona->setAltura($altura);

        return $persona;
    }

    public static function consNomEdSex($nombre, $edad, $sexo){
        $persona = new self();
        
        $persona->generarDNI();
        $persona->setNombre($nombre);
        $persona->setEdad($edad);
        $persona->setSexo($sexo);
        return $persona;
    }

    public function comprobarSexo($sexo){
        if($sexo != "M" && $sexo != "H"){
            return "H";
        } 
        else{
            return $sexo;
        }
    }

    public function calcularIMC(){
        $imc = $this->peso/ ($this->altura**2);
       if($imc <= 20){
            return $this->nombre . " tiene sobrepeso";
       }
       else if($imc >= 20 && $imc <=25){
            return $this->nombre ." está por debajo de su peso ideal";
       }
       else if($imc >= 25){
            return $this->nombre . " tiene sobrepeso";
       }
    }

    public function strIMC(){
       return self::calcularIMC();
    }   

    public function esMayorDeEdad(){
        return ($this->edad >= 18) ? true : false;
    }

    public function MostrarIMC(){
        return self::strIMC();
    }

    public function __toString(){
        $sexo = ($this->sexo === "H") ? "Hombre" : "Mujer";
        $resultadoIMC = $this->strIMC();
        return "\nInformación de la persona:\n" .
               "DNI: {$this->generarDNI()}\n" .
               "Nombre: {$this->nombre}\n" .
               "Sexo: ". $sexo."\n" .
               "Edad: {$this->edad}\n" .
               "Peso: {$this->peso} Kg\n" .
               "Altura: {$this->altura} metros\n" .
               "Resultado IMC: {$resultadoIMC}\n";
    }
}