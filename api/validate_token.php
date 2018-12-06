<?php

	header("Access-Control-Allow-Origin: *");
	header("Content-Type: application/json; charset=UTF-8");
	header("Access-Control-Allow-Methods: POST");
	header("Access-Control-Max-Age: 3600");
	header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

	require_once '../libs/vendor/autoload.php';
	use \Firebase\JWT\JWT;
	include_once '../config/core.php';

	$data = json_decode(file_get_contents("php://input"));

	if ($_SERVER['REQUEST_METHOD'] === 'GET') {
		$jwt=isset($_GET["jwt"]) ? $_GET["jwt"] : "";
	}
	else {
		$jwt=isset($data->jwt) ? $data->jwt : "";
	}

	if($jwt){
		try {
			$decoded = JWT::decode($jwt, $key, array('HS256'));
				http_response_code(200);
				$nombre=$decoded->data->username;
				return $nombre;
		}
		catch (Exception $e){
			http_response_code(401);
			echo json_encode(array("message" => "Acceso denegado.","error" => $e->getMessage() ));
			exit;
		}
	}
	else{
		http_response_code(401);
		echo json_encode(array("message" => "Acceso denegado."));
		exit;
}