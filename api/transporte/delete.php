<?php
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");
    header("Access-Control-Allow-Methods: POST");
    header("Access-Control-Max-Age: 3600");
    header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

    include_once '../config/database.php';
    include_once '../objects/transporte.php';

    $database = new Database();
    $db = $database->getConnection();

    $transporte = new transporte($db);
    $data = json_decode(file_get_contents("php://input"));

    $transporte->id = $data->id;

    if($data->id != null){
        if($transporte->delete()){
            echo json_encode(array("message" => "Transporte eliminado."));
        }else{
            echo json_encode(array("message" => "Incorrecto, nuevamente."));
        }
    }else{
        echo json_encode(array("message" => "Error, complete todos los campos."));
    }
?>