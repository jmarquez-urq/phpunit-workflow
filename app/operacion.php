<?php
require_once 'CajaAhorro.php';
require_once 'CuentaCorriente.php';

//Indicamos que continuamos con la sesión iniciada anteriormente...
session_start();
//... y recuperamos la cuenta del usuario cuya sesión está activa.
$cuenta= unserialize($_SESSION['cuenta']);


$mensaje="Operación no realizada";
switch($_GET["tipo"]) {
    case "e":
        //Polimorfismo: No sabemos si $cuenta es CajaAhorro o CuentaCorriente,
        //pero igualmente le enviamos el mensaje extraer, que hará lo correcto
        //en cualquiera de los dos casos:
        $mensaje=$cuenta->extraer($_GET['monto']);
        break;
    case "d":
        //Polimorfismo con el mensaje depositar:
        $mensaje=$cuenta->depositar($_GET['monto']);
        break;
    default:
        $mensaje="Operacion inexistente";
        break;                
}

$array = [ 'mensaje' => $mensaje, 'saldo' => $cuenta->getSaldo()];

//Sobreescribo la variable de sesión con los nuevos datos.
$_SESSION['cuenta'] = serialize($cuenta);

header('Content-Type: application/json');
echo json_encode($array);

?>


