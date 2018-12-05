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
    $transporte = new Transporte($db);
    $data = json_decode(file_get_contents("php://input"));
    
    if(isset($data->nombre) && isset($data->pais_procedencia) ){
        $transporte->nombre = $data->nombre;
        $transporte->pais_procedencia = $data->pais_procedencia;
        $transporte->created = date('Y-m-d H:i:s');

        if($transporte->create()){
            echo json_encode(Array("Message" => "Se agrego el transporte"));
        }else{
            echo json_encode(Array("Message" => "Error, intente nuevamente."));
        };
    }else{
        echo json_encode(Array("Message" => "Completar todos los campos"));
    }