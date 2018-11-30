<?php
    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Methods: GET");
    header("Content-Type: application/json; charset=UTF-8");
    
    include_once '../config/database.php';
    include_once '../objects/chofer.php';

    $database=new Database();
    $db=$database->getConnection();

    $driver = new driver($db);
    $ = $driver->read();        //<--------------
    $numero = $->rowCount();   //<--------------

    if($num>0){
        $driver_arr=array();
        $driver_arr["archivos"]=array();

        while ($fila = $->fetch(PDO::FETCH_ASSOC)){ //<----------------
            extract($fila);
            $driver_item=array(
                "chofer_id"=>$chofer_id,
                "apellido" => $apellido,
                "nombre" => $nombre,
                "documento" => $documento,
                "email" => $email,
                "vehiculo_id" => $vehiculo_id,
                "sistema_id" => $sistema_id,
                "created" => $created,
                "updated" => $updated,
                "tipo_transporte_id" => $tipo_transporte_id
            );
            array_push($driver_arr["archivos"], $driver_item);
        }
        echo json_encode($driver_arr);
    }
    else{
        echo json_encode(array("message" => "No se encontraron choferes")
        );
    }
?>