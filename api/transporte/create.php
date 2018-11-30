<?php
    if($_SERVER['HTTP_REFERER'] == "CRUD.php"){
        header("Access-Control-Allow-Origin: *");
        header("Content-Type: application/json; charset=UTF-8");
        header("Access-Control-Allow-Methods: POST");
        header("Access-Control-Max-Age: 3600");
        header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
        
        include_once '../config/database.php';
        include_once '../objects/transporte.php';

        $database=new Database();
        $db=$database->getConnection();
        $transporte=new transporte($db);
        $data=json_decode(file_get_contents("php://input"));
        if(
            !empty($data->nombre) &&
            !empty($data->pais_procedencia)
        ){
            $transporte->nombre=$data->nombre;
            $transporte->pais_procedencia=$data->pais_procedencia;
            $transporte->created=date('Y-m-d H:i:s');
        if($transporte->create()){
            echo json_encode(array("message"=>"Creado!"));
        }
        else{
    echo json_encode(array("message"=>"Imposible crear, intente nuevamente"));
    }
    }
    else{
    echo json_encode(array("message" => "Completar todos los datos"));
    }
    }
    else {
        echo json_encode(array("message" => "Sin autorización"));
    }
?>