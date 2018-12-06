<?php


    function crearauditoria($name,$total_time,$endpoint){

		echo json_encode(array("message"=>"esto es funcion"));
		echo json_encode($name);
		echo json_encode($total_time);
		echo json_encode($endpoint);
        
        header("Access-Control-Allow-Origin: *");
		header("Content-Type: application/json; charset=UTF-8");
		header("Access-Control-Allow-Methods: POST");
		header("Access-Control-Max-Age: 3600");
		header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

        include_once '../config/database.php';
		include_once '../objects/auditoria.php';

        $database=new Database();
		$db=$database->getConnection();

        $auditoria=new Auditoria($db);

		$data = json_decode(file_get_contents("php://input"));

		$auditoria->username=$name;
		$auditoria->response_time=$total_time;
		$auditoria->endpoint=$endpoint;

		echo json_encode(array("message"=>"esto es antes de llamara create"));

		if($auditoria->create()){
				http_response_code(201);

				echo json_encode(array("message"=>"llamo a la funcion create"));
		}else
		{
				http_response_code(503);

				echo json_encode(array("message"=>"no llamo create"));
		}
    }   
?>