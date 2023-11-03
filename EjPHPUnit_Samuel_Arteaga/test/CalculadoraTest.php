<?php /* CalculadoraTest.php */
use Calculadora;
use PHPUnit\Framework\TestCase;
class CalculadoraTest extends TestCase { //El nombre de las funciones de pruebas debe comenzar por test*
    public function testSumar(){ /*funcion para testear la funcion suma:
        creamos un objeto calculadora y realizamos 4 asserts, equals y not equals para comprobar que la operacion devuelve el
        resultado esperado y el que no se deveria de esperar respectivamente*/
        $cal = new Calculadora();
        $this->assertEquals( 6, $cal->sumar(2,4), "2+4 debe dar 6" );
        $this->assertNotEquals( 3, $cal->sumar(2,3), "2+3  no debe dar 3" );
        $this->assertEquals( 10, $cal->sumar(7,3), "7+3 debe dar 10");
        $this->assertNotEquals( 7, $cal->sumar(2,3), "2+3  no debe dar 7");

    }
    
    public function testRestar(){/*funcion para testear la funcion resta:
        creamos un objeto calculadora y realizamos 4 asserts, equals y not equals para comprobar que la operacion devuelve el
        resultado esperado y el que no se deveria de esperar respectivamente*/
        $cal = new Calculadora();
        $this->assertEquals( 5, $cal->restar(10,5), "10-5 debe dar 5" );
        $this->assertNotEquals( 1, $cal->restar(3,3), "3-3  no debe dar 1" );
        $this->assertEquals( 0, $cal->restar(3,3), "3-3 debe dar 0" );
        $this->assertNotEquals( 5, $cal->restar(2,3), "2-3  no debe dar 5" );
    }

    public function testMultiplicar(){/*funcion para testear la funcion multiplicacion:
        creamos un objeto calculadora y realizamos 4 asserts, equals y not equals para comprobar que la operacion devuelve el
        resultado esperado y el que no se deveria de esperar respectivamente*/
        $cal = new Calculadora();
        $this->assertEquals(8, $cal->multiplicar(2,4), "2*4 debe dar 8");
        $this->assertNotEquals(20, $cal->multiplicar(2,3), "2*3  no debe dar 20" );
        $this->assertNotEquals(95, $cal->multiplicar(9,5), "9*5  no debe dar 95" );
        $this->assertNotEquals(47, $cal->multiplicar(4,7), "7*4  no debe dar 47" );

    }

    public function testDividir(){/*funcion para testear la funcion division:
        creamos un objeto calculadora y realizamos 4 asserts, equals y not equals para comprobar que la operacion devuelve el
        resultado esperado y el que no se deveria de esperar respectivamente*/
        $cal = new Calculadora();
        $this->assertEquals( 3, $cal->dividir(9,3), "9÷3 debe dar 3");
        $this->assertNotEquals( 5, $cal->dividir(2,5), "2÷5  no debe dar 5" );
        $this->assertEquals( 60, $cal->dividir(120,2), "120÷2 debe dar 60" );
        $this->assertNotEquals( 89, $cal->dividir(8,9), "8÷9  no debe dar 89" );
    }
}
?>