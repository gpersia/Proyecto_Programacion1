<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
include_once '/home/gianluca/Documentos/Facultad/Programacion I/Proyecto/Proyecto_Programacion1/api/config/database.php';
$database = new Database();
$db = $database->getConnection();
$driver = new driver($db);
$data = json_decode(file_get_contents("php://input"));
s
if(isset($data->id)){
    $driver->driver_id = $data->chofer_id;
    $driver->surname = $data->apellido;
    $driver->name = $data->nombre;
    $driver->dni = $data->documento;
    $driver->email = $data->email;
    $driver->vehicle_id = $data->vehiculo_id;
    $driver->system_id = $data->sistema_id;
    if($driver->update()){
        echo json_encode(array("message" => "Cambios satisfactorios."));
    }else{
        echo json_encode(array("message" => "Error, intente de nuevo."));
    }
}
?>