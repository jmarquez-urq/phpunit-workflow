<?php
require_once 'CuentaTest.php';
class CuentaCorrienteTest extends CuentaTest
{
    public function crear($saldo = 5000, $tope = 2000, $n = 123, $titular = "Fulano")
    {
        $cc = new \App\CuentaCorriente($n, $titular, $saldo, $tope);
        return $cc;
    }

    public function testNoSePuedeExtraerMasDelTopeDescubierto()
    {
        $c = $this->crear(2000, 1000);
        $this->assertEquals("Tope de descubierto excedido", $c->extraer(4000));
        $this->assertEquals(2000, $c->getSaldo());
    }

    public function testSePuedeTenerSaldoNegativoDentroDelTope()
    {
        $c = $this->crear(2000, 1000);
        $this->assertEquals("Extracción realizada", $c->extraer(2500));
        $this->assertEquals(-500, $c->getSaldo());
        $this->assertEquals("Extracción realizada", $c->extraer(500));
        $this->assertEquals(-1000, $c->getSaldo());
    }



}
