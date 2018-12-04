<?php
    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Methods: GET");
    header("Content-Type: application/json; charset=UTF-8");
    
    include_once '../config/database.php';
    include_once '../objects/chofer.php';

    $database=new Database();
    $db=$database->getConnection();

    $chofer = new chofer($db);
    $stmt = $chofer->read();        
    $numero = $stmt->rowCount();   

    if($numero>0){
        $chofer_arr=array();
        $chofer_arr["archivos"]=array();

        while ($fila = $stmt->fetch(PDO::FETCH_ASSOC)){ 
            extract($fila);
            $chofer_item=array(
                "chofer_id"=>$id,
                "nombre" => $nombre,
                "apellido" => $apellido,
                "documento" => $dni,
                "email" => $email,
                "FK_vehiculo" => $FK_vehiculo,
                "FK_transporte" => $FK_transporte,
                "created" => $created,
                "updated" => $updated,
            );
            array_push($chofer_arr["archivos"], $chofer_item);
        }
        echo json_encode($chofer_arr);
    }
    else{
        echo json_encode(array("message" => "No se encontraron choferes")
        );
    }
?>