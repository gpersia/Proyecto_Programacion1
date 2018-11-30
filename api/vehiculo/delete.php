<?php
// Required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
date_default_timezone_set("America/Argentina/Mendoza");

// Include database and object files
include_once '../config/database.php';
include_once '../objects/vehiculo.php';

// Instantiate database object
$database = new Database();
$db = $database->getConnection();

// Initialize object
$vehicle = new Vehiculo($db);

// Get POSTed data
$data = json_decode(file_get_contents("php://input"));

if(!empty($data->patente)){
    $vehicle->patente = $data->patente;
    if($vehicle->delete()){
        echo json_encode(Array("message"=>"Se eliminó el vehículo correctamente"));
    }else{
        echo json_encode(Array("message"=>"No se eliminó el vehículo"));
    }
}else{
    echo json_encode(Array("message"=>"No se cumple que !empty(data->patente)"));
}
?>

