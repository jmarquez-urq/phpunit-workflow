<?php
namespace App;
//Cuenta es una clase abstracta, es decir que no habrá instancias de esta clase.
//En otras palabras: no se puede hacer new Cuenta();
//¿Para qué la creamos entonces? Para que otras clases "hereden" de ella.
abstract class Cuenta {
    //Las propiedades de cuenta son "protected": solamente podrán verlas las
    //instancias de Cuenta (que no existirán, porque es abstracta), y las
    //instancias de las clases que hereden de cuenta.
    protected $numero;
    protected $saldo;
    protected $titular;

    public function depositar($monto) {
        if ($monto <= 0) {
            throw new  \Exception();
        }
        $this->saldo += $monto;
        return "Depósito realizado";
    }

    public function extraer($monto) {
        if ($monto <= 0) {
            throw new  \Exception();
        }
        $this->saldo -= $monto;
        return "Extracción realizada";
    }

    //Como no se puede acceder a la propiedad saldo desde fuera de la clase,
    //creamos un método "getter", llamado getSaldo().
    //De este modo, el código cliente puede ver la propiedad a través de este
    //método, pero no modificarla.
    public function getSaldo() {
        return $this->saldo;
    }
}
