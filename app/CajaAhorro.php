<?php
namespace App;
require_once 'Cuenta.php';
class CajaAhorro extends Cuenta {
    public $topeExtraccion = 2000;

    public function __construct($numero, $titular, $saldoInicial, $topeExtraccion = 2000) {
        if ($saldoInicial < 0) {
            throw new \Exception();
        }
        $this->numero = $numero;
        $this->titular = $titular;
        $this->saldo = $saldoInicial;
        $this->topeExtraccion = $topeExtraccion;
    }

    public function extraer($monto) {
        if ($monto > $this->topeExtraccion) {
            return "Error, tope de extracción excedido";
        }
        elseif ($monto > $this->saldo) {
            return "Error, ud. no dispone de fondos para retirar $monto";
        }
        else {
            return parent::extraer($monto);
        }
    }
}          
