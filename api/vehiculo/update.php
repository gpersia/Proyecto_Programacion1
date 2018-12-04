<?php
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");
    header("Access-Control-Allow-Methods: POST");
    header("Access-Control-Max-Age: 3600");
    header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
    date_default_timezone_set("America/Argentina/Mendoza");

    include_once '../config/database.php';
    include_once '../objects/vehiculo.php';

    $database = new Database();
    $db = $database->getConnection();

    $vehiculo = new Vehiculo($db);
    $data = json_decode(file_get_contents("php://input"));

    print_r($data);
    $vehiculo->id = $data->id;
    $vehiculo->marca = $data->marca;
    $vehiculo->modelo = $data->modelo;
    $vehiculo->anho_fabricacion = $data->anho_fabricacion;
    $vehiculo->patente = $data->patente;

    if($vehiculo->id!=null){
        if($vehiculo->update()){
            echo json_encode(Array("Message"=>"Se actualizo correctamente"));
        }else{
            echo json_encode(Array("Message"=>"No se pudo actualizar"));
        }
    }else{
        echo json_encode(Array("Message"=>"Datos faltantes"));
}
?>