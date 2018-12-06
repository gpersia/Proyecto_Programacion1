<?php

// required headers
header("Access-Control-Allow-Origin: *");//significa que el recurso puede ser accesado por cualquier(*) dominio en una forma de sitio cruzado.
//Permite a cualquier origen el acceso a tus recursos

header("Content-Type: application/json; charset=UTF-8");//designa el contenido para que estè en formato JSON, codificado en la codificacion
//de caracteres UTF-8

header("Access-Control-Allow-Methods: POST");//especifica el metodo o los metodos aceptados cuando se accede al recurso en respuesta de un preflight request.

header("Access-Control-Max-Age: 3600");//indica cuanto tiempo se pueden almacenar en cachelos resultados de una solicitud de verificacion previa

header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
//Al servidor le corresponde especificar que acpeta solicituds de origen cruzado (y que permite el encabezado de solicitud de tipo de contenido,
//y así sucesivamente): el cliente no puede decidir por sí mismo que un servidor determinado debe permitir CORS.


require_once '../libs/vendor/autoload.php';
use \Firebase\JWT\JWT;
include_once '../config/core.php';

//en data guardo lo que mando por inpput(POST)
$data = json_decode(file_get_contents("php://input"));

//el ? significa que si se cumple(true) pasa al segundo parametro($data->jwt) y si no se cumple el primero pasa al tercero("") o sea nulo
//o sea que si es true $jwt=$data->jwt, si es falso $jwt=""(nulo);
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
		$jwt=isset($_GET["jwt"]) ? $_GET["jwt"] : "";
}
else {
		$jwt=isset($data->jwt) ? $data->jwt : "";
}
// if jwt is not empty
if($jwt){
		// if decode succeed, show user details
		try {
				$decoded = JWT::decode($jwt, $key, array('HS256'));

				// decode jwt
				// set response code
				http_response_code(200);



				$nombre=$decoded->data->username;
				return $nombre;

				// show user details
				// echo json_encode(array(
				//    "message" => "Access granted.",
				//  "data" => $decoded->data
				//));

		}
		// if decode fails, it means jwt is invalid
		catch (Exception $e){
				// set response code
				http_response_code(401);
				// tell the user access denied  & show error message
				echo json_encode(array(
										"message" => "Access denied 123.",
										"error" => $e->getMessage()
									  ));
				exit;
		}
}
// show error message if jwt is empty
else{
		// set response code
		http_response_code(401);
		// tell the user access denied
		echo json_encode(array("message" => "Access deniedsssssss."));
		exit;
}