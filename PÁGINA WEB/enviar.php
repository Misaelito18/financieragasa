<?php

$destino = "agenciamadesigns@gmail.com";

$nombre = $_POST['nombre'];
$telefono = $_POST['telefono'];
$email = $_POST['email'];
$curp = $_POST['curp'];
$direccion = $_POST['direccion'];
$ingresos = $_POST['ingresos'];
$credito = $_POST['credito'];

$mensaje = "
Nueva solicitud financiera

Nombre: $nombre
Teléfono: $telefono
Correo: $email
CURP: $curp
Dirección: $direccion
Ingresos: $ingresos
Crédito: $credito
";

$headers = "From: noreply@financieragasa.com";

mail($destino, "Nueva Solicitud Financiera", $mensaje, $headers);

/* SUBIR ARCHIVOS */

$carpeta = "documentos/";

if(!file_exists($carpeta)){
    mkdir($carpeta, 0777, true);
}

move_uploaded_file(
    $_FILES['ine']['tmp_name'],
    $carpeta . basename($_FILES['ine']['name'])
);

move_uploaded_file(
    $_FILES['domicilio']['tmp_name'],
    $carpeta . basename($_FILES['domicilio']['name'])
);

move_uploaded_file(
    $_FILES['ingresos_file']['tmp_name'],
    $carpeta . basename($_FILES['ingresos_file']['name'])
);

echo "
<style>
body{
font-family:Arial;
background:#f4f7fb;
display:flex;
justify-content:center;
align-items:center;
height:100vh;
}
.box{
background:white;
padding:40px;
border-radius:20px;
box-shadow:0 10px 30px rgba(0,0,0,.1);
text-align:center;
}
h1{
color:#1FA187;
}
</style>

<div class='box'>
<h1>Solicitud enviada</h1>
<p>Tu información fue enviada correctamente.</p>
</div>
";

?>