<?php
require_once 'CuentaTest.php';

class CajaAhorroTest extends CuentaTest
{
    public function crear($saldo = 5000, $tope = 2000, $n = 123, $titular = "Fulano")
    {
        $ca = new \App\CajaAhorro($n, $titular, $saldo, $tope);
        return $ca;
    }


    public function testNoSePuedeExtraerMasDelTope()
    {
        $c = $this->crear(5000, 3000);
        $this->assertEquals("Error, tope de extracción excedido" ,
                            $c->extraer(4000));
        $this->assertEquals(5000, $c->getSaldo());
    }

    public function testNoSePuedeExtraerMasDelSaldo()
    {
        $c = $this->crear(1000, 3000);
        $this->assertEquals("Error, ud. no dispone de fondos para retirar 2000",
                             $c->extraer(2000));
        $this->assertEquals(1000, $c->getSaldo());
    }


}
