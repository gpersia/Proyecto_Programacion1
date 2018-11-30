<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
include_once '../config/database.php';
include_once '../objects/chofer.php';
$database = new Database();
$db = $database->getConnection();
$driver = new driver($db);
$data = json_decode(file_get_contents("php://input"));
if(isset($data->apellido) && isset($data->nombre) && isset($data->documento) && isset($data->email) && isset($data->tipo_transporte_id) && isset($data->sistema_id)){
    $driver->surname = $data->apellido;
    $driver->name = $data->nombre;
    $driver->dni = $data->documento;
    $driver->email = $data->email;
    $driver->vehicle_id = $data->tipo_transporte_id;
    $driver->system_id = $data->sistema_id;
    $driver->created = date('Y-m-d H:i:s');
    if($driver->create()){
        echo json_encode(Array("Message" => "Creacion Satisfactoria"));
    }else{
        echo json_encode(Array("Message" => "Error, intente de nuevo."));
    };
}else{
    echo json_encode(Array("Message" => "Completar todos los campos"));
}