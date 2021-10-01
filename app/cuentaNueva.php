<?php
require_once 'CajaAhorro.php';
require_once 'CuentaCorriente.php';

if (isset($_POST['nombre']) && $_POST['nombre'] !== '' && isset($_POST['saldo'])) {
    if($_POST['tipo'] === "ca") {
        $cuenta = new App\CajaAhorro(rand(1000, 9999), $_POST['nombre'], (int) $_POST['saldo']);
    }
    elseif ($_POST['tipo'] === "cc" ) {
        $cuenta = new App\CuentaCorriente(rand(1000, 9999), $_POST['nombre'], (int) $_POST['saldo']);
    }
    else {
        die("Error en el tipo de cuenta");
    }
}
else {
    die("Error en el nombre o el saldo");
}

//Definimos variables de sesión:
session_start();
$_SESSION['cuenta'] = serialize($cuenta);

//Redirigimos al "Home banking", enviando por GET el saldo de la cuenta:
header("Location: operaciones.php?s=" . $cuenta->getSaldo());
