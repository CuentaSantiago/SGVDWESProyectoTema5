<?php
$aUsuariosPermitidos = [
    'admin' => [
        'password' => 'paso',
        'descripcion' => 'Usuario administrador'
    ]
];
if (!isset($_SERVER['PHP_AUTH_USER']) || !isset($_SERVER['PHP_AUTH_PW'])) {
    header('WWW-Authenticate: Basic realm="ProyectoTema5"');
    header('HTTP/1.1 401 Unauthorized');
    echo "<h1>Acceso cancelado o no autorizado.</h1>";
    exit;
}
$codigoUsuario=$_SERVER['PHP_AUTH_USER'];
$passwordUsuario=$_SERVER['PHP_AUTH_PW'];

if (isset($aUsuariosPermitidos[$codigoUsuario]) && $aUsuariosPermitidos[$codigoUsuario]['password'] == $passwordUsuario) {
    $descripcionUsuario = $aUsuariosPermitidos[$codigoUsuario]['descripcion'];
} else {
    header('WWW-Authenticate: Basic realm="ProyectoTema5"');
    header('HTTP/1.1 401 Unauthorized');
    exit;
}
?>
<!DOCTYPE html>
<html lang="es">
    <!--
    Autor: Santiago González Vicente
    Fecha Modificacion: 2026-11-06
    Descripcion: Indice DAW2
    -->
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="webroot/css/estilos.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <title>Ejercicio 1</title>
    </head>
    <body>
        <div>
            <p>Bienvenido, <?php echo $descripcionUsuario; ?>.</p>
            <p>Se ha identificado correctamente al usuario: <strong><?php echo $codigoUsuario; ?></strong></p>
        </div>
        <footer>
            <p><time datetime="2026-09-14">2026-2027</time> IES LOS SAUCES. ©Todos los derechos reservados</p>
            <p>Santiago González Vicente. 14/09/2026</p>
            <a href="https://github.com/CuentaEducaSantiago/SGVDWESProyectoTema3" target="_blank" rel="noopener"><i class="fa fa-github" style="font-size:40px; margin-right: 15px;"></i></a>
            <a href="../indexProyectoTema5.php"><i class="fa fa-home" style="font-size:40px; margin-right: 15px;"></i></a>
        </footer>
    </body>
</html>