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

    if(!empty($data->marca) && !empty($data->modelo) && !empty($data->anho_fabricacion) && !empty($data->patente)){
        $vehiculo->marca = $data->marca;
        $vehiculo->modelo = $data->modelo;
        $vehiculo->anho_fabricacion = $data->anho_fabricacion;
        $vehiculo->patente = $data->patente;
        $vehiculo->created = date('Y-m-d H:i:s');
        if($vehiculo->create()){
            echo json_encode(array("message" => "Vehículo creado correctamente"));
        }else{
            echo json_encode(array("message" => "No se pudo crear el vehículo"));
        }
        }else{
            echo json_encode(array("message" => "Datos insuficientes"));
        }
?>