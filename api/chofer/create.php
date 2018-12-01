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
$chofer = new chofer($db);
$data = json_decode(file_get_contents("php://input"));
if(isset($data->apellido) && isset($data->nombre) && isset($data->documento) && isset($data->email) && isset($data->tipo_transporte_id) && isset($data->sistema_id)){
    $chofer->nombre = $data->nombre;
    $chofer->apellido = $data->apellido;
    $chofer->email = $data->email;
    $chofer->dni = $data->dni;
    $chofer->FK_vehiculo = $data->FK_vehiculo;
    $chofer->FK_transporte = $data->FK_transporte;
    $chofer->created = date('Y-m-d H:i:s');
    if($driver->create()){
        echo json_encode(Array("Message" => "Se agrego el chofer"));
    }else{
        echo json_encode(Array("Message" => "Error, intente nuevamente."));
    };
}else{
    echo json_encode(Array("Message" => "Completar todos los campos"));
}