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

    if(isset($data->id)){
        $vehiculo->id = $data->id;
        $vehiculo->marca = $data->marca;
        $vehiculo->modelo = $data->modelo;
        $vehiculo->anho_fabricacion = $data->anho_fabricacion;
        $vehiculo->patente = $data->patente;

    if($vehiculo->update()){
        echo json_encode(array("message" => "Se actualizaron los datos."));
    }else{
        echo json_encode(array("message" => "Error, intente nuevamente."));
    }
}
?>