<?php 

trait DNI {
    public function generarDNI() {
        $numeroDNI = mt_rand(10000000, 99999999); // Genera un número aleatorio de 8 cifras
        $resto = $numeroDNI % 23;
        $letra = $this->generaLetraDNI($resto);
        return $numeroDNI . $letra;
    }
    public function generaLetraDNI($idLetra) {
        $letras = "TRWAGMYFPDXBNJZSQVHLCKE";
        return $letras[$idLetra];
    }
}
class Persona{
    use DNI;
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
        $this->sexo = $sexo;
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
        if($this->sexo == "H"){
            return $sexo;
        }
        else if($this->sexo == "M"){
            return $sexo;
        }
        else if($this->sexo != "M" && $this->sexo != "H"){
            return $this->setSexo("H");
        }
    }

    public function calcularIMC(){
       if($this->peso <= 20){
            return self::PESO_IDEAL;
       }
       else if($this->peso >= 20 && $this->peso <=25){
            return self::INFRAPESO;
       }
       else if($this->peso >= 25){
            return self::SOBREPESO;
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
        $resultadoIMC = $this->strIMC();
    
        return "Información de la persona:\n" .
               "DNI: {$this->DNI}\n" .
               "Nombre: {$this->nombre}\n" .
               "Sexo: {$this->sexo}\n" .
               "Edad: {$this->edad}\n" .
               "Peso: {$this->peso} Kg\n" .
               "Altura: {$this->altura} metros\n" .
               "Resultado IMC: {$resultadoIMC}\n";
    }
    

}