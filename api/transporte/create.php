<?php

// Required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

// Include database and object files
include_once '../../config/Database.php';
include_once '../../objects/Transporte.php';

// Instantiate database object
$database = new Database();
$db = $database->getConnection();

// Initialize object
$transport = new Transporte($db);

// Get POSTed data
$data = json_decode(file_get_contents("php://input"));

// Make sure data is not empty
if( !empty($data->nombre) && !empty($data->pais_procedencia)){
    // Set property values
    $transport->nombre = $data->nombre;
    $transport->pais = $data->pais_procedencia;
    $transport->createdAt = date('Y-m-d H:i:s');
    // Create
    if($transport->create()){
        echo json_encode(array("message" => "Se creó el servicio de transporte."));
    } else {
        echo json_encode(array("message" => "No se pudo crear el servicio."));
    }
} else {
    // Data incomplete
    echo json_encode(array("message" => "No se pudo crear el servicio. Faltan datos."));
}