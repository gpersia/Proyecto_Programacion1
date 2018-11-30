<?php
    if($_SERVER['HTTP_REFERER'] == "CRUD.php"){
        header("Access-Control-Allow-Origin: *");
        header("Access-Control-Allow-Headers: access");
        header("Access-Control-Allow-Methods: DELETE");
        header("Access-Control-Allow-Credentials: true");
        header('Content-Type: application/json');

        include_once '../config/database.php';
        include_once '../objects/transporte.php';

        $database=new Database();
        $db=$database->getConnection();
        $transporte=new transporte($db);
        $data=json_decode(file_get_contents("php://input"));
        $transporte->id=$data->id;

        if(($transporte->id)!=NULL){
            if($transporte->delete())
        {
            echo json_encode(array("message"=> "Borrado!"));
    }
    else{
        echo json_encode(array("message"=> "Intente nuevamente!"));
    }
    }
    else{
        echo json_encode(array("message"=> "Error"));
    }
    }
    else {
        echo json_encode(array("message" => "Sin autorizacion"));
    }
?>