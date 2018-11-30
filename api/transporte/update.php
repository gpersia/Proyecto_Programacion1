<?php
	if($_SERVER['HTTP_REFERER'] == "CRUD.php"){
  		header("Access-Control-Allow-Origin: *");
		header("Content-Type: application/json; charset=UTF-8");
		header("Access-Control-Allow-Methods: PUT");
		header("Access-Control-Max-Age: 3600");
		header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

	include_once '../config/database.php';
	include_once '../objects/transporte.php';

	$database=new Database();
	$db=$database->getConnection();
	$transporte=new transporte($db);
	$data=json_decode(file_get_contents("php://input"));
	$transporte->sistema_id=$data->sistema_id;
	$transporte->nombre=$data->nombre;
	$transporte->pais_procedencia=$data->pais_procedencia;

	if($sistema_transporte->update()){
    	echo json_encode(array("message"=>"Cambios realizados!"));
	}
	else{
    	echo json_encode(array("message"=>"Error"));
	}
	}
	else{
  		echo json_encode(array("message" => "Sin autorizacion"));
	}
?>