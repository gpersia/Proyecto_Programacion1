<?php
    if($_SERVER['HTTP_REFERER'] == "CRUD.php"){
        header("Access-Control-Allow-Origin: *");
        header("Content-Type: application/json; charset=UTF-8");
        header("Access-Control-Allow-Methods: GET");
        
        include_once '../config/database.php';
        include_once '../objects/transporte.php';

        $database=new Database();
        $db=$database->getConnection();
        $transporte=new transporte($db);
        $stmt=$transporte->read();
        $cantidad=$stmt->rowCount();
        $arr_transporte=array();
        $arr_transporte["archivos"]=array();

    if($cantidad>0){
        while($fila=$stmt->fetch(PDO::FETCH_ASSOC)){
            extract($fila);
            $arr_items=array(
                "id" => $id,
                "nombre" => $nombre,
                "pais_procedencia"=> $pais_procedencia,
                "created" => $created,
                "updated" => $updated
            );
            array_push($arr_transporte["archivos"],$arr_items);
        }
        echo json_encode($arr_transporte);
    }
    else{
        echo json_encode(array("message"=>"No se encontraron datos"));
    }
    }
    else{
        echo json_encode(array("message" => "Sin autorizacion"));
    }
?>