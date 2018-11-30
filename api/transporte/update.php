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
// Set property values
$transport->id = $data->id;
$transport->nombre = $data->nombre;
$transport->pais = $data->pais_procedencia;

// update the product
if($transport->update()){
    echo json_encode(array("message" => "Product was updated."));
}else{
     echo json_encode(array("message" => "Unable to update product."));
}

?>