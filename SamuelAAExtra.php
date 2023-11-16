<?php 
/**
 * @author Samuel Arteaga López <samu.ar.lo.04@gmail.com>
 */

/**1. Crea un array asociativo para personas que contengan los siguientes datos: Nombre, Dirección,
Teléfono, Población (debe ser Valencia o Alicante). Al menos debe haber 5 personas distintas*/

$personas = array(

    "persona1" => array(
        "Nombre"=> "Samuel",
        "Dirección"=> "Calle Albal",
        "Teléfono"=> "123456789",
        "Población"=> "Valencia",

    ),

    "persona2" => array(
        "Nombre"=> "Carlos",
        "Dirección"=> "Calle Luxemburgo",
        "Teléfono"=> "987654321",
        "Población"=> "Alicante",

    ),

    "persona3" => array(
        "Nombre"=> "Noelia",
        "Dirección"=> "Calle León",
        "Teléfono"=> "456789123",
        "Población"=> "Alicante",

    ),

    "persona4" => array(
        "Nombre"=> "Natalia",
        "Dirección"=> "Calle Lepanto",
        "Teléfono"=> "741258963",
        "Población"=> "Valencia",

    ),

    "persona5" => array(
        "Nombre"=> "Ana",
        "Dirección"=> "Calle Ibiza",
        "Teléfono"=> "963852741",
        "Población"=> "Alicante",
    )
);


 
/**2. Recorre la estructura anterior para mostrar todos los datos de cada persona */

foreach ($personas as $clave => $datosPersona) {
    echo "Persona: $clave:\n";
    foreach ($datosPersona as $campo => $valor) {
        echo "$campo: $valor\n";
    }
    echo "\n";
}


/**3. Para cada una de las personas, debes incluir sus hobbies o favoritos que consisten en al menos 3
películas, 3 libros y 3 canciones. Modifica la estructura anterior para reflejar estos cambios */

$personas = array(
    "persona1" => array(
        "Nombre" => "Samuel",
        "Dirección" => "Calle Albal",
        "Teléfono" => "123456789",
        "Población" => "Valencia",
        "Hobbies" => array(
            "Películas" => array("Inception", "The Shawshank Redemption", "The Dark Knight"),
            "Libros" => array("1984", "To Kill a Mockingbird", "The Catcher in the Rye"),
            "Canciones" => array("Bohemian Rhapsody", "Hotel California", "Stairway to Heaven")
        )
    ),

    "persona2" => array(
        "Nombre" => "Carlos",
        "Dirección" => "Calle Luxemburgo",
        "Teléfono" => "987654321",
        "Población" => "Alicante",
        "Hobbies" => array(
            "Películas" => array("The Godfather", "Pulp Fiction", "Fight Club"),
            "Libros" => array("The Great Gatsby", "One Hundred Years of Solitude", "Brave New World"),
            "Canciones" => array("Imagine", "Billie Jean", "Like a Rolling Stone")
        )
    ),

    "persona3" => array(
        "Nombre" => "Noelia",
        "Dirección" => "Calle León",
        "Teléfono" => "456789123",
        "Población" => "Alicante",
        "Hobbies" => array(
            "Películas" => array("The Matrix", "Forrest Gump", "The Silence of the Lambs"),
            "Libros" => array("The Lord of the Rings", "The Alchemist", "The Girl with the Dragon Tattoo"),
            "Canciones" => array("Bohemian Rhapsody", "Sweet Child o' Mine", "Wonderwall")
        )
    ),

    "persona4" => array(
        "Nombre" => "Natalia",
        "Dirección" => "Calle Lepanto",
        "Teléfono" => "741258963",
        "Población" => "Valencia",
        "Hobbies" => array(
            "Películas" => array("Schindler's List", "The Green Mile", "The Shawshank Redemption"),
            "Libros" => array("Crime and Punishment", "The Count of Monte Cristo", "The Picture of Dorian Gray"),
            "Canciones" => array("Hotel California", "Imagine", "Bohemian Rhapsody")
        )
    ),

    "persona5" => array(
        "Nombre" => "Ana",
        "Dirección" => "Calle Ibiza",
        "Teléfono" => "963852741",
        "Población" => "Alicante",
        "Hobbies" => array(
            "Películas" => array("Titanic", "The Shawshank Redemption", "The Dark Knight"),
            "Libros" => array("To Kill a Mockingbird", "1984", "The Catcher in the Rye"),
            "Canciones" => array("Stairway to Heaven", "Bohemian Rhapsody", "Hotel California")
        )
    )
);



/**4. Recorre la estructura anterior para mostrar todos los datos de cada persona y sus hobbies */

foreach ($personas as $clave => $datosPersona) {
    echo "Persona: $clave:\n";
    foreach ($datosPersona as $campo => $valor) {
        if ($campo == 'Hobbies') {
            echo "$campo:\n";
            foreach ($valor as $tipoHobbie => $listaHobbies) {
                echo "$tipoHobbie: " . implode(", ", $listaHobbies) . "\n";
            }
        } else {
            echo "$campo: $valor\n";
        }
    }
    echo "\n";
}
 
?>