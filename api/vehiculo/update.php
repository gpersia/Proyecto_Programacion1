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

print_r($data);
$vehicle->patente = $data->patente;
$vehicle->anho_fabricacion = $data->anho_fabricacion;
$vehicle->marca = $data->marca;
$vehicle->modelo = $data->modelo;
$vehicle->vehiculo_id = $data->id;

if($vehicle->id!=null){
    if($vehicle->update()){
        echo json_encode(Array("Message"=>"Se actualizo correctamente"));
    }else{
        echo json_encode(Array("Message"=>"No se pudo actualizar"));
    }
} else {
    echo json_encode(Array("Message"=>"Datos faltantes, no se pudo actualizar"));
}
?>