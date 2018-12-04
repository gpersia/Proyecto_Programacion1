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
$chofer = new Chofer($db);
$data = json_decode(file_get_contents("php://input"));

if(isset($data->id)){
    $chofer->id = $data->id;
    $chofer->nombre = $data->nombre;
    $chofer->apellido = $data->apellido;
    $chofer->email = $data->email;
    $chofer->dni = $data->dni;
    $chofer->FK_vehiculo = $data->FK_vehiculo;
    $chofer->FK_transporte = $data->FK_transporte;
    if($chofer->update()){
        echo json_encode(array("message" => "Se actualizaron los datos."));
    }else{
        echo json_encode(array("message" => "Error, intente nuevamente."));
    }
}
?>