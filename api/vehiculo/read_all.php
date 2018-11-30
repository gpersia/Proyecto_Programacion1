<?php

// Required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

// Include database and object files
include_once '../config/database.php';
include_once '../objects/vehiculo.php';

// Instantiate database object
$database = new Database();
$db = $database->getConnection();

// Initialize object
$vehicle = new Vehiculo($db);

$data = $vehicle->readAll();
$records_array = array();
for($i=0; $i<count($data); $i++){
    array_push($records_array, $data[$i]);
}

echo json_encode(Array("data"=>$records_array));
?>

