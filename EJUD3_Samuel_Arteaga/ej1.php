<?php 
/**
 * @author Samuel Arteaga López <samu.ar.lo.04@gmail.com>
 * 
 */
/*1. Elabora un programa que dado un carácter determine si es:
1. una letra mayúscula
2. una letra minúscula
3. un carácter numérico
4. un carácter blanco
5. un carácter de puntuación
6. un carácter especial*/

$caracter = readline("Escribe el caracter para determinar lo que es: "); //mediante readline leemos el carácter


/*Mediante if y elseif comprobamos con las funciones ctype_... 
decimos si es un caracter o otro*/

if (ctype_upper($caracter)) { 
    echo "El caracter $caracter es mayúscula \n";
}
else if(ctype_lower($caracter)){
    echo "El caracter $caracter es minúscula \n";

}                                                                              
else if(ctype_digit($caracter)){
    echo "El caracter $caracter es númerico \n"; 
}
else if(ctype_space($caracter)){
    echo "El caracter $caracter es un espacio en blanco \n"; 

}
else if(ctype_punct($caracter)){
    echo "El caracter $caracter es un carácter de puntuación \n"; 

}

if(ctype_alnum($caracter)== false){
    echo "El caracter $caracter es un carácter especial \n"; 

}

?>