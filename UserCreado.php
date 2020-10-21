<?php
require_once 'funciones/functions.php';
header_view();

$primerNombre = !empty($_POST['primerNombre']) ? $_POST['primerNombre'] : '';
$segundoNombre = !empty($_POST['segundoNombre']) ? $_POST['segundoNombre'] : '';
$primerApellido = !empty($_POST['primerApellido']) ? $_POST['primerApellido'] : '';
$segundoApellido = !empty($_POST['segundoApellido']) ? $_POST['segundoApellido'] : '';
$apellidoCasada = !empty($_POST['apellidoCasada']) ? $_POST['apellidoCasada'] : '';
$fechaNacimiento = !empty($_POST['fecha']) ? $_POST['fecha'] : '';
$sangre = !empty($_POST['sangre']) ? $_POST['sangre'] : '';
$informacion = !empty($_POST['informacion']) ? $_POST['informacion'] : '';
$genero = !empty($_POST['genero']) ? $_POST['genero'] : '';
$dpi = !empty($_POST['dpi']) ? $_POST['dpi'] : '';
$tipoDocumento = "1";
$pais = !empty($_POST['pais']) ? $_POST['pais'] : '';
$mail = !empty($_POST['mail']) ? $_POST['mail'] : '';
$celular = !empty($_POST['celular']) ? $_POST['celular'] : '';
$password = !empty($_POST['password']) ? $_POST['password'] : '';
$template = !empty($_POST['template']) ? $_POST['template'] : '';


$arrData = [
    "primerNombre" => "{$primerNombre}",
    "segundoNombre" => "{$segundoNombre}",
    "primerApellido" => "{$primerApellido}",
    "segundoApellido"=> "{$segundoApellido}",
    "apellidoCasada"=> "{$apellidoCasada}",
    "fechaNacimiento" => date("Y-m-d",strtotime($fechaNacimiento)),
    "tipoSangre" => "{$sangre}",
    "medioInformacion" => "{$informacion}",
    "numeroDocIdentificacion" => "{$dpi}",
    "tipoDocumentoId" => "{$tipoDocumento}",
    "sexo" => "{$genero}",
    "paisId" => "{$pais}",
    "email" => "{$mail}",
    "celular" => "{$celular}",
    "password" => "{$password}",
    "template" => "{$template}",
];

$myJSON = json_encode($arrData);

//debug($arrData);
?>

<body class="container">
  <!-- BUSQUEDA-->
  <br>
        <div class="alert alert-primary" role="alert">
            Usuario Creado Correctamente.
        </div>
  </body>
  </html>