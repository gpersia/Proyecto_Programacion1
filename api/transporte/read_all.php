<?php

// Required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

// Include database and object files
include_once '../../config/Database.php';
include_once '../../objects/Transporte.php';

// Instantiate database object
$database = new Database();
$db = $database->getConnection();

// Initialize object
$transport = new Transporte($db);

// Query
$stmt = $transport->readAll(); // returns statement.
$num = $stmt->rowCount();

// Are there records?
if($num>0){
    $transportArray = array();
    $transportArray["records"] = array();

    while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        // Extract row... This will make $row["name"] to just $name
        extract($row);
        $transport_item = array(
            "id"=>$sistema_id,
            "nombre"=>$nombre,
            "pais"=>$pais_procedencia,
            "created"=>$created,
            "updated"=>$updated
        );
        // Push record found to array
        array_push($transportArray["records"], $transport_item);
    }
    // Echo array in JSON format
    echo json_encode($transportArray);
} else {
    echo json_encode(
        array("message" => "No hay sistemas de transporte guardados.")
    );
}

// Ex. http://localhost/proyecto/api/sistemas_transporte/read_all.php
?>