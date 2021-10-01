<!DOCTYPE html>
<html lang="es-ar">
<head>
<meta charset="UTF-8">
<title>Orientación a objetos</title>
</head>
<body>
<h1>Home banking</h1>
<p id="mensaje" style="color:red;">Cuenta creada satisfactoriamente.</p>
<form action="operacion.php" method="post">
    <label for="saldo">Saldo de la cuenta:</label>
    <input name="saldo" id="saldo" readonly value="<?php echo $_GET['s'];  ?>"><br>
    <label for="tipo">Tipo de operación: </label>
    <select name="tipo">
        <option value="e">Extracción</option>
        <option value="d">Depósito</option>
    </select><br>
    <label for="monto">Monto: </label>
    <input name="monto" type="number"><br>
    <button type="button" onclick="operacion()">Realizar operación</button>
    <!-- 
    Para probarlo sin AJAX:
    <input type="submit" value="Realizar operación">
    -->
</form>

<script>
function operacion() {
    var f = document.forms[0];
    ejecutar(f.tipo.value, f.monto.value);
}

function ejecutar(tipo, monto) {
    var solicitud = new XMLHttpRequest();
    solicitud.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            console.log(this.responseText);
            var respuesta = JSON.parse(this.responseText);
            document.getElementById("mensaje").innerHTML = respuesta.mensaje;
            document.getElementById("saldo").value = respuesta.saldo;            
        }
    }
    solicitud.open("get", "operacion.php?tipo=" + tipo + "&monto=" + monto, true);
    solicitud.send();
}
</script>


</body>
</html>

