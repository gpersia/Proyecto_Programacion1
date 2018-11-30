<?php

// Required headers
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: access");
header("Access-Control-Allow-Methods: GET");
header("Access-Control-Allow-Credentials: true");
header('Content-Type: application/json');
header("Content-Type: application/json; charset=UTF-8");

// Include database and object files
include_once '../../config/Database.php';
include_once '../../objects/Transporte.php';

// Instantiate database object
$database = new Database();
$db = $database->getConnection();

// Initialize object
$transport = new Transporte($db);

if(isset($_GET["nombre"])){
    $transport->nombre = $_GET["nombre"];
}else{
    die();
}

$transport->read();

if($transport->nombre!=null){
    // Create array
    $transportArray = array(
        "nombre"=>$transport->nombre,
        "pais_procedencia"=>$transport->pais,
        "sistema_id"=>$transport->id,
        "created"=>$transport->createdAt,
        "updated"=>$transport->updatedAt
    );

    // Send array in JSON format
    echo json_encode($transportArray);
}else{
    // Data does not exist.
    echo json_encode(array("message" => "El servicio de transporte no existe."));
}

// Ex. http://localhost/proyecto/api/sistemas_transporte/read.php/?nombre=Cabify

?>