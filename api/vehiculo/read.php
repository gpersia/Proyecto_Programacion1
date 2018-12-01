<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: access");
header("Access-Control-Allow-Methods: GET");
header("Access-Control-Allow-Credentials: true");
header('Content-Type: application/json');
header("Content-Type: application/json; charset=UTF-8");

include_once '../config/database.php';
include_once '../objects/vehiculo.php';

$database = new Database();
$db = $database->getConnection();
$vehiculo = new Vehiculo($db);

if(isset($_GET["patente"])){
    $vehiculo->patente = $_GET["patente"];
}else{
    die();
}

$vehicle->read();
if($vehiculo->marca!=null && $vehiculo->modelo != null){
    $vehiculo_arr = array(
        "marca"=>$vehicle->marca,
        "modelo"=>$vehicle->modelo,
        "anho_fabricacion"=>$vehicle->anho_fabricacion,
        "patente"=>$vehicle->patente,
        "created"=>$vehicle->created,
        "updated"=>$vehicle->updated,
    );
    echo json_encode($vehiculo_arr);
}else{
    echo json_encode(array("message" => "El tipo de transporte no existe."));
}
?>