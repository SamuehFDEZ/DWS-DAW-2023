<?php /* Calculadora.php */
class Calculadora { //creamos una clase calculadora con 4 funciones: sumar, restar. multiplicar, y dividir 
    public function sumar($a=0, $b=0){ // cada funcion hace su respectiva operacion y devuelve su respectivo resultado
        return $a + $b;

    }
    public function restar($a=0,$b=0){
        return $a - $b;

    }
    public function multiplicar($a=1,$b=1){
        return $a * $b;

    }
    public function dividir($a=1,$b=1){
        return $a / $b;
        
    }
}
?>

