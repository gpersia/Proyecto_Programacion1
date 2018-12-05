<?php

	header("Access-Control-Allow-Origin: *");
	header("Content-Type: application/json; charset=UTF-8");
	header("Access-Control-Allow-Methods: POST");
	header("Access-Control-Max-Age: 3600");
	header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

	include_once '../config/database.php';
	include_once '../objects/transporte.php';

	$database = new Database();
	$db = $database->getConnection();
	$transporte = new Transporte($db);
	$data = json_decode(file_get_contents("php://input"));

	if(isset($data->id)){
    	$transporte->id = $data->id;
    	$transporte->nombre = $data->nombre;
    	$transporte->pais_procedencia = $data->pais_procedencia;
    	if($transporte->update()){
        	echo json_encode(array("message" => "Se actualizaron los datos."));
    	}else{
        	echo json_encode(array("message" => "Error, intente nuevamente."));
    }
}
?>