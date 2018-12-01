<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
include_once '../config/database.php';
include_once '../objects/vehiculo.php';

$database = new Database();
$db = $database->getConnection();

$vehiculo = new Vehiculo($db);

$data = $vehiculo->readAll();
$vehiculo_arr = array();
for($i=0; $i<count($data); $i++){
    array_push($vehiculo_arr, $data[$i]);
}
echo json_encode(Array("data"=>$vehiculo_arr));
?>

