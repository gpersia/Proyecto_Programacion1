<?php
    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Headers: access");
    header("Access-Control-Allow-Methods: GET");
    header("Access-Control-Allow-Credentials: true");
    header('Content-Type: application/json');
    header("Content-Type: application/json; charset=UTF-8");

    include_once '../config/database.php';
    include_once '../objects/vehiculo.php';

    $database = new Database();
    $db = $database->getConnection();

    $vehiculo = new vehiculo($db);
    $stmt = $vehiculo->read();
    $numero = $stmt->rowCount();

    if($numero>0){
        $vehiculo_arr=array();
        $vehiculo_arr["archivos"]=array();

        while ($fila = $stmt->fetch(PDO::FETCH_ASSOC)){
            extract($fila);
            $vehiculo_item=array(
                "vehiculo_id"=>$id,
                "marca"=>$marca,
                "modelo"=>$modelo,
                "anho_fabricacion"=>$anho_fabricacion,
                "patente"=>$patente,
                "created"=>$created,
                "updated"=>$updated,
            );
            array_push($vehiculo_arr["archivos"], $vehiculo_item);
        }
        echo json_encode($vehiculo_arr);
    }
    else{
        echo json_encode(array("message"=> "No se encontraron vehiculos"));
    }

/*if(isset($_GET["patente"])){
    $vehiculo->patente = $_GET["patente"];
}else{
    die();
}

$vehicle->read();
if($vehiculo->marca!=null && $vehiculo->modelo != null){
    $vehiculo_arr = array(
        "marca"=>$vehicle->marca,
        "modelo"=>$vehicle->modelo,
        "anho_fabricacion"=>$vehicle->anho_fabricacion,
        "patente"=>$vehicle->patente,
        "created"=>$vehicle->created,
        "updated"=>$vehicle->updated,
    );
    echo json_encode($vehiculo_arr);
}else{
    echo json_encode(array("message" => "El tipo de transporte no existe."));
}*/
?>