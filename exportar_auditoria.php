<?php  

$servidor = 'localhost';
$usuario = 'root';
$clave = 'root';
$database = 'proyecto';

$conexion = new PDO("mysql:host=$servidor;dbname=$database",$usuario,$clave);

$sql = 'SELECT username, fecha_acceso FROM auditoria';

$ejecsql = $conexion -> prepare($sql);
$ejecsql -> execute();

$datos = $ejecsql -> fetch(PDO::FETCH_ASSOC);

$exp = "Usuario: ". $datos['username'] . " | Fecha de acceso: " . $datos['fecha_acceso'];
$_SESSION['exp'] = $exp;

$archivo = fopen('auditoria.txt', 'w+');
fwrite($archivo, $_SESSION['exp'].PHP_EOL);
fclose($archivo);

header("Content-disposition: attachment; filename: auditoria.txt");
header("Content-type: MIME");
readfile("auditoria.txt");
?>