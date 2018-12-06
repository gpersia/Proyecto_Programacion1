<?php  

$servidor = 'localhost';
$usuario = 'root';
$clave = 'root';
$database = 'proyecto';

$conexion = new PDO("mysql:host=$servidor;dbname=$database",$usuario,$clave);

$sql = 'SELECT username, fecha_acceso, response_time, endpoint, created FROM auditoria';

$ejecsql = $conexion -> prepare($sql);
$ejecsql -> execute();

$datos = $ejecsql -> fetch(PDO::FETCH_ASSOC);

$exp = "Usuario: ". $datos['username'] . " | Fecha de acceso: " . $datos['fecha_acceso']. " | Tiempo de respuesta: " . $datos['response_time'] . " | Servicio usado: " . $datos['endpoint'];
$_SESSION['exp'] = $exp;

// Create temp file
$tmpName = tempnam(sys_get_temp_dir(), 'data'); // Gets temp directory
$file = fopen($tmpName, 'w'); // Creates file in temp directory

while($row = $ejecsql->fetch(PDO::FETCH_ASSOC)){
    $str = $row["auditoria_id"] . " " . $row["fecha_acceso"] . " " . $row["user"] . " " . $row["response_time"] . " " . $row["created"] . "," . PHP_EOL;
    echo $str;
    fwrite($file, $str);
}


// Headers to download file
header('Content-Description: File Transfer');
header('Content-Disposition: attachment; filename=auditoria.txt');
header('Content-Length: ' . filesize($tmpName));

readfile($tmpName);
?>