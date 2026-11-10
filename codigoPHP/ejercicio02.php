Ejercicio 2
<?php
    require_once '../config/configDBPDO.php';
    $Valido=false;
    $_SERVER['PHP_AUTH_USER']=null;
if (!isset($_SERVER['PHP_AUTH_USER']) || !isset($_SERVER['PHP_AUTH_PW'])) {
    header('WWW-Authenticate: Basic realm="ProyectoTema5"');
    header('HTTP/1.1 401 Unauthorized');
    exit;
}
else{
    header('WWW-Authenticate: Basic realm="ProyectoTema5"');
    header('HTTP/1.1 401 Unauthorized');
    exit;
}
    try{
        $miDB = new PDO(DSN,USERNAME,PASSWORD);
        $sql = "SELECT 1 FROM T01_Usuario WHERE T01_CodUsuario = :usuario AND T01_Password = sha2(:contras, 256)";
        $consulta = $miDB->prepare($sql);
        $consulta->execute([
            ':usuario' => $_SERVER['PHP_AUTH_USER'],
            ':contras' => $_SERVER['PHP_AUTH_PW']
        ]);
        if ($consulta->rowCount() == 1) {
            $Valido = true;
        }
    }catch(PDOException $miExceptionPDO){
        echo 'Error: ' . $miExceptionPDO->getMessage() . ' con código de error: ' . $miExceptionPDO->getCode();
    } finally {
        unset($miDB);
    }
    if (!$usuarioValido) {
        header('WWW-Authenticate: Basic realm="Contenido restringido"');
        header('HTTP/1.0 401 Unauthorized');
        echo '<h1>Acceso denegado. Se requiere autenticación.</h1>';
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