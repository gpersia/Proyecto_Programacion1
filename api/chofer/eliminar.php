<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
include_once '/home/gianluca/Documentos/Facultad/Programacion I/Proyecto/Proyecto_Programacion1/api/config/database.php';
$database = new Database();
$db = $database->getConnection();
$driver = new Chofer($db);
$data = json_decode(file_get_contents("php://input"));
$driver->driver_id = $data->chofer_id;
if($data->driver_id != null){
    if($driver->delete()){
        echo json_encode(array("message" => "Eliminacion satisfactoria."));
    }else{
        echo json_encode(array("message" => "Incorrecto, intente de nuevo."));
    }
} else {
    echo json_encode(array("message" => "Error, complete todos los campos."));
}
?>