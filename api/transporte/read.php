<?php
    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Methods: GET");
    header("Content-Type: application/json; charset=UTF-8");
    
    include_once '../config/database.php';
    include_once '../objects/transporte.php';

    $database=new Database();
    $db=$database->getConnection();

    $transporte = new transporte($db);
    $stmt = $transporte->read();        
    $numero = $stmt->rowCount();   

    if($numero>0){
        $transporte_arr=array();
        $transporte_arr["transportes"]=array();

        while ($fila = $stmt->fetch(PDO::FETCH_ASSOC)){ 
            extract($fila);
            $transporte_item=array(
                "transporte_id"=>$id,
                "nombre" => $nombre,
                "pais_procedencia" => $pais_procedencia,
                "created" => $created,
                "updated" => $updated,
            );
            array_push($transporte_arr["transportes"], $transporte_item);
        }
        echo json_encode($transporte_arr);
    }
    else{
        echo json_encode(array("message" => "No se encontraron choferes")
        );
    }
?>