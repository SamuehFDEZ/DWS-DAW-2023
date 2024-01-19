<?php 
trait traitDNI {
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

?>