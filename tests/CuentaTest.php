<?php
abstract class CuentaTest extends \PHPUnit\Framework\TestCase
{
    public function testSePuedeCrearYObtenerSaldo()
    {
        $c =$this->crear(5000);
        $this->assertEquals(5000, $c->getSaldo());
    }

    public function testNoSePuedeCrearConSaldoNegativo()
    {
        $this->expectException(\Exception::class);
        $c = $this->crear(-2000);
    }

    public function testRealizaDepositosYActualizaSaldo()
    {
        $c = $this->crear(7000);
        $this->assertEquals("Depósito realizado", $c->depositar(1000));
        $this->assertEquals(8000, $c->getSaldo());
    }

    public function testNoSePuedeDepositarCero()
    {
        $c = $this->crear(5000);
        $this->expectException(\Exception::class);
        $c->depositar(0);
    }

    public function testNoSePuedeDepositarNegativo()
    {
        $c = $this->crear(5000);
        $this->expectException(\Exception::class);
        $c->depositar(-1000);
    }

    public function testRealizaExtraccionYActualizaSaldo()
    {
        $c = $this->crear(5000, 2000);
        $this->assertEquals("Extracción realizada", $c->extraer(1000));
        $this->assertEquals(4000, $c->getSaldo());
    }

    public function testNoSePuedeExtraerCero()
    {
        $c = $this->crear(5000);
        $this->expectException(\Exception::class);
        $c->extraer(0);
    }

    public function testNoSePuedeExtraerNegativo()
    {
        $c = $this->crear(5000);
        $this->expectException(\Exception::class);
        $c->extraer(-1000);
    }
}
